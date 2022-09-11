<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class fish extends Model
{
    use HasFactory;

 protected $fillable = [
        'fish_id',
        'name',
        'species',
        'picture',
        'fish_appearance'
    ];
    protected $primaryKey = 'fish_id';
}
