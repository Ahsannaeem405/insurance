<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaleNotSmokerTwentyfivesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('male_not_smoker_twentyfives', function (Blueprint $table) {
            $table->id();
            $table->text('Age')->nullable();
            $table->text('Amount')->nullable();
            $table->text('price')->nullable();
            $table->text('Company')->nullable();
            $table->text('Tagline')->nullable();
            $table->integer('company_id')->nullable();
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
        Schema::dropIfExists('male_not_smoker_twentyfives');
    }
}
