<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCampaignIdeasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('campaign_ideas', function (Blueprint $table) {
            $table->id();
            $table->string('sd_name');
            $table->string('sd_email');
            $table->string('sd_occupation');
            $table->integer('sd_contact_number');
            $table->string('sd_company_university');
            $table->string('sd_country');
            $table->string('id_title');
            $table->string('id_description', 500);
            $table->string('id_problem_statement', 500);
            $table->string('id_proposed_solution', 500);
            $table->string('id_category');
            $table->string('id_stage_of_idea');
            $table->string('id_type_of_idea');
            $table->json('id_sector_tech_area')->nullable();
            $table->string('id_sector_tech_area_remark', 500)->nullable();
            $table->string('id_idea_objective')->nullable();
            $table->string('id_idea_objective_remark', 500)->nullable();
            $table->text('qs_innovation')->nullable();
            $table->text('qs_feasibility')->nullable();
            $table->text('qs_impact')->nullable();
            $table->text('qs_sustainability')->nullable();
            $table->text('qs_scalability')->nullable();
            $table->text('qs_disruption')->nullable();
            $table->text('qs_potential')->nullable();
            $table->text('qs_ease_of_implementation')->nullable();
            $table->text('qs_time_to_implement');
            $table->text('qs_desirability_usability')->nullable();
            $table->text('qs_practicality')->nullable();
            $table->text('qs_sustainability_second')->nullable();
            $table->text('qs_ip_potential')->nullable();
            $table->string('attachment')->nullable();
            $table->boolean('consent')->nullable();
            $table->dateTime('created_at')->nullable();
            $table->dateTime('updated_at')->nullable();
            $table->string('user_ip')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('campaign_ideas');
    }
}
