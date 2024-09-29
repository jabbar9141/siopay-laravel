<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $table = 'transactions';
    protected $fillable = [
        'user_id',
        'transaction_type',
        'beneficiary_id',
        'beneficiary_account_id',
        'transaction_id',
        'transaction_amount',
        'beneficiary_account_number',
        'beneficiary_account_name',
        'beneficiary_bank_name',
        'beneficiary_bank_code',
        'payment_provider',
        'transaction_status',
        'transaction_reference',
        'payment_intent',
        'payment_intent_data',
        'sending_country_code',
        'receiving_country_code',
        'received_amount',
        'transaction_fee'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function beneficiaryAccount()
    {
        return $this->belongsTo(BeneficiaryAccount::class);
    }

    public static function totalAmountForToday($userId)
    {
        return self::where('user_id', $userId)
            ->whereDate('created_at', Carbon::today())
            ->where('transaction_status', 'success')
            ->sum('transaction_amount');
    }

    public static function totalAmountForLast30Days($userId)
    {
        return self::where('user_id', $userId)
            ->whereDate('created_at', '>=', Carbon::now()->subDays(30))
            ->where('transaction_status', 'success')
            ->sum('transaction_amount');
    }
}
