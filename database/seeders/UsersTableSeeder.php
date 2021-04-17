<?php

namespace Database\Seeders;

use App\Models\State;
use App\Models\User;
use Faker\Provider\Address;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $users = [
            [
                'id'                 => 1,
                'name'               => 'Krishak Vikas',
                'email'              => 'moderator@krishakvikas.com',
                'password'           => bcrypt('password'),
                'remember_token'     => null,
                 'state_id'           => (State::inRandomOrder()->first())->id,
                'approved'           => 1,
                'verified'           => 1,
                'verified_at'        => '2021-01-26 15:07:08',
                'verification_token' => '',
                'mobile'             => '1234567890',
                'city'=>'',
                'address'=>Address::asciify()
            ],
        ];

        User::insert($users);
    }
}
