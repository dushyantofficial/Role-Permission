<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentRefund extends Model
{
    use HasFactory;
    public $table = 'payment_refunds';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'refund_id',
        'user_id',
        'payment_id',
        'amount',
        'entity',
        'currency',
        'status',
        'receipt',
        'batch_id',
        'status',
        'speed_processed',
        'speed_requested',
        'payment_date',

    ];

    public function user_name(){
        return $this->belongsTo(User::class,'user_id');
    }
}
