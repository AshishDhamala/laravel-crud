<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = ['firstname', 'lastname', 'number', 'email', 'created_at', 'updated_at'];
}
