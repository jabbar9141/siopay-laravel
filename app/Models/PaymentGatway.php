<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentGatway extends Model
{
    use HasFactory;

    protected $fillable = [
        'account_mode',
        'public_key',
        'secret_key',
        'account_name',
        'set_as_default'
    ];
}
