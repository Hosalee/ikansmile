<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class salary extends Model
{
    use HasFactory;
    protected $fillable = [
        
        'salary_id',
       'emp_id',
        'date',
        'amount',
        'status',
        'number',
       'totalAmount'
];
protected $primaryKey = 'salary_id';
protected $foreignKey = 'emp_id';

 public function employee1(){

    return $this->hasOne(employee::class,'emp_id','emp_id');	
 }

}
