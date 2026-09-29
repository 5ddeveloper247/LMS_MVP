@extends('backend.master')

@section('mainContent')
    {!! generateBreadcrumb() !!}

    <section class="admin-visitor-area up_st_admin_visitor">
        <div class="white_box mb_30 student-details header-menu">
            <div class="white_box_tittle list_header">
                <h4>Edit CE Bundle</h4>
            </div>
            <div class="col-lg-12">
                @include('continuingeducation::bundles._form')
            </div>
        </div>
    </section>
@endsection
