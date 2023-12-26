<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentRefundsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_refunds', function (Blueprint $table) {
            $table->id();
            $table->string('refund_id');
            $table->bigInteger('user_id')->unsigned();
            $table->string('payment_id');
            $table->double('amount');
            $table->string('entity')->nullable();
            $table->string('currency')->nullable();
            $table->text('notes')->nullable();
            $table->string('receipt')->nullable();
            $table->string('batch_id')->nullable();
            $table->string('status')->nullable();
            $table->string('speed_processed')->nullable();
            $table->string('speed_requested')->nullable();
            $table->string('payment_date')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            //  $table->foreign('payment_id')->references('transaction_id')->on('payments')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payment_refunds');
    }
}
