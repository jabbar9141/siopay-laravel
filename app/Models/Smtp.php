<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Smtp extends Model
{
    use HasFactory;

    protected $fillable = [
        'mail_host',
        'mail_port',
        'mail_encreption',
        'mail_username',
        'mail_password',
        'mail_from_addressed',
        'set_as_default',
    ];
}
