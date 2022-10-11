<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class fishStock extends Model
{
    use HasFactory;

    protected $fillable = [
       
      
      
        'fishStock_id',
        'orderfish_details_id',
        'quantity',
        'date_exp',
        'date_import',
     ];
     protected $primaryKey =  'fishStock_id';
}
