<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddExternalApplicantIdToKycTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('kyc', function (Blueprint $table) {
            //external id for the users KYC externaly at siodatacheck
            $table->string('external_applicant_id')->after('user_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('kyc', function (Blueprint $table) {
            //
        });
    }
}
