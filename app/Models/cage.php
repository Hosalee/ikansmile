<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cage extends Model
{
    use HasFactory;

    protected $fillable = [

        'cage_id',
        'cage_name',
         'cage_owner',
        'Address',
        'size',
        'capicity',
        'latitude',
        'longitude',
        'status',
    ];
    protected $primaryKey = 'cage_id';
}
