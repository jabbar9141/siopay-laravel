<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserLoginLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'ip_address', 'device', 'location', 'country'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
