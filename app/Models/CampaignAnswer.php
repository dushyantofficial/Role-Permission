<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CampaignAnswer extends Model
{
    use HasFactory;
    public $table = 'campaign_answers';
    protected $fillable = [
        'user_id',
        'question_id',
        'answer'
    ];
}
