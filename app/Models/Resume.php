<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Resume extends Model
{
    use HasFactory;
    use SoftDeletes;


    public static $rules = [
        'name' => 'required',
        'destination' => 'required',
        'about_me' => 'required',
        'dob' => 'required|date_format:Y-m-d|before:today|after:1900-01-01',
        'address' => 'required',
        'profile_pic' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        'phone' => 'required|numeric|digits:10',

    ];
    public $table = 'resumes';
    public $fillable = [
        'name',
        'destination',
        'about_me',
        'dob',
        'age',
        'email',
        'phone',
        'address',
        'sequence',
        'profile_pic',


    ];
    protected $dates = ['deleted_at'];

}
