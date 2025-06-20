<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Application extends Model
{
    use HasFactory;

    protected $fillable = [
        'job_id',
        'name',
        'email',
        'resume',
        'expected_salary',
        'previous_salary',
        'experience_months',
        'reason_to_switch',
    ];
     public function user()
{
    return $this->belongsTo(User::class);
}
    public function job()
    {
        return $this->belongsTo(Job::class);
    }
   
}
