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
        'np' => 'NP',
        'cna' => 'CNA',
    ],

    'audience_groups' => [
        'rn_lpn' => 'RN & LPN',
        'aprn_np' => 'APRN & NP',
        'cna' => 'CNA',
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
        'teal' => 'RN & LPN',
        'terra' => 'APRN & NP',
        'cna' => 'CNA',
    ],

    // Card style → frontend packages page (button URL is derived automatically).
    'license_detail_routes' => [
        'teal' => 'continuingEducationRnLpn',
        'terra' => 'continuingEducationAprn',
        'cna' => 'continuingEducationCna',
    ],

    'license_anchor_ids' => [
        'teal' => 'rn-lpn-packages',
        'terra' => 'aprn-packages',
        'cna' => 'cna-packages',
    ],

    'license_type_card_styles' => [
        'rn_lpn' => 'teal',
        'aprn' => 'terra',
        'aprn_np' => 'terra',
        'cna' => 'cna',
    ],

    'bundle_license_types' => [
        'rn_lpn' => 'RN & LPN',
        'aprn' => 'APRN & NP',
        'cna' => 'CNA',
    ],

    'bundle_card_styles' => [
        'primary' => 'Primary (dark card)',
        'secondary' => 'Secondary (light card)',
    ],
];
