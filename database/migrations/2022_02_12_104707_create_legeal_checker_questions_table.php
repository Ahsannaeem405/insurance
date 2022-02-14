<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLegealCheckerQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('legeal_checker_questions', function (Blueprint $table) {
            $table->id();
            $table->integer('offense_id')->nullable();
            $table->text('question_type')->nullable();
            $table->text('question')->nullable();
            $table->integer('question_id')->nullable();
            $table->integer('type_id')->nullable();
            $table->integer('if_yes')->nullable();
            $table->integer('if_no')->nullable();
             $table->integer('offense_id_next')->nullable();
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
        Schema::dropIfExists('legeal_checker_questions');
    }
}
