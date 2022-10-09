<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipes extends Model
{
    use HasFactory;
    protected $fillable = [
       
        'Recipes_id',
       'Recipes_name',
       'explain'
    ];
    protected $primaryKey = 'Recipes_id';
   
}
