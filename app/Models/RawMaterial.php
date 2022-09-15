<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RawMaterial extends Model
{
    use HasFactory;
    protected $fillable = [
        
            'Raw_Material_id',
           'Raw_Material_name',
            'picture',
            'details',
    ];
    protected $primaryKey = 'Raw_Material_id';
}
