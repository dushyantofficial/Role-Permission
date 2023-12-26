<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    use HasFactory;
    use SoftDeletes;


    public static $rules = [
        'resume_id' => 'required',
        'project_name' => 'required',
        'technology' => 'required',
        'company_name' => 'required',
        'city_name' => 'required',
        'start_date' => 'required',
        'end_date' => 'required|After:start_date',

    ];
    public static $ruless = [
        'resume_id' => 'required',
        'project_name' => 'required',
        'technology' => 'required',
        'company_name' => 'required',
        'city_name' => 'required',
        'start_date' => 'required',

    ];
    public static $customMessages = [
        'resume_id.required' => 'Employee name is required.',
    ];
    public $table = 'projects';
    public $fillable = [
        'resume_id',
        'project_name',
        'technology',
        'company_name',
        'city_name',
        'start_date',
        'end_date',
        'description',
        'check',
        'status',


    ];
    protected $dates = ['deleted_at'];

    public function resume_name()
    {
        return $this->belongsTo(Resume::class, 'resume_id');
    }
}
