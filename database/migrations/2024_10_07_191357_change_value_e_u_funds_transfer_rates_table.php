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
            // $table->dropColumn('calc');
            // $table->enum('calc', ['percentage', 'fixed'])->change();
            DB::query("ALTER TABLE e_u_funds_transfer_rates CHANGE COLUMN permissions calc ENUM('percentage', 'fixed',)");
        });
        Schema::table('intl_funds_transfer_rates', function (Blueprint $table) {
            // $table->dropColumn('calc');
            DB::query("ALTER TABLE intl_funds_transfer_rates CHANGE COLUMN permissions calc ENUM('percentage', 'fixed',)");
            // $table->enum('calc', ['percentage', 'fixed'])->change();
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
            Schema::dropIfExist('e_u_funds_transfer_rates');
            
            Schema::dropIfExist('intl_funds_transfer_rates');
        });
    }
}
