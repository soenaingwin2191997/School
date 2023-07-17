<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'father_name',
        'phone',
        'gender',
        'degree',
        'position',
        'township',
        'address',
    ];
}
