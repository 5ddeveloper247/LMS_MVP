<?php

return [
    'name' => 'ContinuingEducation',

    'course_types' => [
        'mandatory' => 'Mandatory',
        'elective' => 'Elective',
    ],

    // Linked row in `courses` so CE can reuse prep curriculum (chapters/lessons).
    // Not included in the prep course listing (types 1, 2, 7, 9).
    'lms_course_type' => 11,

    'audiences' => [
        'rn' => 'RN',
        'lpn' => 'LPN',
        'aprn' => 'APRN',
    ],

    'audience_groups' => [
        'rn' => 'RN',
        'lpn_aprn' => 'LPN/APRN',
    ],

    'enrollment_statuses' => [
        'not_started' => 'Not Started',
        'in_progress' => 'In Progress',
        'completed' => 'Completed',
    ],

    'compliance_topics' => [
        'Prevention of Medical Errors',
        'Human Trafficking',
        'HIV/AIDS',
        'Florida Laws & Rules',
        'Recognizing Impairment',
        'Domestic Violence',
        'General Electives',
    ],

    'license_card_styles' => [
        'teal' => 'Teal (RN / LPN)',
        'terra' => 'Terracotta (APRN)',
    ],

    // Card style → frontend packages page (button URL is derived automatically).
    'license_detail_routes' => [
        'teal' => 'continuingEducationRnLpn',
        'terra' => 'continuingEducationAprn',
    ],

    'license_anchor_ids' => [
        'teal' => 'rn-lpn-packages',
        'terra' => 'aprn-packages',
    ],
];
