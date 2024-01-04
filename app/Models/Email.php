<?php

namespace App\Models;

use App\Models\Recruiter;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Email extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'email', 'subject', 'message', 'objective', 'recruiter_id'];
    function Recruiter()
    {
        return $this->belongsTo(Recruiter::class, 'recruiter_id');
    }
}
