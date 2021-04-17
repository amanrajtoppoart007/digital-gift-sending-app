<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admins = [
            [
                'id'                 => 1,
                'name'               => 'Primary Admin',
                'email'              => 'primaryadmin@gmail.com',
                'password'           => bcrypt('password'),
                'remember_token'     => null,
                'approved'           => 1,
                'verified'           => 1,
                'verified_at'        => date("Y-m-d H:i:s"),
                'verification_token' => '',
                'mobile'             => '8839421623',
            ],
            [
                'id'                 => 2,
                'name'               => 'Admin',
                'email'              => 'administrator@example.com',
                'password'           => bcrypt('password'),
                'remember_token'     => null,
                'approved'           => 1,
                'verified'           => 1,
                'verified_at'        => date("Y-m-d H:i:s"),
                'verification_token' => '',
                'mobile'             => '8839421623',
            ],
        ];

        Admin::insert($admins);
    }
}
