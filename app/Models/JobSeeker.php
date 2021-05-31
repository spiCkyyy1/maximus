<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use DB;

class JobSeeker extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = ['first_name', 'middle_name', 'last_name', 'mobile', 'email', 'city',
    'region', 'nin', 'dob', 'gender', 'qualification', 'full_time_employment', 'on_job_training', 'social_benficiary',
    'unemployed', 'reviewed', 'status'];

    protected $appends = ['readiness_weighted_score', 'evaluation_weighted_score', 'best_competency', 'worst_competency'];

    public function readinessAssessment(){
        return $this->hasMany(ReadinessAssessment::class);
    }

    public function getCityAttribute($value){
        if(!is_null($value)){
            return ucfirst($value);
        }
        return 'N/A';
    }

    public function getRegionAttribute($value){
        if(!is_null($value)){
            return ucfirst($value);
        }
        return 'N/A';
    }

    public function getDobAttribute($value){
        if(!is_null($value)){
            return Carbon::parse($value)->toFormattedDateString();
        }
        return 'N/A';
    }

    public function getFullTimeEmploymentAttribute($value){
        if(!is_null($value)){
            return ucfirst($value);
        }
        return 'N/A';

    }

    public function getOnJobTrainingAttribute($value){
        if(!is_null($value)){
            return ucfirst($value);
        }
        return 'N/A';

    }

    public function getSocialBenficiaryAttribute($value){
        if(!is_null($value)){
            return ucfirst($value);
        }
        return 'N/A';
    }

    public function getReadinessWeightedScoreAttribute(){
        if($this->readinessAssessment()->exists()){
            return $this->readinessAssessment()->where('competencies', 'readiness')->sum('weighted_score');
        }
        return 'N/A';
    }

    public function getEvaluationWeightedScoreAttribute(){
        if($this->readinessAssessment()->exists()){
            return $this->readinessAssessment()->where('competencies', 'evaluation')->sum('weighted_score');
        }
        return 'N/A';
    }

    public function getBestCompetencyAttribute(){
        if($this->readinessAssessment()->exists()){
            $data = [];
            $bestCompetency = DB::table('readiness_assessments')
                 ->select('competencies', DB::raw('count(weighted_score) as total'))
                 ->whereNotIn('competencies', ['readiness', 'evaluation'])
                 ->where('job_seeker_id', '=', 1)
                 ->groupBy('competencies')
                 ->orderByRaw('count(weighted_score) DESC')
                 ->limit(3)
                 ->get();

            foreach($bestCompetency as $comp){
                array_push($data, $comp->competencies);
            }
            return implode('-',$data);
        }
        return 'N/A';
    }

    public function getWorstCompetencyAttribute(){

        if($this->readinessAssessment()->exists()){
            $data = [];
            $worstCompetency = DB::table('readiness_assessments')
                 ->select('competencies', DB::raw('count(weighted_score) as total'))
                 ->whereNotIn('competencies', ['readiness', 'evaluation'])
                 ->where('job_seeker_id', '=', 1)
                 ->groupBy('competencies')
                 ->orderByRaw('count(weighted_score) ASC')
                 ->limit(3)
                 ->get();
            foreach($worstCompetency as $comp){
                    array_push($data, $comp->competencies);
            }
            return implode('-',$data);
        }
        return 'N/A';
    }
}
