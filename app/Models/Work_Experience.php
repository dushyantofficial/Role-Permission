<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Work_Experience extends Model
{
    use HasFactory;
    use SoftDeletes;


    public $table = 'work_experiences';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'resume_id',
        'destination',
        'company_name',
        'start_date',
        'end_date',
        'description',
        'check',
        'status',


    ];

    public static $rules = [
        'resume_id' => 'required',
        'destination' => 'required',
        'company_name' => 'required',
        'start_date' => 'required',
        'end_date' => 'required|After:start_date',

    ];

    public static $ruless = [
        'resume_id' => 'required',
        'destination' => 'required',
        'company_name' => 'required',
        'start_date' => 'required',

    ];

    public static $customMessages = [
        'resume_id.required' => 'Employee name is required.',
    ];

    public function resume_name()
    {
        return $this->belongsTo(Resume::class, 'resume_id');
    }
}
