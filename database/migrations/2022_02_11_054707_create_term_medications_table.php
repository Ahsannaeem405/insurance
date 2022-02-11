<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTermMedicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('term_medications', function (Blueprint $table) {
            $table->id();
            $table->integer('medication_id')->nullable();
            $table->text('medication_e');
            $table->text('condition_e');
            $table->text('condition_id');
            $table->text('medication_s');
            $table->text('condition_s');
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
        Schema::dropIfExists('term_medications');
    }
}
