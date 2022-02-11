<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTermComboConditionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('term_combo_conditions', function (Blueprint $table) {
            $table->id();
            $table->integer('condition_id')->nullable();
            $table->text('group_1')->nullable();
            $table->text('group_2')->nullable();
            $table->text('group_3')->nullable();
            $table->text('group_4')->nullable();
            $table->text('group_5')->nullable();
            $table->text('group_6')->nullable();
            $table->text('group_7')->nullable();
            $table->text('group_8')->nullable();
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
        Schema::dropIfExists('term_combo_conditions');
    }
}
