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
        Schema::table('service_settings', function (Blueprint $table) {
            $table->string('bg_url')->default('assets/images/service-item-bg.jpg')->after('description');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('service_settings', function (Blueprint $table) {
            $table->dropColumn('bg_url');
        });
    }
};
