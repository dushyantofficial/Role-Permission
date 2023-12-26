<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentHistory extends Model
{
    use HasFactory;

    public $table = 'payment_histories';
    public $fillable = [
        'user_id',
        'payment_id',
        'amount',
        'transaction_id',
        'entity',
        'currency',
        'status',
        'order_id',
        'invoice_id',
        'international',
        'method',
        'amount_refunded',
        'refund_status',
        'captured',
        'description',
        'card_id',
        'bank',
        'wallet',
        'vpa',
        'email',
        'contact',
        'notes',
        'fee',
        'tax',
        'error_code',
        'error_description',
        'error_source',
        'error_step',
        'error_reason',
        'payment_date',

    ];
    protected $dates = ['deleted_at'];
    protected $casts = [
        'notes' => 'array'
    ];

    public function user_name()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
