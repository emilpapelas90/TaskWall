<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdsPack extends Model
{
    protected $fillable = ['key', 'value', 'price'];
}
