<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class orderfish_details extends Model
{
    use HasFactory;
    protected $fillable = [
       
      
       'orderfish_details_id',
            'orders_id',
            'fish_id',
            'size',
            'price',
            'quantity',
    ];
    protected $primaryKey =  'orderfish_details_id';
}
