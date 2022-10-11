<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    use HasFactory;
    protected $fillable = [
       
        'orders_id',
        'supplier_id',
        'emp_id',
        'date',
        'total',
        'status',
    ];
    protected $primaryKey = 'orders_id';
}
