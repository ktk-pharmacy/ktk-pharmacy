<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->unsignedBigInteger('price')->nullable()->after('description');
            $table->unsignedBigInteger('sale_price')->nullable()->after('price');
            $table->unsignedBigInteger('discount_amount')->nullable()->after('sale_price');
            $table->string('discount_type')->nullable()->after('discount_amount');
            $table->timestamp('discount_from')->nullable()->after('discount_type');
            $table->timestamp('discount_to')->nullable()->after('discount_from');
            $table->unsignedBigInteger('stock')->nullable()->after('discount_to');
            $table->boolean('is_new')->default(0)->comment('1 is New, 0 is Old')->after('stock');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn(['price','sale_price','discount_amount','discount_type','discount_from','discount_to','stock','is_new']);
        });
    }
};
