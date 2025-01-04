<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Classificator extends Model
{
    use HasFactory;

    protected $table = 'Classificator';
    protected $guarded = [];

}
