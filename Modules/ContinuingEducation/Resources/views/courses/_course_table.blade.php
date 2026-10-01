<div class="QA_section QA_section_heading_custom check_box_table">
    <div class="QA_table">
        <div class="table-responsive">
            <table class="table Crm_table_active3">
                <thead>
                    <tr>
                        <th scope="col">{{ trans('common.SL') }}</th>
                        <th scope="col">Title</th>
                        <th scope="col">Contact Hours</th>
                        <th scope="col">Licence Category</th>
                        <th scope="col">Status</th>
                        <th scope="col">{{ trans('common.Action') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($courses as $key => $course)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $course->title }}</td>
                            <td>{{ number_format((float) $course->contact_hours, 1) }}h</td>
                            <td>
                                @if (!empty($course->audience_labels))
                                    {{ implode(', ', $course->audience_labels) }}
                                @else
                                    —
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('continuing-education.courses.status', ['id' => $course->id, 'tab' => $tab]) }}"
                                    class="primary-btn small {{ $course->status && $course->publish ? 'fix-gr-bg' : 'tr-bg' }}">
                                    {{ $course->status && $course->publish ? 'Active' : 'Inactive' }}
                                </a>
                            </td>
                            <td>
                                @include('continuingeducation::courses._course_action_td', [
                                    'course' => $course,
                                    'tab' => $tab,
                                ])
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center py-5">
                                <p class="mb-2">No {{ strtolower($courseTypes[$tab] ?? $tab) }} courses yet.</p>
                                <p class="text-muted mb-0">
                                    <a href="{{ route('continuing-education.courses.create') }}">Add a CE course</a>
                                </p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
