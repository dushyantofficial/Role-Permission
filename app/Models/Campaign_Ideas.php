<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Campaign_Ideas extends Model
{
    use HasFactory;

    public $table = 'campaign_ideas';
    protected $fillable = [
        'sd_name',
        'sd_email',
        'sd_occupation',
        'sd_contact_number',
        'sd_company_university',
        'sd_country',
        'id_title',
        'id_description',
        'id_problem_statement',
        'id_proposed_solution',
        'id_category',
        'id_stage_of_idea',
        'id_type_of_idea',
        'id_sector_tech_area',
        'id_sector_tech_area_remark',
        'id_idea_objective',
        'id_idea_objective_remark',
        'qs_innovation',
        'qs_feasibility',
        'qs_impact',
        'qs_sustainability',
        'qs_scalability',
        'qs_disruption',
        'qs_potential',
        'qs_ease_of_implementation',
        'qs_time_to_implement',
        'qs_desirability_usability',
        'qs_practicality',
        'qs_sustainability_second',
        'qs_ip_potential',
        'disruption',
        'attachment',
        'consent',
        'user_ip',
    ];

    protected $casts = [
        'id_sector_tech_area' => 'array',
        'attachment' => 'array',
    ];
}
