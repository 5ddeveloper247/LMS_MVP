@extends(theme('layouts.dashboard_master'))
@section('title')
    {{ Settings('site_title') ? Settings('site_title') : 'Infix LMS' }} | {{ __('My Tutors') }}
@endsection
@section('css')
    <style>
        .mxp-my-tutors-tabs {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
            margin: 0 0 28px;
            padding: 0;
            list-style: none;
            border-bottom: 1px solid #e8e8e8;
        }
        .mxp-my-tutors-tabs .nav-link {
            display: inline-block;
            padding: 10px 18px;
            border-radius: 8px 8px 0 0;
            font-size: 14px;
            font-weight: 600;
            color: #555 !important;
            text-decoration: none !important;
            border: 1px solid transparent;
            border-bottom: none;
            background: transparent;
        }
        .mxp-my-tutors-tabs .nav-link.active {
            color: #0A4D3C !important;
            background: #fff;
            border-color: #e8e8e8;
            box-shadow: 0 -1px 0 #fff inset;
        }
        .mxp-pkg-card {
            border: 1px solid #e8dfd0;
            border-radius: 12px;
            padding: 20px;
            background: #fff;
            height: 100%;
            display: flex;
            flex-direction: column;
        }
        .mxp-pkg-card h4 {
            font-size: 18px;
            margin: 0 0 8px;
            color: #0A4D3C;
        }
        .mxp-pkg-card .meta {
            font-size: 13px;
            color: #666;
            margin-bottom: 6px;
        }
        .mxp-pkg-card .remaining {
            font-size: 14px;
            font-weight: 600;
            color: #1A8A6F;
            margin: 10px 0 16px;
        }
        .mxp-pkg-card .actions {
            margin-top: auto;
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
        }
        .mxp-pkg-card .theme_btn.small_btn4 {
            line-height: 1.2;
        }
    </style>
@endsection

