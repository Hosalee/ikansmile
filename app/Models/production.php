<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class production extends Model
{
    use HasFactory;
    protected $fillable = [
       
        'P_id',
       'Recipes_id',
       'P_date',
        'P_status',
       
        
        
    ];
    protected $primaryKey = 'P_id';
}
