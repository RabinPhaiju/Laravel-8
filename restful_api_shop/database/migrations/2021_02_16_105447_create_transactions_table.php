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
            $table->integer('quantity')->unsigned();
            $table->unsignedBigInteger('buyer_id');
            $table->unsignedBigInteger('product_id');
            $table->timestamps();

            $table->foreign('buyer_id')->references('id')->on('users')->unsigned()->onDelete('cascade');
            $table->foreign('product_id')->references('id')->on('products')->unsigned()->onDelete('cascade');
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
