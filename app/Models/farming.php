<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class farming extends Model
{
    use HasFactory;

    protected $fillable = [
       'farming_id',
            'fish_id',
            'cage_id',
           'emp_id',
            'date_import',
            'fishSize',
            'fish_quantity',
            'fish_amount_left',
            'total_feeding_amount',
    ];
    protected $primaryKey = 'farming_id';
}
