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
            $table->foreignId('travel_packages_id')->constrained();
            $table->foreignId('users_id')->nullable()->constrained();
            $table->integer('additional_visa');
            $table->integer('transaction_total');
            $table->enum('transaction_status', ['IN CART', 'ONGOING', 'SUCCESS', 'CANCEL', 'FAILED']);
            $table->softDeletes();
            $table->timestamps();
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
