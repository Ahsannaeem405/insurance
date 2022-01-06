<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConditionQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('condition_questions', function (Blueprint $table) {
            $table->id();
            $table->integer('condition_id')->nullable();
            $table->text('condition')->nullable();
            $table->text('question')->nullable();
            $table->integer('question_id')->nullable();
            $table->integer('type_id')->nullable();
            $table->integer('if_yes')->nullable();
            $table->integer('if_no')->nullable();
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
        Schema::dropIfExists('condition_questions');
    }
}
