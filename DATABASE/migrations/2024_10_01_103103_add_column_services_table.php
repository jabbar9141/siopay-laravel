<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('services', function (Blueprint $table) {
            $table->string('logo')->nullable();
            $table->boolean('status')->default(true)->nullable()->change();
            $table->float('service_charges')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('services', function (Blueprint $table) {
            //
        });
    }
}
