<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ReceiptOfFund extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'receipt_of_funds';
    protected $guarded = [];
    public function contract()
    {
        return $this->belongsTo(Contract::class, 'contract_id');
    }

}
