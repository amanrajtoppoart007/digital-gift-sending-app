<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            StateTableSeeder::class,
            /*UsersTableSeeder::class,*/
            PermissionsTableSeeder::class,
            RolesTableSeeder::class,
            PermissionRoleTableSeeder::class,
            AdminsTableSeeder::class,
            RoleAdminTableSeeder::class,
            /*RoleUserTableSeeder::class,*/
            MessagesTableSeeder::class

        ]);
    }
}
