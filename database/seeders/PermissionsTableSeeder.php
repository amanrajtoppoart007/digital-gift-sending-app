<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 2,
                'title' => 'permission_create',
            ],
            [
                'id'    => 3,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 4,
                'title' => 'permission_show',
            ],
            [
                'id'    => 5,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 6,
                'title' => 'permission_access',
            ],
            [
                'id'    => 7,
                'title' => 'role_create',
            ],
            [
                'id'    => 8,
                'title' => 'role_edit',
            ],
            [
                'id'    => 9,
                'title' => 'role_show',
            ],
            [
                'id'    => 10,
                'title' => 'role_delete',
            ],
            [
                'id'    => 11,
                'title' => 'role_access',
            ],
            [
                'id'    => 12,
                'title' => 'user_create',
            ],
            [
                'id'    => 13,
                'title' => 'user_edit',
            ],
            [
                'id'    => 14,
                'title' => 'user_show',
            ],
            [
                'id'    => 15,
                'title' => 'user_delete',
            ],
            [
                'id'    => 16,
                'title' => 'user_access',
            ],

            [
                'id'    => 17,
                'title' => 'user_alert_create',
            ],
            [
                'id'    => 18,
                'title' => 'user_alert_show',
            ],
            [
                'id'    => 19,
                'title' => 'user_alert_delete',
            ],
            [
                'id'    => 20,
                'title' => 'user_alert_access',
            ],
            [
                'id'    => 21,
                'title' => 'audit_log_show',
            ],
            [
                'id'    => 22,
                'title' => 'audit_log_access',
            ],
            [
                'id'    => 23,
                'title' => 'setting_create',
            ],
            [
                'id'    => 24,
                'title' => 'setting_edit',
            ],
            [
                'id'    => 25,
                'title' => 'setting_show',
            ],
            [
                'id'    => 26,
                'title' => 'setting_delete',
            ],
            [
                'id'    => 27,
                'title' => 'setting_access',
            ],
            [
                'id'    => 28,
                'title' => 'admin_management_access',
            ],
            [
                'id'    => 29,
                'title' => 'admin_create',
            ],
            [
                'id'    => 30,
                'title' => 'admin_edit',
            ],
            [
                'id'    => 31,
                'title' => 'admin_show',
            ],
            [
                'id'    => 32,
                'title' => 'admin_delete',
            ],
            [
                'id'    => 33,
                'title' => 'admin_access',
            ],
            [
                'id'    => 34,
                'title' => 'city_create',
            ],
            [
                'id'    => 35,
                'title' => 'city_edit',
            ],
            [
                'id'    => 36,
                'title' => 'city_show',
            ],
            [
                'id'    => 37,
                'title' => 'city_delete',
            ],
            [
                'id'    => 38,
                'title' => 'city_access',
            ],

            [
                'id'    => 39,
                'title' => 'user_profile_edit',
            ],
            [
                'id'    => 40,
                'title' => 'user_profile_show',
            ],
            [
                'id'    => 41,
                'title' => 'user_profile_delete',
            ],
            [
                'id'    => 42,
                'title' => 'user_profile_access',
            ],

            [
                'id'    => 43,
                'title' => 'franchisee_profile_access',
            ],
            [
                'id'    => 44,
                'title' => 'profile_password_edit',
            ],
            [
                'id'    => 45,
                'title' => 'payments_show',
            ],
            [
                'id'    => 46,
                'title' => 'transactions_show',
            ],
            [
                'id'    => 47,
                'title' => 'enquiries_show',
            ],
            [
                'id'    => 48,
                'title' => 'enquiry_delete',
            ],
        ];

        Permission::insert($permissions);
    }
}
