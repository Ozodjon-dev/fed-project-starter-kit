<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contract extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'contracts';
    protected $guarded = [];

    protected $fillable = [
        'registration_number', 'registration_date', 'type', 'number',
        'date', 'contractor', 'category', 'details', 'article',
        'amount', 'term', 'status'
    ];

    // 🔹 **PaymentOrder modeli bilan bog‘lash**
    public function paymentOrders()
    {
        return $this->hasMany(PaymentOrder::class, 'contract_id');
    }

    public function receiptOfFunds()
    {
        return $this->hasMany(ReceiptOfFund::class, 'contract_id');
    }
}

