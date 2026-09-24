@extends('backend.master')

@section('mainContent')
    {!! generateBreadcrumb() !!}

    <section class="admin-visitor-area up_st_admin_visitor">
        <div class="container-fluid p-0">
            <div class="row pt-0">
                <div class="col-12">
                    <div class="box_header common_table_header">
                        <div class="main-title d-md-flex w-100">
                            <h3 class="mb-0">CE Courses</h3>
                            <ul class="d-flex ml-auto">
                                <li>
                                    <button type="button" class="primary-btn fix-gr-bg" disabled title="Available in Phase 2">
                                        <i class="ti-plus"></i> Add CE Course
                                    </button>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="white_box mb_30">
                        <div class="white_box_tittle list_header">
                            <h4>Mandatory &amp; Elective Courses</h4>
                        </div>
                        <div class="QA_section QA_section_heading_custom check_box_table">
                            <div class="QA_table">
                                <table class="table Crm_table_active3">
                                    <thead>
                                        <tr>
                                            <th scope="col">Title</th>
                                            <th scope="col">Category</th>
                                            <th scope="col">Contact Hours</th>
                                            <th scope="col">Audience</th>
                                            <th scope="col">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td colspan="5" class="text-center py-5">
                                                <p class="mb-2">No CE courses yet.</p>
                                                <p class="text-muted mb-0">Course creation will be enabled in Phase 2.</p>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
