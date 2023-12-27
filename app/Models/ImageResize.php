<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImageResize extends Model
{
    use HasFactory;

    public static $rules = [
        'image' => 'required'
    ];
    public static $ruless = [
        'image' => 'required',
        'image_width' => 'required',
        'image_height' => 'required'
    ];
    public $table = "image_resizes";
    public $fillable = [
        'image',
        'image_type',
        'image_original_width',
        'image_original__width',
        'image_width',
        'image_height',
    ];
}
