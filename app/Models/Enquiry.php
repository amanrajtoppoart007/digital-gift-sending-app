<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enquiry extends Model
{
    use HasFactory;

    public $table = 'enquiries';
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'subject',
        'category',
        'description',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}
