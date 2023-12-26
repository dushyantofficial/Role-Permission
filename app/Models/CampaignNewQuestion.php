<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CampaignNewQuestion extends Model
{
    use HasFactory;

    public $table = 'campaign_new_question';
    public $casts = [
        'label_name' => 'array',
        'input_value' => 'array'
    ];
    protected $fillable = [
        'campaign_new_id',
        'label_name',
        'question',
        'type',
        'input_type',
        'input_value',
        'status'
    ];

    public function campaign_name()
    {
        return $this->belongsTo(CampaignNew::class, 'campaign_new_id', 'id');
    }
}
