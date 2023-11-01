<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Professional_Skills extends Model
{
    use HasFactory;
    use SoftDeletes;


    public $table = 'professional_skills';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'resume_id',
        'professional_skills',
        'professional_per',
        'color',
        'status',
    ];

    public static $rules = [
        'resume_id' => 'required',
        'professional_skills' => 'required',
        'color' => 'required',
        'professional_per' => 'required|min:1|numeric|max:100',

    ];
    public static $customMessages = [
        'resume_id.required' => 'Employee name is required.',
        'professional_skills.required' => 'Skill is required.',
        'professional_per.required' => 'Percentage is required.',
        'professional_per.min' => 'The percentage must be at least :min.',
        'professional_per.max' => 'The percentage must not exceed :max.',
    ];



    public function resume_name(){
        return $this->belongsTo(Resume::class,'resume_id');
    }
}
