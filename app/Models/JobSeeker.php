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
    'unemployed', 'reviewed', 'status'];

    protected $appends = ['readiness_weighted_score', 'evaluation_weighted_score'];

    public function readinessAssessment(){
        return $this->hasMany(ReadinessAssessment::class);
    }

    public function getFullTimeEmploymentAttribute($value){
        return ucfirst($value);
    }

    public function getOnJobTrainingAttribute($value){
        return ucfirst($value);
    }

    public function getSocialBenficiaryAttribute($value){
        return ucfirst($value);
    }

    public function getReadinessWeightedScoreAttribute(){
        if($this->readinessAssessment()->exists()){
            return $this->readinessAssessment()->where('competencies', 'readiness')->sum('weighted_score');
        }
        return 0;
    }

    public function getEvaluationWeightedScoreAttribute(){
        if($this->readinessAssessment()->exists()){
            return $this->readinessAssessment()->where('competencies', 'evaluation')->sum('weighted_score');
        }
        return 0;
    }
}
