<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Education extends Model
{
    use HasFactory;
    use SoftDeletes;


    public static $rules = [
        'resume_id' => 'required',
        'degree_name' => 'required',
        'college_name' => 'required',
        'grade' => 'required',
        'university_name' => 'required',
        'city_name' => 'required',
        'start_date' => 'required',
        'end_date' => 'required|After:start_date',

    ];
    public static $ruless = [
        'resume_id' => 'required',
        'degree_name' => 'required',
        'college_name' => 'required',
        'grade' => 'required',
        'university_name' => 'required',
        'city_name' => 'required',
        'start_date' => 'required',

    ];
    public static $customMessages = [
        'resume_id.required' => 'Employee name is required.',
    ];
    public $table = 'education';
    public $fillable = [
        'resume_id',
        'degree_name',
        'college_name',
        'university_name',
        'city_name',
        'grade',
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
