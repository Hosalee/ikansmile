<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class orderRMDetail extends Model
{
    protected $table ='orderrm_detail';
    use HasFactory;

    protected $fillable = [
       
        'orderRM_detail_id',
       'Raw_Material_id',
       'or_id',
        'price',
        'quantity',
        
        
    ];
    protected $primaryKey = 'orderRM_detail_id';
}
