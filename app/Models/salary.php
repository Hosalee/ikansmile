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
        'status'
       
];
protected $primaryKey = 'salary_id';
protected $foreignKey = 'emp_id';

}
