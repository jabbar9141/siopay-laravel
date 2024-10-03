<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentGatwaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_gatways', function (Blueprint $table) {
            $table->id();
            $table->string('account_mode')->nullable();
            $table->string('public_key')->nullable();
            $table->string('secret_key')->nullable();
            $table->string('account_name')->nullable();
            $table->boolean('set_as_default')->nullable()->default(true);
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
        Schema::dropIfExists('payment_gatways');
    }
}