@section('mainContent')
    @php
        $activeTab = $activeTab ?? 'tutors';
    @endphp
    <div>
        <div class="main_content_iner main_content_padding">
            <div class="dashboard_lg_card">
                <div class="container-fluid no-gutters">
                    <div class="my_courses_wrapper">
                        <div class="row">
                            <div class="col-12">
                                <div class="section__title3 margin-50">
                                    <h3>{{ __('Tutors') }}</h3>
                                </div>
                            </div>
                        </div>

                        <ul class="mxp-my-tutors-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link {{ $activeTab === 'tutors' ? 'active' : '' }}"
                                    href="{{ route('myTutors', ['tab' => 'tutors']) }}">
                                    {{ __('My Tutors') }}
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ $activeTab === 'packages' ? 'active' : '' }}"
                                    href="{{ route('myTutors', ['tab' => 'packages']) }}">
                                    {{ __('My Packages') }}
                                </a>
                            </li>
                        </ul>

                        @if ($activeTab === 'tutors')
                            @if (count($tutors) > 0)
                                <div class="row">
                                    @foreach ($tutors as $tutor)
                                        <div class="col-xl-6 col-sm-6 col-12">
                                            <div class="couse_wizged border">
                                                <div class="thumb">
                                                    <div class="thumb_inner lazy"
                                                        data-src="{{ getCourseImage(optional($tutor->instructor)->image) }}">
                                                    </div>
                                                </div>
                                                <div class="course_content py-3 px-2">
                                                    <div class="d-flex justify-content-between">
                                                        @if ($tutor->instructor)
                                                            <a
                                                                href="{{ route('tutorDetails', [$tutor->instructor->id, \Illuminate\Support\Str::slug($tutor->instructor->name, '-')]) }}">
                                                                <h4 class="noBrake" title="{{ $tutor->instructor->name }}">
                                                                    {{ $tutor->instructor->name }}
                                                                </h4>
                                                            </a>
                                                        @else
                                                            <h4 class="noBrake">{{ __('Tutor') }}</h4>
                                                        @endif

                                                        <div class="d-flex align-items-center">
                                                            <div class="progress_percent flex-fill text-right">
                                                                @php
                                                                    if (\Carbon\Carbon::parse($tutor->assign_date) == \Carbon\Carbon::today()->setTimezone(Settings('active_time_zone'))) {
                                                                        if (\Carbon\Carbon::parse($tutor->assign_start_time) <= \Carbon\Carbon::now()->setTimezone(Settings('active_time_zone')) && \Carbon\Carbon::now()->setTimezone(Settings('active_time_zone')) <= \Carbon\Carbon::parse($tutor->assign_end_time)) {
                                                                            $currentstat = 'started';
                                                                        } elseif (\Carbon\Carbon::parse($tutor->assign_start_time) > \Carbon\Carbon::now()->setTimezone(Settings('active_time_zone'))) {
                                                                            $currentstat = 'waiting';
                                                                        } else {
                                                                            $currentstat = 'closed';
                                                                        }
                                                                    } else {
                                                                        $currentstat = 'closed';
                                                                    }
                                                                    if (\Carbon\Carbon::parse($tutor->assign_date) > \Carbon\Carbon::now()->setTimezone(Settings('active_time_zone'))) {
                                                                        $currentstat = 'waiting';
                                                                    }
                                                                    if ($tutor->cancelled == 1) {
                                                                        $currentstat = 'cancelled';
                                                                    }
                                                                @endphp
                                                                @if ($currentstat == 'started')
                                                                    <a href="{{ $tutor->meeting_join_url }}"
                                                                        class="link_value theme_btn small_btn4">Join</a>
                                                                @elseif($currentstat == 'waiting')
                                                                    <a href="#"
                                                                        class="link_value theme_btn bg-info small_btn4">Waiting</a>
                                                                @elseif($currentstat == 'cancelled')
                                                                    <a href="#"
                                                                        class="link_value bg-danger theme_btn small_btn4 border-warning text-black-50">Cancelled</a>
                                                                @else
                                                                    @if (empty($tutor->tutorReviewRating) && $tutor->instructor)
                                                                        <a href="#"
                                                                            class="link_value bg-warning theme_btn small_btn4 modal_btn border-warning text-black-50"
                                                                            data-toggle="modal" data-target="#exampleModal"
                                                                            data-hiring_id="{{ $tutor->id }}"
                                                                            data-instructor_id="{{ $tutor->instructor->id }}">Review</a>
                                                                    @endif
                                                                    <a href="#"
                                                                        class="link_value bg-warning theme_btn small_btn4 border-warning text-black-50">Closed</a>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="course_less_students mt-3">
                                                        <ul>
                                                            <li>
                                                                <div class="d-inline w-50 text-nowrap" style="overflow:hidden;text-overflow:ellipsis">Date:</div>
                                                                <div class="d-inline w-50 float-right text-right text-nowrap" style="overflow:hidden;text-overflow:ellipsis">
                                                                    {{ \Carbon\Carbon::parse($tutor->assign_date)->format('d M Y') }}
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div class="d-inline w-50 text-nowrap" style="overflow:hidden;text-overflow:ellipsis">Start Time:</div>
                                                                <div class="d-inline w-50 float-right text-right text-nowrap" style="overflow:hidden;text-overflow:ellipsis">
                                                                    {{ \Carbon\Carbon::parse($tutor->assign_start_time)->format('H:i a') }}
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div class="d-inline w-50 text-nowrap" style="overflow:hidden;text-overflow:ellipsis">End Time:</div>
                                                                <div class="d-inline w-50 float-right text-right text-nowrap" style="overflow:hidden;text-overflow:ellipsis">
                                                                    {{ \Carbon\Carbon::parse($tutor->assign_end_time)->format('H:i a') }}
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div class="d-inline w-50">Course:</div>
                                                                <div class="d-inline w-50 float-right text-right text-nowrap" style="overflow:hidden;text-overflow:ellipsis">
                                                                    {{ optional($tutor->course)->title ?? 'Delete Course' }}
                                                                </div>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="my-4 mt-4">
                                    {{ $tutors->appends(['tab' => 'tutors'])->links() }}
                                </div>
                            @else
                                <div class="row">
                                    <div class="col-12 text-center">
                                        {{ __('No Tutor Found') }}
                                    </div>
                                </div>
                            @endif
                        @else
                            @if (isset($packages) && count($packages) > 0)
                                <div class="row">
                                    @foreach ($packages as $pkg)
                                        <div class="col-xl-6 col-sm-6 col-12 mb-4">
                                            <div class="mxp-pkg-card">
                                                <h4>{{ $pkg->package_name ?: __('Session Package') }}</h4>
                                                <div class="meta">
                                                    {{ __('Purchased') }}:
                                                    {{ $pkg->created_at ? $pkg->created_at->format('d M Y') : '—' }}
                                                </div>
                                                <div class="meta">
                                                    {{ __('Price') }}: ${{ number_format((float) $pkg->price, 0) }}
                                                </div>
                                                <div class="remaining">
                                                    {{ __('Sessions') }}:
                                                    {{ (int) $pkg->sessions_used }} / {{ (int) $pkg->sessions_allowed }}
                                                    · {{ __('Remaining') }}: {{ $pkg->remainingSessions() }}
                                                </div>
                                                <div class="actions">
                                                    <a href="{{ route('myPackage.details', $pkg->id) }}"
                                                        class="theme_btn small_btn4">{{ __('Details') }}</a>
                                                    @if ($pkg->remainingSessions() > 0)
                                                        <a href="{{ route('sessionPackage.hireFromPurchase', $pkg->id) }}"
                                                            class="theme_btn small_btn4 bg-info">{{ __('Hire tutor') }}</a>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="my-4 mt-4">
                                    {{ $packages->appends(['tab' => 'packages'])->links() }}
                                </div>
                            @else
                                <div class="row">
                                    <div class="col-12 text-center">
                                        {{ __('No packages purchased yet.') }}
                                    </div>
                                </div>
                            @endif
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalLabel">Review</h3>
                    <button type="button" class="close close_btn" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <form action="" id="review_form" class="form row" method="POST">
                        @csrf
                        <input type="hidden" name="instructor_id" id="instructor_id" value="">
                        <input type="hidden" name="hiring_id" id="hiring_id" value="">
                        <div class="col-xl-12">
                            <label class="form-label" for="">{{ __('Write Reviews') }}</label>
                            <textarea id="reviews" class="form-control" name="reviews" rows="5" cols="8" style="resize: none">{{ old('reviews') }}</textarea>
                        </div>
                        <div class="col-md-12">
                            <label class="form-label" for="">{{ __('Rating') }}</label>
                            <select class="form-control" id="rating" name="rating"
                                {{ $errors->has('rating') ? 'autofocus' : '' }}>
                                <option data-display="{{ __('common.Select') }}" value="">{{ __('common.Select') }}
                                </option>
                                <option value="1" class="text-warning">&#9733;</option>
                                <option value="2" class="text-warning">&#9733;&#9733;</option>
                                <option value="3" class="text-warning">&#9733;&#9733;&#9733;</option>
                                <option value="4" class="text-warning">&#9733;&#9733;&#9733;&#9733;</option>
                                <option value="5" class="text-warning">&#9733;&#9733;&#9733;&#9733;&#9733;</option>
                            </select>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn close_btn"
                        style="border: 1px solid #c738d8; background: transparent;">Close</button>
                    <button type="button" class="btn link_value small_btn4 custom_student_btn theme_btn6"
                        id="review_submit_btn"><i class="fa fa-spinner fa-spin d-none"></i> Submit</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(document).ready(function() {
            toastr.options = {
                "closeButton": true,
                "progressBar": true,
                "showDuration": 300,
                "timeOut": 4000,
                "hideDuration": 1000,
                "preventDuplicates": true,
            }
            var review_form = $('#review_form');
            var submit_btn = $('#review_submit_btn');
            $('.modal_btn').on('click', function(e) {
                var hiring_id = $(this).data('hiring_id');
                var instructor_id = $(this).data('instructor_id');
                review_form.find('#hiring_id').val(hiring_id);
                review_form.find('#instructor_id').val(instructor_id);
            });
            $(submit_btn).on('click', function() {
                let reviews = review_form.find('#reviews').val();
                let rating = review_form.find('#rating').val();
                if (reviews == '') {
                    toastr.error('Please Write Some Review', 'Error');
                    return false;
                } else if (rating == '') {
                    toastr.error('Please Select Rating', 'Error');
                    return false;
                }
                $(this).find('i.fa-spinner').removeClass('d-none');
                let url = '{{ route('tutorReview') }}';
                let form = new FormData(review_form[0]);
                $.ajax({
                    type: "POST",
                    url: url,
                    data: form,
                    processData: false,
                    contentType: false,
                    dataType: "json",
                    success: function(response) {
                        if (response.status == 200) {
                            toastr.success(response.message, 'Success');
                            modalFormControl();
                            setTimeout(function() {
                                location.reload(true);
                            }, 3000);
                        } else {
                            toastr.error(response.message, 'error');
                        }
                    }
                });
            });
            $('.close_btn').on('click', function() {
                modalFormControl();
            });

            function modalFormControl() {
                review_form.trigger("reset");
                review_form.parents('.modal').modal('hide');
            }
        });
    </script>
@endsection
