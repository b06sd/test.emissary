<?php

return [
    'role_structure' => [
        'superadministrator' => [
            'courier' => 'c,r,u,d',
            'units' => 'c,r,u,d',
            'users' => 'c,r,u,d',
            'acl' => 'c,r,u,d',
            'delivery' => 'c,r,u,d',
            'schedule' => 'c,r,u,d',
            'company' => 'c,r,u,d',
            'profile' => 'r,u'
        ],
        'administrator' => [
            'users' => 'c,r,u,d',
            'company' => 'c,r,u,d',
            'profile' => 'r,u',
            'delivery' => 'c,r,u',
            'schedule' => 'c,r,u'
        ],
        'units' => [
            'delivery' => 'r',
            'schedule' => 'c,r,u',
            'profile' => 'r,u'
        ],
        'courier' => [
            'delivery' => 'r,u',
            'profile' => 'r,u'
        ],
    ],
    'permissions_map' => [
        'c' => 'create',
        'r' => 'read',
        'u' => 'update',
        'd' => 'delete'
    ]
];
