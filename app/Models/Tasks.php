<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tasks extends Model
{
    protected $fillable = ['user_id', 'name', 'category', 'thumbnail', 'task_req', 'proof_req', 'proof_type', 'approval_time', 'submission_time', 'budget', 'reward', 'limit', 'daily_submission', 'status'];


    public function actions()
    {
      return $this->hasMany(TaskActions2::class, 'task_id');
    }
  
    public function submission()
    {
      return $this->hasMany(Submissions::class, 'task_id');
    }
}
