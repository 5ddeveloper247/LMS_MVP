<?php

namespace Modules\ContinuingEducation\Services;

use App\User;

class CeCourseFormDataService
{
    public function get(): array
    {
        $instructorQuery = User::select('name', 'id');
        if (isModuleActive('UserType')) {
            $instructorQuery->whereHas('userRoles', function ($q) {
                $q->whereIn('role_id', [1, 2]);
            });
        } else {
            $instructorQuery->whereIn('role_id', [1, 2]);
        }

        return [
            'instructors' => $instructorQuery->get(),
            'courseTypes' => config('continuingeducation.course_types', []),
            'audienceGroups' => config('continuingeducation.audience_groups', []),
            'complianceTopics' => config('continuingeducation.compliance_topics', []),
        ];
    }
}
