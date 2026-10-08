<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Modules\Blog\Entities\BlogComment;
use Modules\FrontendManage\Entities\FrontPage;
use Modules\Blog\Entities\BlogCategory;
use Modules\Blog\Entities\Blog;
use Modules\Org\Entities\OrgBlogBranch;
use Modules\Org\Entities\OrgBlogPosition;
use Modules\Org\Entities\OrgBranch;
use Modules\Org\Entities\OrgPosition;

class BlogController extends Controller
{
    public function __construct()
    {
        $this->middleware('maintenanceMode');
    }

    public function allBlog()
    {
        try {
            $publishedBlogQuery = fn ($query) => $query
                ->where('status', 1)
                ->where(function ($q) {
                    $q->whereNull('authored_date_time')
                        ->orWhere('authored_date_time', '<=', Carbon::now());
                })
                ->with(['user', 'category'])
                ->orderByDesc('authored_date_time')
                ->orderByDesc('id');

            $categories = BlogCategory::with(['blogs' => $publishedBlogQuery])
                ->where('status', 1)
                ->orderBy('position_order')
                ->get()
                ->filter(fn ($category) => $category->blogs->isNotEmpty())
                ->values();

            $featuredPost = Blog::query()
                ->where('status', 1)
                ->where('featured', 1)
                ->where(function ($q) {
                    $q->whereNull('authored_date_time')
                        ->orWhere('authored_date_time', '<=', Carbon::now());
                })
                ->with(['category', 'user'])
                ->orderByDesc('authored_date_time')
                ->first();

            return view(theme('pages.blogs'), compact('categories', 'featuredPost'));
        } catch (\Exception $e) {
            GettingError($e->getMessage(), url()->current(), request()->ip(), request()->userAgent());
        }
    }


    public function blogDetails(Request $request, $slug)
    {
        $blog = Blog::where('slug', $slug)->with(['user', 'category', 'comments'])->firstOrFail();

        try {
            if ($blog->status == 0) {
                if ($request->preview != 1 || ! Auth::check() || Auth::user()->role_id == 3) {
                    Toastr::error(trans('blog.Blog status is not active'), trans('common.Failed'));

                    return Redirect::to('/');
                }
            }

            $current_date = Carbon::now();

            if ($blog->authored_date_time && Carbon::parse($blog->authored_date_time)->gt($current_date)) {
                if ($request->preview != 1 || ! Auth::check() || Auth::user()->role_id == 3) {
                    Toastr::error(trans('blog.Blog is not published yet'), trans('common.Failed'));

                    return Redirect::to('/');
                }
            }

            if (isModuleActive('Org')) {
                if ($blog->audience == 2) {
                    $checkBranch = false;

                    if (Auth::check()) {
                        if (Auth::user()->role_id == 3) {
                            if (! empty(Auth::user()->org_chart_code)) {
                                $check = OrgBranch::where('code', Auth::user()->org_chart_code)->first();
                                if ($check) {
                                    $branch_blog = OrgBlogBranch::where('blog_id', $blog->id)->where('branch_id', $check->id)->first();
                                    if ($branch_blog) {
                                        $checkBranch = true;
                                    }
                                }
                            }
                        } else {
                            $checkBranch = true;
                        }
                    }
                    if (! $checkBranch) {
                        Toastr::error(trans('common.Access Denied'), trans('common.Failed'));

                        return redirect()->back();
                    }
                }

                if ($blog->position_audience == 2) {
                    $checkPosition = false;

                    if (Auth::check()) {
                        if (Auth::user()->role_id == 3) {
                            if (! empty(Auth::user()->org_position_code)) {
                                $check = OrgPosition::where('code', Auth::user()->org_position_code)->first();
                                if ($check) {
                                    $position_blog = OrgBlogPosition::where('blog_id', $blog->id)->where('position_id', $check->id)->first();
                                    if ($position_blog) {
                                        $checkPosition = true;
                                    }
                                }
                            }
                        } else {
                            $checkPosition = true;
                        }
                    }
                    if (! $checkPosition) {
                        Toastr::error(trans('common.Access Denied'), trans('common.Failed'));

                        return redirect()->back();
                    }
                }
            }

            if (empty($request->preview)) {
                $blog->viewed = $blog->viewed + 1;
                $blog->save();
                if (function_exists('MarkAsBlogRead')) {
                    MarkAsBlogRead($blog->id);
                }
            }

            $relatedPosts = Blog::query()
                ->where('status', 1)
                ->where('id', '!=', $blog->id)
                ->where(function ($q) {
                    $q->whereNull('authored_date_time')
                        ->orWhere('authored_date_time', '<=', Carbon::now());
                })
                ->when($blog->category_id, fn ($q) => $q->where('category_id', $blog->category_id))
                ->with(['user', 'category'])
                ->orderByDesc('authored_date_time')
                ->limit(3)
                ->get();

            return view(theme('pages._new_blog_detail'), compact('blog', 'relatedPosts'));
        } catch (\Exception $e) {
            GettingError($e->getMessage(), url()->current(), request()->ip(), request()->userAgent());
        }
    }

    public function loadMoreData(Request $request)
    {
        $data = null;
        if ($request->id > 0) {
            $data = Blog::where('status', 1)->with('user')
                ->where('id', '<', $request->id)
                ->orderBy('id', 'DESC')
                ->limit(5)
                ->get();
        }

        $output = '';
        $last_id = '';

        if ($data) {
            foreach ($data as $blog) {
                $output .= view(theme('components.single-blog-post'), compact('blog'));
                $last_id = $blog->id;
            }
        }
        $result['last_id'] = $last_id;
        $result['view'] = $output;
        return $result;
    }

    public function blogCommentSubmit(Request $request)
    {
        if (!Auth::check()) {
            $validate_rules = [
                'name' => 'required',
                'email' => 'required|email',
                'comment' => 'required',
                'blog_id' => 'required',
                'type' => 'required',

            ];
        } else {
            $validate_rules = [
                'comment' => 'required',
                'blog_id' => 'required',
                'type' => 'required',
            ];
        }

        $request->validate($validate_rules, validationMessage($validate_rules));

        try {
            $comment = new BlogComment();
            if (\auth()->check()) {
                $comment->user_id = \auth()->id();
            } else {
                $comment->name = $request->name;
                $comment->email = $request->email;
            }

            $comment->comment = $request->comment;
            if ($request->type != 1) {
                $comment->comment_id = $request->comment_id;
            }
            $comment->blog_id = $request->blog_id;
            $comment->type = $request->type;
            $comment->save();
            Toastr::success(trans('common.Operation successful'), trans('common.Success'));
            return redirect()->back();
        } catch (\Exception $exception) {
            GettingError($exception->getMessage(), url()->current(), request()->ip(), request()->userAgent());
        }
    }

    public function deleteBlogComment($id)
    {
        $comment = BlogComment::findOrFail($id);

        try {
            if ($comment->type == 1) {
                $replies = $comment->replies;
                foreach ($replies as $reply) {
                    $reply->delete();
                }
            }
            $comment->delete();
            Toastr::success(trans('common.Operation successful'), trans('common.Success'));
            return redirect()->back();
        } catch (\Exception $exception) {
            GettingError($exception->getMessage(), url()->current(), request()->ip(), request()->userAgent());
        }
    }
}
