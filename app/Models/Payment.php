<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    public static $rules = [
        'user_id' => 'required',
        'amount' => 'required',

    ];
    public static $customMessages = [
        'user_id.required' => 'User name field is required.',
    ];
    public $table = 'payments';
    public $fillable = [
        'user_id',
        'amount',
        'transaction_id',
        'payment_status',
        'payment_date',
        'status',


    ];
    protected $dates = ['deleted_at'];

    public function user_name()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
