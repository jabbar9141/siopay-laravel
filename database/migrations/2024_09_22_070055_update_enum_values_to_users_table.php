<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class UpdateEnumValuesToUsersTable extends Migration
{
   /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            DB::statement("ALTER TABLE `users` MODIFY COLUMN `user_type` ENUM('user', 'courier', 'dispatcher','admin','mobile','agent','kyc_manager','account_manager') NOT NULL");
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
            DB::statement("ALTER TABLE `users` MODIFY COLUMN `user_type` ENUM('user', 'courier', 'dispatcher','admin','mobile','agent','kyc_manager','account_manager') NOT NULL");
        });
    }
}
