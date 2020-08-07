<?php

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
                'title' => 'team_create',
            ],
            [
                'id'    => 18,
                'title' => 'team_edit',
            ],
            [
                'id'    => 19,
                'title' => 'team_show',
            ],
            [
                'id'    => 20,
                'title' => 'team_delete',
            ],
            [
                'id'    => 21,
                'title' => 'team_access',
            ],
            [
                'id'    => 22,
                'title' => 'currency_create',
            ],
            [
                'id'    => 23,
                'title' => 'currency_edit',
            ],
            [
                'id'    => 24,
                'title' => 'currency_show',
            ],
            [
                'id'    => 25,
                'title' => 'currency_delete',
            ],
            [
                'id'    => 26,
                'title' => 'currency_access',
            ],
            [
                'id'    => 27,
                'title' => 'admin_menu_access',
            ],
            [
                'id'    => 28,
                'title' => 'broker_create',
            ],
            [
                'id'    => 29,
                'title' => 'broker_edit',
            ],
            [
                'id'    => 30,
                'title' => 'broker_show',
            ],
            [
                'id'    => 31,
                'title' => 'broker_delete',
            ],
            [
                'id'    => 32,
                'title' => 'broker_access',
            ],
            [
                'id'    => 33,
                'title' => 'transaction_create',
            ],
            [
                'id'    => 34,
                'title' => 'transaction_edit',
            ],
            [
                'id'    => 35,
                'title' => 'transaction_show',
            ],
            [
                'id'    => 36,
                'title' => 'transaction_delete',
            ],
            [
                'id'    => 37,
                'title' => 'transaction_access',
            ],
            [
                'id'    => 38,
                'title' => 'audit_log_show',
            ],
            [
                'id'    => 39,
                'title' => 'audit_log_access',
            ],
            [
                'id'    => 40,
                'title' => 'content_management_access',
            ],
            [
                'id'    => 41,
                'title' => 'content_category_create',
            ],
            [
                'id'    => 42,
                'title' => 'content_category_edit',
            ],
            [
                'id'    => 43,
                'title' => 'content_category_show',
            ],
            [
                'id'    => 44,
                'title' => 'content_category_delete',
            ],
            [
                'id'    => 45,
                'title' => 'content_category_access',
            ],
            [
                'id'    => 46,
                'title' => 'content_tag_create',
            ],
            [
                'id'    => 47,
                'title' => 'content_tag_edit',
            ],
            [
                'id'    => 48,
                'title' => 'content_tag_show',
            ],
            [
                'id'    => 49,
                'title' => 'content_tag_delete',
            ],
            [
                'id'    => 50,
                'title' => 'content_tag_access',
            ],
            [
                'id'    => 51,
                'title' => 'content_page_create',
            ],
            [
                'id'    => 52,
                'title' => 'content_page_edit',
            ],
            [
                'id'    => 53,
                'title' => 'content_page_show',
            ],
            [
                'id'    => 54,
                'title' => 'content_page_delete',
            ],
            [
                'id'    => 55,
                'title' => 'content_page_access',
            ],
            [
                'id'    => 56,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
