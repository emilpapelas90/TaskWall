<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Placement extends Model
{
  protected $fillable = ['user_id', 'name', 'category', 'url', 'currency', 'rate', 'postback', 'api', 'earned', 'status'];

  public function promo(){
    return $this->hasMany(PlacementPromo::class, 'placement_id');
  }
}
