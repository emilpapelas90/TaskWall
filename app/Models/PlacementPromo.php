<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlacementPromo extends Model
{
  protected $fillable = ['user_id', 'placement_id', 'percentage', 'message', 'start_at', 'end_at', 'status'];
}
