<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class orderRawmaterial extends Model
{
    protected $table ='orderrawmaterials';
    use HasFactory;
    protected $fillable = [
       
        'or_id',
       'supplier_id',
       'emp_id',
        'date',
        'total',
        'status'
        
    ];
    protected $primaryKey = 'or_id';



}
