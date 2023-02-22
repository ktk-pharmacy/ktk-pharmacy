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
            $table->string('name')->after('id');
            $table->string('slug')->after('name');
            $table->longText('description')->after('slug');
            $table->longText('product_details')->nullable()->after('description');
            $table->string('image_url')->default('assets/images/meeting-01.jpg')->after('product_details');
            $table->string('MOU')->nullable()->comment('measure of unit')->after('image_url');
            $table->string('packaging')->default(1)->after('MOU');
            $table->boolean('availability')->after('packaging');
            $table->unsignedBigInteger('brand_id')->nullable()->after('availability');
            $table->foreign('brand_id')->references('id')->on('brands')->onDelete('set null');
            $table->unsignedBigInteger('sub_category_id')->nullable()->after('brand_id');
            $table->foreign('sub_category_id')->references('id')->on('sub_categories')->onDelete('set null');
            $table->longText('other_information')->nullable()->after('sub_category_id');
            $table->boolean('status')->default(1)->comment('1 is Active, 0 is Unactive')->after('other_information');
            $table->string('manufacturer')->after('status');
            $table->string('distributed_by')->after('manufacturer');
            $table->timestamp('deleted_at')->nullable()->after('distributed_by');
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
            $table->dropColumn([
                'name',
                'slug',
                'description',
                'product_details',
                'image_url',
                'MOU',
                'packaging',
                'availability',
                'brand_id',
                'sub_category_id',
                'other_information',
                'status',
                'manufacturer',
                'distributed_by',
                'deleted_at'
            ]);
        });
    }
};
