<?php

use App\Models\Order;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('customer_id');
            $table->foreign('customer_id')->references('id')->on('customers');
            $table->unsignedBigInteger('coupon_id')->nullable();
            $table->unsignedBigInteger('delivery_charge')->nullable();
            $table->string('delivery_type')->nullable();
            $table->unsignedBigInteger('delivery_information_id');
            $table->unsignedBigInteger('order_total');
            $table->string('order_note')->nullable();
            $table->string('cancel_remark')->nullable();
            $table->string('payment_method')->default(Order::CASH_ON_DELIVERY);
            $table->string('status', 50)->default(Order::PENDING);
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
        Schema::dropIfExists('orders');
    }
};
