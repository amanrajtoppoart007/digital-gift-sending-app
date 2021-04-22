<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    public $table = 'transactions';
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

     protected $fillable = [
        'txnid',
        'firstname',
        'email',
        'phone',
        'status',
        'amount',
        'net_amount_debit',
        'productinfo',
        'mode',
        'payment_id',
         'data',
        'created_at',
        'updated_at',
    ];

    public function payment()
    {
        return $this->belongsTo(Payment::class);
    }
}
