@extends('backend.master')

@push('styles')
    <style>
        .ck-editor__editable {
            min-height: 300px;
            color: #000 !important;
            background-color: #fff !important;
            -webkit-text-fill-color: #000 !important;
        }

        .ck-editor__editable p,
        .ck-editor__editable li,
        .ck-editor__editable span {
            color: #000 !important;
            -webkit-text-fill-color: #000 !important;
        }

        .ck-editor__editable ul li {
            list-style: disc;
        }

        .ck-editor__editable ol li {
            list-style: decimal;
        }
    </style>
@endpush

@section('mainContent')
    {!! generateBreadcrumb() !!}

    <section class="admin-visitor-area up_st_admin_visitor">
        <div class="white_box mb_30 student-details header-menu">
            <div class="white_box_tittle list_header">
                <h4>Add CE Course</h4>
            </div>
            <div class="col-lg-12">
                @include('continuingeducation::courses._form')
            </div>
        </div>
    </section>
@endsection
