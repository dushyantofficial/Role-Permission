<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CampaignNew extends Model
{
    use HasFactory;

    public static $rules = [
        'campaign_title' => 'required',
        'campaign_description' => 'required',
//        'campaign_banner' => 'required|mimes:jpeg,png,jpg',
        'campaign_banner' => 'required',
        //  'start_date' => 'required|date',
        // 'end_date' => 'required|date|after:start_date'
    ];
    public $table = 'campaign_new';
    protected $fillable = [
        'campaign_title',
        'campaign_description',
        'campaign_banner',
        'start_date',
        'end_date'
    ];
}
