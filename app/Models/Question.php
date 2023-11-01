<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    public $table = 'questions';
    protected $fillable = [
        'lable_name',
        'question',
        'type',
        'input_type',
        'input_value',
        'status'
    ];
}
