<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_histories', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('payment_id')->unsigned();
            $table->double('amount');
            $table->string('transaction_id')->nullable();
            $table->string('entity')->nullable();
            $table->string('currency')->nullable();
            $table->string('status')->nullable();
            $table->string('order_id')->nullable();
            $table->string('invoice_id')->nullable();
            $table->string('international')->nullable();
            $table->string('method')->nullable();
            $table->string('amount_refunded')->nullable();
            $table->string('refund_status')->nullable();
            $table->string('captured')->nullable();
            $table->string('description')->nullable();
            $table->string('card_id')->nullable();
            $table->string('bank')->nullable();
            $table->string('wallet')->nullable();
            $table->string('vpa')->nullable();
            $table->string('email')->nullable();
            $table->string('contact')->nullable();
            $table->text('notes')->nullable();
            $table->string('fee')->nullable();
            $table->string('tax')->nullable();
            $table->string('error_code')->nullable();
            $table->string('error_description')->nullable();
            $table->string('error_source')->nullable();
            $table->string('error_step')->nullable();
            $table->string('error_reason')->nullable();
            $table->string('payment_date')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('payment_id')->references('id')->on('payments')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payment_histories');
    }
}
