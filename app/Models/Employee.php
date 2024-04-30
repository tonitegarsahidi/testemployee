<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $table = 'SampleManpowerList';

    protected $fillable = [
        'nric4Digit',
        'name',
        'manpowerId',
        'designation',
        'project',
        'team',
        'supervisor',
        'joinDate',
        'resignDate',
    ];

    protected $dates = ['joinDate', 'resignDate'];
}
