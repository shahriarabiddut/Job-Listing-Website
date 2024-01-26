<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;
    function application()
    {
        return $this->hasMany(Application::class, 'job_id');
    }
    function recruiter()
    {
        return $this->belongsTo(User::class, 'recruiter_id');
    }
}
