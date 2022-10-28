<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class catchFish extends Model
{
    use HasFactory;
    

    protected $fillable = [

        'catchfish_id',
           'farming_id',
            'catchfish_date',
            'catchfish_quantity'

    ];
    protected $primaryKey = 'catchfish_id';

}
           
