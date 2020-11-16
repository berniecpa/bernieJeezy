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
                'title' => 'song_create',
            ],
            [
                'id'    => 18,
                'title' => 'song_edit',
            ],
            [
                'id'    => 19,
                'title' => 'song_show',
            ],
            [
                'id'    => 20,
                'title' => 'song_delete',
            ],
            [
                'id'    => 21,
                'title' => 'song_access',
            ],
            [
                'id'    => 22,
                'title' => 'song_summary_create',
            ],
            [
                'id'    => 23,
                'title' => 'song_summary_edit',
            ],
            [
                'id'    => 24,
                'title' => 'song_summary_show',
            ],
            [
                'id'    => 25,
                'title' => 'song_summary_delete',
            ],
            [
                'id'    => 26,
                'title' => 'song_summary_access',
            ],
            [
                'id'    => 27,
                'title' => 'song_work_create',
            ],
            [
                'id'    => 28,
                'title' => 'song_work_edit',
            ],
            [
                'id'    => 29,
                'title' => 'song_work_show',
            ],
            [
                'id'    => 30,
                'title' => 'song_work_delete',
            ],
            [
                'id'    => 31,
                'title' => 'song_work_access',
            ],
            [
                'id'    => 32,
                'title' => 'song_hook_create',
            ],
            [
                'id'    => 33,
                'title' => 'song_hook_edit',
            ],
            [
                'id'    => 34,
                'title' => 'song_hook_show',
            ],
            [
                'id'    => 35,
                'title' => 'song_hook_delete',
            ],
            [
                'id'    => 36,
                'title' => 'song_hook_access',
            ],
            [
                'id'    => 37,
                'title' => 'song_verse_create',
            ],
            [
                'id'    => 38,
                'title' => 'song_verse_edit',
            ],
            [
                'id'    => 39,
                'title' => 'song_verse_show',
            ],
            [
                'id'    => 40,
                'title' => 'song_verse_delete',
            ],
            [
                'id'    => 41,
                'title' => 'song_verse_access',
            ],
            [
                'id'    => 42,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
