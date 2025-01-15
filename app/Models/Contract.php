<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contract extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'Contracts';
    protected $guarded = [];
    protected $fillable = [
        'registration_number', 'registration_date', 'type', 'number',
        'date', 'contractor', 'category', 'details', 'article',
        'amount', 'term'
    ];


}
