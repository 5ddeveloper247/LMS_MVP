@extends('backend.master')

@section('mainContent')
    {!! generateBreadcrumb() !!}
    <section class="admin-visitor-area up_st_admin_visitor">
        <div class="container-fluid p-0">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="box_header common_table_header">
                        <div class="main-title d-md-flex">
                            <h3 class="mb-0">{{ __('Edit Session Package') }}</h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="white_box_30px">
                        @include('systemsetting::tutor_session_packages._form', ['package' => $package])
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
