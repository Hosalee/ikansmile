<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class supplier extends Model
{
    use HasFactory;
    protected $fillable = [

        'supplier_id', 
        'name',
        'Address',
        'Email',
        'tell',
        'picture'

    ];
    protected $primaryKey = 'supplier_id';

   
}
