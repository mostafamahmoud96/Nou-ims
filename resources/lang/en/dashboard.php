<?php

use App\Models\User;

return [
    'user_mangment' => 'User Management',
    'user_type' => 'User Type',
    'user_types' => [
        User::TYPE_EEAA_ADMIN => 'EEAA Admin',
        User::TYPE_IMPORTER => 'Importer',
        User::TYPE_NOU_ADMIN => 'NOU Admin',
    ],
    'phone' => 'Phone',
];
