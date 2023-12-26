<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CampaignSubIdeaDetails extends Model
{
    use HasFactory;

    public $table = 'campaign_sub_idea_details';
    protected $fillable = [
        'campaign_idea_details_id',
        'label_name',
        'label_value'
    ];

//    public function question_name(){
//        return $this->belongsTo(CampaignNew::class,'campaign_idea_details_id');
//    }
}
