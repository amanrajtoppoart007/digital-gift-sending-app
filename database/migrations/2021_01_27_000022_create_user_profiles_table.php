<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserProfilesTable extends Migration
{
    public function up()
    {
        Schema::create('user_profiles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('bank_name');
            $table->string('ifsc_code');
            $table->string('account_number');
            $table->text('user_image');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
