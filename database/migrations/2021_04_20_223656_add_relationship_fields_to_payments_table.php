<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('payments', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('state_id')->nullable();
            $table->unsignedBigInteger('template_id');
            $table->foreign('user_id', 'user_fk_3068082')->references('id')->on('users')->onDelete('cascade');
             $table->foreign('state_id', 'state_fk_3068082')->references('id')->on('states')->onDelete('cascade');
             $table->foreign('template_id', 'template_fk_3068082')->references('id')->on('templates')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('payments', function (Blueprint $table) {
            //
        });
    }
}
