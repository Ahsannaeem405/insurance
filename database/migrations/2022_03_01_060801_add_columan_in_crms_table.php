<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumanInCrmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('crms', function (Blueprint $table) {
            $table->date('dob')->nullable();
            $table->text('addreess')->nullable();
            $table->text('phone')->nullable();
            $table->text('notes')->nullable();
            $table->timestamp('created')->nullable();
            $table->timestamp('eightMonth')->nullable();
            $table->timestamp('NineMonth')->nullable();
            $table->timestamp('twelveMonth')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('crms', function (Blueprint $table) {
            $table->date('dob')->nullable();
            $table->text('addreess')->nullable();
            $table->text('phone')->nullable();
            $table->text('notes')->nullable();
        });
    }
}
