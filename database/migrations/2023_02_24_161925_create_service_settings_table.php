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
        Schema::create('service_settings', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('image_url')->default('assets/images/service-icon-01.png');
            $table->longText('description');
            $table->boolean('status')->default(1)->comment('1 is Active, 0 is Unactive');
            $table->timestamp('deleted_at')->nullable();
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
        Schema::dropIfExists('service_settings');
    }
};
