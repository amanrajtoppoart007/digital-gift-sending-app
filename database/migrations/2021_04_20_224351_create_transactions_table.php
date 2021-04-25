<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('payment_id');
            $table->string('txnid')->nullable();
            $table->string('firstname')->nullable();
            $table->text('productinfo')->nullable();
            $table->string('status')->nullable();
            $table->string('mode')->nullable();
            $table->string('amount')->nullable();
            $table->string('net_amount_debit')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->json('data')->nullable();
            $table->timestamps();
             $table->foreign('payment_id', 'payment_fk_3068082')->references('id')->on('payments')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactions');
    }
}
