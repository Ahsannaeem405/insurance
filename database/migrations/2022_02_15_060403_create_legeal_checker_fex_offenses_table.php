<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLegealCheckerFexOffensesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('legeal_checker_fex_offenses', function (Blueprint $table) {
            $table->id();


            $table->integer('offense_id')->nullable();
            $table->text('offense_e')->nullable();
            $table->text('offense_s')->nullable();
            $table->text('company')->nullable();
            $table->text('tagline')->nullable();
            $table->text('allowed')->nullable();
            $table->text('decline')->nullable();

            $table->text('offense_curretly')->nullable();

            $table->integer('offense_allowed_from')->nullable();
            $table->integer('offense_allowed_to')->nullable();


            $table->integer('offense_decline_from')->nullable();
            $table->integer('offense_decline_to')->nullable();

            $table->integer('offense_decline_month_from')->nullable();
            $table->integer('offense_decline_month_to')->nullable();


            $table->text('category')->nullable();
            $table->text('reason_e')->nullable();
            $table->text('reason_s')->nullable();
            $table->text('plan_info_e')->nullable();
            $table->text('plan_info_s')->nullable();
            $table->text('agent_compensation_e')->nullable();
            $table->text('agent_compensation_s')->nullable();
            $table->text('coverage_type')->nullable();

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
        Schema::dropIfExists('legeal_checker_fex_offenses');
    }
}
