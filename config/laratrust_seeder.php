<?php

return [
    /**
     * Control if the seeder should create a user per role while seeding the data.
     */
    'create_users' => true,

    /**
     * Control if all the laratrust tables should be truncated before running the seeder.
     */
    'truncate_tables' => true,

    'roles_structure' => [
        'superadministrator' => [
            'users' => 'c,r,u,d',
            'payments' => 'c,r,u,d',
            'profile' => 'r,u'
        ],
        'administrator' => [
            'users' => 'c,r,u,d',
            'payments' => 'c,r,u',
            'profile' => 'r,u'
        ],
        'owner' => [
            'users' => 'c,r,u,d',
            'payments' => 'r',
            'profile' => 'r,u'
        ],
        'manager' =>[
            'users' => 'c,r,u,d',
            'payments' => 'r',
            'profile' => 'r,u',
        ],
        'hr' => [
            'users' => 'c,r,u',
            'profile' => 'r,u',
        ],
        'accountant' => [
            'profile' => 'r,u',
            'payments' => 'c,r,u',
        ],
        'academic' => [
            'users' => 'c,r,u,d',
            'profile' => 'r,u',
        ],
        'staff' => [
            'profile' => 'r,u',
        ],
        'driver' => [
            'profile' => 'r,u',
        ],
        'warden' => [
            'profile' => 'r,u',
        ],
        'student' => [
            'profile' => 'r,u',
        ],

        'role_name' => [
            'module_1_name' => 'c,r,u,d',
        ]
    ],

    'permissions_map' => [
        'c' => 'create',
        'r' => 'read',
        'u' => 'update',
        'd' => 'delete'
    ]
];
