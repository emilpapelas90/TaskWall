<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskActions2 extends Model
{
    protected $fillable = ['task_id', 'user_id', 'action_id'];
}
