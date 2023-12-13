<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserChat extends Model
{
    use HasFactory;

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
}
