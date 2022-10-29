<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class saleDetail extends Model
{
    use HasFactory;
    protected $fillable = [
       
        'saleDetails_id',
       'saleFish_id',
       'catchFish_id',
       'quantity',
       'price',

    ];
    protected $primaryKey = 'saleDetails_id';
}
