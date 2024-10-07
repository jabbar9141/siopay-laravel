<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSmtpsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasColumns('smtps', ['mail_host', 'mail_port', 'mail_encreption', 'mail_username', 'mail_password', 'mail_from_addressed', 'set_as_default'])) {

            Schema::create('smtps', function (Blueprint $table) {
                $table->id();
                $table->string('mail_host')->nullable();
                $table->string('mail_port')->nullable();
                $table->string('mail_encreption')->nullable();
                $table->string('mail_username')->nullable();
                $table->string('mail_password')->nullable();
                $table->string('mail_from_addressed')->nullable();
                $table->boolean('set_as_default')->nullable()->default(false);
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::dropIfExists('smtps');
    }
}
