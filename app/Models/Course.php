<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    public static $rules = [
        'resume_id' => 'required',
        'course_name' => 'required',
        'institution_name' => 'required',
        'start_date' => 'required',
        'end_date' => 'required|After:start_date',

    ];
    public static $ruless = [
        'resume_id' => 'required',
        'course_name' => 'required',
        'institution_name' => 'required',
        'start_date' => 'required',

    ];
    public static $customMessages = [
        'resume_id.required' => 'Employee name is required.',
    ];
    public $table = 'courses';
    public $fillable = [
        'resume_id',
        'course_name',
        'institution_name',
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
