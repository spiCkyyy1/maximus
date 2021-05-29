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

    protected $appends = ['weighted_score'];

    public function readinessAssessment(){
        return $this->hasMany(ReadinessAssessment::class);
    }

    public function getFullTimeEmploymentAttribute($value){
        return ucfirst($value);
    }

    public function getObJobTrainingAttribute($value){
        return ucfirst($value);
    }

    public function getSocialBenficiaryAttribute($value){
        return ucfirst($value);
    }

    public function getWeightedScoreAttribute(){
        if($this->readinessAssessment()->exists()){
            return $this->readinessAssessment()->sum('weighted_score');
        }
        return 0;

    }
}
