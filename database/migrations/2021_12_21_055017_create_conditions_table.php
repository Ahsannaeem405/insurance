<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConditionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('conditions', function (Blueprint $table) {
            $table->id();
            $table->text('condition_id')->nullable();
            $table->integer('company_id')->nullable();

            $table->text('condition_e')->nullable();
            $table->text('condition_s')->nullable();
            $table->text('company')->nullable();
            $table->text('tagline')->nullable();
            $table->text('allowed')->nullable();
            $table->text('decline')->nullable();

            $table->text('treatment_allowed_from')->nullable();
            $table->text('treatment_allowed_to')->nullable();

            $table->text('diagnose_allowed_from')->nullable();
            $table->text('diagnose_allowed_to')->nullable();

            $table->text('treatment_decline_from')->nullable();
            $table->text('treatment_decline_to')->nullable();

            $table->text('diagnose_decline_from')->nullable();
            $table->text('diagnose_decline_to')->nullable();


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
        Schema::dropIfExists('conditions');
    }
}
