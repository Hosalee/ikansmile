<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\employee;

class saleFish extends Model
{
    use HasFactory;
    

    protected $fillable = [
       
        'saleFish_id ',
       'customer_id',
       'emp_id',
       'date',
       'total',

    ];
    protected $primaryKey = 'saleFish_id';
    protected $foreignKey = 'emp_id';

    public function employee2(){

        return $this->hasOne(employee::class,'emp_id','emp_id');	
     }
}
