<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HardwareProduct extends Model
{
    protected $fillable = ['name', 'description', 'price', 'stock'];
}
