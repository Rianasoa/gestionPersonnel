<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
class Employer extends Model
{
    protected $fillable = [
        'first_name',
        'last_name',
        'phone',
        'address',
        'job'   
    ];




}
