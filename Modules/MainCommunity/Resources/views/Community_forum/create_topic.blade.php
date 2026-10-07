@extends($forumLayout)

@if($useAdminShell)
@push('styles')
@elseif($isCePortalShell)
@push('css')
@else
@section('css')
@endif
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;0,800;1,400&family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">
<style>
.mxp-forum {
  --teal-mid: #1A8A6F;
  --teal-deep: #0F6E56;
  --teal-darkest: #0A4D3C;
  --terracotta: #C65D3A;
  --terracotta-deep: #A84B2D;
  --cream: #F5EDE0;
  --gray-line: #E8DFD0;
  --charcoal-soft: #4A4A4A;
  --white: #FFFFFF;
  --serif: 'Playfair Display', Georgia, serif;
  --sans: 'Montserrat', system-ui, sans-serif;
  font-family: var(--sans);
  color: #2B2B2B;
  background: var(--cream);
  border-radius: 12px;
  padding: 28px 24px 32px;
}
.mxp-forum h1 { font-family: var(--serif); font-size: 28px; color: var(--teal-darkest); margin: 0 0 8px; }
.mxp-forum .forum-crumb { font-size: 13px; color: var(--charcoal-soft); margin-bottom: 20px; }
.mxp-forum .forum-crumb a { color: var(--teal-mid); font-weight: 500; text-decoration: none; }
.mxp-forum .forum-crumb span { margin: 0 8px; opacity: 0.5; }
.mxp-forum .topic-form-card {
  background: var(--white);
  border: 1px solid var(--gray-line);
  border-radius: 14px;
  padding: 28px;
  width: 100%;
  box-sizing: border-box;
}
.mxp-forum label { display: block; font-size: 12px; font-weight: 600; color: var(--charcoal-soft); margin: 14px 0 6px; }
.mxp-forum input[type=text], .mxp-forum select, .mxp-forum textarea {
  width: 100%;
  border: 1px solid var(--gray-line);
  border-radius: 8px;
  padding: 10px 12px;
  font-size: 14px;
  font-family: inherit;
  box-sizing: border-box;
}
.mxp-forum input:focus, .mxp-forum select:focus, .mxp-forum textarea:focus {
  outline: none;
  border-color: var(--teal-mid);
}
.mxp-forum .topic-in { font-size: 13px; color: var(--charcoal-soft); margin: 0 0 8px; }
.mxp-forum .form-actions { display: flex; justify-content: flex-end; gap: 10px; margin-top: 24px; flex-wrap: wrap; }
.mxp-forum .btn-cancel {
  background: var(--white);
  border: 1px solid var(--gray-line);
  border-radius: 8px;
  padding: 12px 20px;
  font-size: 14px;
  font-weight: 600;
  color: var(--charcoal-soft);
  text-decoration: none;
}
.mxp-forum .new-topic-btn {
  display: inline-flex;
  align-items: center;
  background: var(--terracotta);
  color: var(--white);
  padding: 12px 24px;
  border-radius: 8px;
  font-size: 14px;
  font-weight: 600;
  border: none;
  cursor: pointer;
}
.mxp-forum .new-topic-btn:hover { background: var(--terracotta-deep); color: var(--white); }
.mxp-forum .field-error { font-size: 12px; color: #b42318; margin-top: 4px; }
</style>
@if($useAdminShell)
@endpush
@elseif($isCePortalShell)
@endpush
@else
@endsection
@endif

@section('mainContent')
    @if($useAdminShell)
        {!! generateBreadcrumb() !!}
    @endif

    <section class="{{ $useAdminShell ? 'admin-visitor-area up_st_admin_visitor' : '' }}">
        <div class="container-fluid p-0">
            <div class="row">
                <div class="col-12">
                    <div class="mxp-forum">
                        <div class="forum-crumb">
                            <a href="{{ route('main-community.index') }}">Community Forum</a>
                            <span>&rsaquo;</span>
                            Start a new topic
                        </div>

                        <h1>Start a new topic</h1>

                        <div class="topic-form-card">
                            <form action="{{ route('main-community.topics.store') }}" method="POST">
                                @csrf

                                @if($lockedCategory)
                                    <input type="hidden" name="category" value="{{ $lockedCategory['slug'] }}">
                                    <p class="topic-in">Posting in <strong>{{ $lockedCategory['name'] }}</strong></p>
                                @else
                                    <label for="topic_category">Category</label>
                                    <select name="category" id="topic_category" required>
                                        <option value="">Select a category</option>
                                        @foreach($categories as $cat)
                                            <option value="{{ $cat['slug'] }}" @selected(old('category') === $cat['slug'])>{{ $cat['name'] }}</option>
                                        @endforeach
                                    </select>
                                    @error('category')
                                        <p class="field-error">{{ $message }}</p>
                                    @enderror
                                @endif

                                <label for="topic_title">Title</label>
                                <input type="text" name="title" id="topic_title" maxlength="150" value="{{ old('title') }}" placeholder="Give your topic a clear title" required>
                                @error('title')
                                    <p class="field-error">{{ $message }}</p>
                                @enderror

                                <label for="topic_body">What&rsquo;s on your mind?</label>
                                <textarea name="body" id="topic_body" rows="8" maxlength="5000" placeholder="Share your question, story, or resource..." required>{{ old('body') }}</textarea>
                                @error('body')
                                    <p class="field-error">{{ $message }}</p>
                                @enderror

                                <div class="form-actions">
                                    @if($lockedCategory)
                                        <a href="{{ route('main-community.category', $lockedCategory['slug']) }}" class="btn-cancel">Cancel</a>
                                    @else
                                        <a href="{{ route('main-community.index') }}" class="btn-cancel">Cancel</a>
                                    @endif
                                    <button type="submit" class="new-topic-btn">Post Topic</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
