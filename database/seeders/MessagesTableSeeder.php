<?php

namespace Database\Seeders;

use App\Models\Message;
use Illuminate\Database\Seeder;

class MessagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $messages = [
            [
                'id'                 => 1,
                 'type'=>'payment_success_message',
                  'message'=>'Your payment was successful! If you paid via PayUMoney, you will receive a receipt from PayUMoney.Thank you! for sending gift to your loved one'
            ],

        ];

        Message::insert($messages);
    }
}
