<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserChat extends Model
{
    use HasFactory;
    protected $dates = ['time'];
    public $table = 'user_chats';
    public $fillable =
        [
            'sender_id',
            'receiver_id',
            'message',
            'document',
            'time',
            'date',
            'read_at',
        ];

    protected $casts = [
        'document' => 'array'
    ];


    public function sender_name(){
        return $this->belongsTo(User::class,'sender_id');
    }

    public function receiver_name(){
        return $this->belongsTo(User::class,'receiver_id');
    }

    public function setTimeAttribute($value)
    {
        $this->attributes['time'] = Carbon::parse($value);
    }
    public function getTimeAttribute($value)
    {
        // return Carbon::parse($value)->format('h:i A'); // Adjust the format to your preference
        return date('h:i A',strtotime($value));
    }
}
