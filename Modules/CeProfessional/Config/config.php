<?php

return [
    'name' => 'CeProfessional',
    'role_id' => 10,
    'register_source' => 'ce_portal',

    'license_types' => [
        'rn' => 'Registered Nurse (RN)',
        'lpn' => 'Licensed Practical Nurse (LPN)',
        'aprn' => 'Advanced Practice RN (APRN)',
    ],

    // Figma navbar items — rendered vertically in the CE sidebar.
    'sidebar_menu' => [
        [
            'route' => 'cePortal',
            'label' => 'Dashboard',
            'icon' => 'dashboard',
            'active' => ['cePortal'],
        ],
        [
            'label' => 'My Courses',
            'icon' => 'courses',
            'coming_soon' => true,
        ],
        [
            'label' => 'Certificates',
            'icon' => 'certificates',
            'coming_soon' => true,
        ],
        [
            'label' => 'Community',
            'icon' => 'community',
            'coming_soon' => true,
        ],
        [
            'label' => 'Browse Courses',
            'icon' => 'browse',
            'url' => '/prep-courses',
        ],
    ],
];
