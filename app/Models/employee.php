<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class employee extends Model
{
    use HasFactory;
    protected $fillable = [
        'emp_id',
        'emp_fristname',
        'emp_lastname',
        'sex',
        'Address',
        'Email',
        'tell',
        'profile',
        'Username',
        'Password',
        'position',
        
    ];
    protected $primaryKey = 'emp_id';
    
     protected $table ='employees';
    
}
