<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUserUniqueIdToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('user_unique_id')->nullable();
            $table->bigInteger('currency_id')->nullable();
            $table->bigInteger('kyc_manager_id')->nullable();
            $table->bigInteger('account_manager_id')->nullable();
            $table->string('gender')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->string('tax_code')->nullable();
            $table->bigInteger('city_id')->nullable();
            $table->string('surname')->nullable();
            $table->text('address')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'user_unique_id',
                'currecy_id',
                'kyc_manager_id',
                'account_manager_id',
                'gender',
                'date_of_birth',
                'tax_code',
                'city_id',
                'surname',
                'address'
            ]);
        });
    }
}
