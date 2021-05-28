<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class ReadinessAssessment extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = ['job_seeker_id', 'question', 'answer', 'weighted_score', 'competencies'];

    public function jobSeeker(){
        return $this->hasOne(JobSeeker::class);
    }
}
