{{-- Include from faq/index when category add/edit/delete UI is needed again --}}
<div class="col-lg-12 mb-30">
    <div class="QA_section QA_section_heading_custom check_box_table">
        <div class="main-title mb-20">
            <h3 class="mb-0">{{ __('common.Category') }}</h3>
        </div>
        <div class="QA_table">
            <table class="table Crm_table_active3">
                <thead>
                <tr>
                    <th>{{ __('common.Name') }}</th>
                    <th>Slug</th>
                    <th>Eyebrow</th>
                    <th>Section title</th>
                    <th>{{ __('common.Status') }}</th>
                    <th>{{ __('common.Action') }}</th>
                </tr>
                </thead>
                <tbody>
                @forelse($categories as $category)
                    <tr>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->slug }}</td>
                        <td>{{ $category->eyebrow }}</td>
                        <td>{{ $category->section_title }}</td>
                        <td>{{ $category->status ? __('common.Active') : __('common.Inactive') }}</td>
                        <td>
                            <button type="button" class="primary-btn small fix-gr-bg edit-faq-category"
                                    data-item='@json($category)'>{{ __('common.Edit') }}</button>
                            <button type="button" class="primary-btn small tr-bg delete-faq-category"
                                    data-id="{{ $category->id }}">{{ __('common.Delete') }}</button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center">{{ __("common.No data available in the table") }}</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="modal fade admin-query" id="add_faq_category">
    <div class="modal-dialog modal_800px modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">{{ __('common.Add') }} {{ __('common.Category') }}</h4>
                <button type="button" class="close" data-dismiss="modal"><i class="ti-close"></i></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('frontend.faq.category.store') }}" method="POST">
                    @csrf
                    @include('frontendmanage::faq.partials.category_fields')
                    <div class="col-lg-12 text-center pt_15">
                        <button class="primary-btn semi_large2 fix-gr-bg" type="submit"><i class="ti-check"></i> {{ __('common.Save') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade admin-query" id="edit_faq_category">
    <div class="modal-dialog modal_800px modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">{{ __('common.Edit') }} {{ __('common.Category') }}</h4>
                <button type="button" class="close" data-dismiss="modal"><i class="ti-close"></i></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('frontend.faq.category.update') }}" method="POST" id="faq_category_update_form">
                    @csrf
                    <input type="hidden" name="id" id="faqCategoryId">
                    @include('frontendmanage::faq.partials.category_fields', ['prefix' => 'edit'])
                    <div class="col-lg-12 text-center pt_15">
                        <button class="primary-btn semi_large2 fix-gr-bg" type="submit"><i class="ti-check"></i> {{ __('common.Update') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade admin-query" id="delete_faq_category">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">{{ __('common.Delete') }} {{ __('common.Category') }}</h4>
                <button type="button" class="close" data-dismiss="modal"><i class="ti-close"></i></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('frontend.faq.category.destroy') }}" method="post">
                    @csrf
                    <div class="text-center"><h4>{{ __('common.Are you sure to delete ?') }}</h4></div>
                    <input type="hidden" name="id" value="" id="faqCategoryDeleteId">
                    <div class="mt-40 d-flex justify-content-between">
                        <button type="button" class="primary-btn tr-bg" data-dismiss="modal">{{ __('common.Cancel') }}</button>
                        <button class="primary-btn fix-gr-bg" type="submit">{{ __('common.Delete') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
