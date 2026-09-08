@extends('backend.master')
@section('mainContent')
    {!! generateBreadcrumb() !!}
    <section class="admin-visitor-area up_st_admin_visitor">
        <div class="container-fluid">
            <div class="white_box mb_30">
                <div class="white_box_tittle list_header">
                    <h4>{{ __('common.Add New') }} {{ __('Savings & Bundles') }}</h4>
                </div>
                <div class="col-lg-12">
                    <div class="student-details header-menu">
                        <form id="add_bundle_form" action="{{ route('bundle.store') }}" method="POST">
                            @csrf
                            @include('shop::bundle._form', [
                                'bundle' => null,
                                'selectedProductIds' => old('product_ids', []),
                                'selectableProducts' => $selectableProducts,
                            ])
                            <div class="row mt-40">
                                <div class="col-lg-12 text-center">
                                    <button class="primary-btn fix-gr-bg submit" id="save_button" type="button">
                                        <span class="ti-check"></span>{{ __('common.Save') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    @include('shop::bundle._form_scripts', ['formId' => 'add_bundle_form'])
@endpush
