<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class customer extends Model
{
    use HasFactory;
    protected $fillable = [

        'customers_id',
        'fristname',
        'lastname',
        'sex',
        'Address',
        'Email',
        'tell',
       
    ];
    protected $primaryKey = 'customers_id';
}
