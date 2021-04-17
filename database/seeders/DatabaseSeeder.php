<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            PermissionsTableSeeder::class,
            RolesTableSeeder::class,
            PermissionRoleTableSeeder::class,
            UsersTableSeeder::class,
            AdminsTableSeeder::class,
            RoleAdminTableSeeder::class,
            RoleUserTableSeeder::class,
            StateTableSeeder::class
        ]);
    }
}
