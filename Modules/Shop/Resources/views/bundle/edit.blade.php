@extends('backend.master')
@section('mainContent')
    {!! generateBreadcrumb() !!}
    <section class="admin-visitor-area up_st_admin_visitor">
        <div class="container-fluid">
            <div class="white_box mb_30">
                <div class="white_box_tittle list_header">
                    <h4>{{ __('common.Edit') }} {{ __('Savings & Bundles') }}</h4>
                </div>
                <div class="col-lg-12">
                    <div class="student-details header-menu">
                        <form id="update_bundle_form" action="{{ route('bundle.update') }}" method="POST">
                            @csrf
                            <input type="hidden" name="id" value="{{ $bundle->id }}">
                            @include('shop::bundle._form', [
                                'bundle' => $bundle,
                                'selectedProductIds' => old('product_ids', $selectedProductIds),
                                'selectableProducts' => $selectableProducts,
                            ])
                            <div class="row mt-40">
                                <div class="col-lg-12 text-center">
                                    <button class="primary-btn fix-gr-bg submit" id="save_button" type="button">
                                        <span class="ti-check"></span>{{ __('common.Update') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="modal fade admin-query" id="deleteBundleFile">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form action="{{ route('bundle.file.delete') }}" method="POST">
                    @csrf
                    <div class="modal-header">
                        <h4 class="modal-title">{{ __('common.Delete') }} {{ __('File') }}</h4>
                        <button type="button" class="close" data-dismiss="modal"><i class="ti-close"></i></button>
                    </div>
                    <div class="modal-body">
                        <div class="text-center">
                            <h4>{{ __('common.Are you sure to delete ?') }}</h4>
                        </div>
                        <input type="hidden" name="id" value="" id="bundleFileDeleteId">
                        <div class="d-flex justify-content-between mt-40">
                            <button type="button" class="primary-btn tr-bg" data-dismiss="modal">{{ __('common.Cancel') }}</button>
                            <button class="primary-btn fix-gr-bg" type="submit">{{ __('common.Delete') }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    @include('shop::bundle._form_scripts', ['formId' => 'update_bundle_form'])
@endpush
