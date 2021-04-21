<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    public $table = 'payments';
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];


    protected $fillable = [
        'txn_number',
        'amount',
        'name',
        'mobile',
        'email',
        'address',
        'city',
        'pin_code',
        'payment_type',
        'payment_status',
        'user_id',
        'state_id',
        'template_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function getNextOrderNumber()
    {
        $pmt = Payment::orderBy('created_at', 'DESC')->first();
        $Id = $pmt->id ?? 0;
        return 'ASD' . date('dmY') . '-' . str_pad($Id + 1, 8, "0", STR_PAD_LEFT);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
