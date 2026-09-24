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

    // Top navbar profile dropdown — CE portal only.
    'navbar_menu' => [
        [
            'label' => 'Home',
            'url' => '/',
            'translation' => 'frontendmanage.Home',
        ],
        [
            'label' => 'My Profile',
            'route' => 'cePortal.profile',
            'translation' => 'frontendmanage.My Profile',
            'active' => ['cePortal.profile'],
        ],
        [
            'label' => 'Account Settings',
            'route' => 'cePortal.account',
            'translation' => 'frontend.Account Settings',
            'active' => ['cePortal.account'],
        ],
        [
            'label' => 'Log Out',
            'route' => 'logout',
            'translation' => 'frontend.Log Out',
        ],
    ],
];
