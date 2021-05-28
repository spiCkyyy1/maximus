<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class JobSeeker extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = ['first_name', 'middle_name', 'last_name', 'mobile', 'email', 'city',
    'region', 'nin', 'dob', 'gender', 'qualification', 'full_time_employment', 'on_job_training', 'social_benficiary',
    'unemployed'];

    public function readinessAssessment(){
        return $this->hasOne(ReadinessAssessment::class);
    }
}
