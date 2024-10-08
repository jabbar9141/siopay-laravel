<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class ChangeValueEUFundsTransferRatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('e_u_funds_transfer_rates', function (Blueprint $table) {
            // $table->enum('calc', ['percentage', 'fixed'])->change();
            DB::query("ALTER TABLE e_u_funds_transfer_rates CHANGE COLUMN permissions ENUM('percentage', 'fixed')");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('e_u_funds_transfer_rates', function (Blueprint $table) {
            // Schema::dropIfExist('e_u_funds_transfer_rates');
        });
    }
}
