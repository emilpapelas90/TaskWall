<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskActions extends Model
{
    public $timestamps = false;
    protected $fillable = ['user_id', 'task_id', 'action','action_1','action_2','action_3','action_4'];
}
