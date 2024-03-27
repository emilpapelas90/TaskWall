<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Funds extends Model
{
   protected $fillable = ['user_id', 'provider', 'amount', 'currency', 'status'];
}
