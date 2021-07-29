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

    protected $fillable = ['title','first_name', 'middle_name', 'last_name', 'martial_status', 'mobile', 'email', 'city',
    'region', 'nin', 'dob', 'gender', 'qualification', 'full_time_employment', 'on_job_training', 'social_benficiary',
    'unemployed', 'reviewed', 'status','job_role', 'role', 'sector', 'education_major', 'education_field', 'cv', 'degree_certificate', 'gosi_evidence',
    'message_sent'];

    protected $appends = ['readiness_weighted_score', 'evaluation_weighted_score', 'best_competency', 'worst_competency', 'answered_competencies'];

    private $readinessTotalSum = 28;

    private $evaluationTotalSum = 13;

    public function readinessAssessment(){
        return $this->hasMany(ReadinessAssessment::class);
    }

    public function getCityAttribute($value){
        if(!is_null($value)){
            $cityName = Cities::where('value', $value)->first(['text']);
            if(!is_null($cityName)) {
                return $cityName['text'];
            }else{
                return ucfirst($value);
            }

        }
        return 'N/A';
    }

    public function getRegionAttribute($value){
        if(!is_null($value)){
            $regionName = Region::where('value', $value)->first(['text']);
            if(!is_null($regionName)){
                return $regionName['text'];
            }else{
                return ucfirst($value);
            }

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

    public function getUnemployedAttribute($value){
        if(is_null($value)){
            return 'N/A';
        }
        return ucwords(str_replace("_", " ", $value));
    }


    public function getReviewedAttribute($value){
        if($value == 0){
            return 'Unreviewed';
        }

        return 'Reviewed';
    }

    public function getStatusAttribute($value){
        if($value == 1){
            return 'Selected';
        }
        return 'Rejected';
    }

    public function getRoleAttribute($value){
        if(!is_null($value)){
            return ucwords(str_replace("_", " ", $value));
        }
        return 'N/A';
        
    }

    public function getSectorAttribute($value){
        if(!is_null($value)){
            return ucwords(str_replace("_", " ", $value));
        }
        return 'N/A';
        
    }

    public function getEducationMajorAttribute($value){
        if(!is_null($value)){
            return ucwords(str_replace("_", " ", $value));
        }
        return 'N/A';
        
    }

    public function getEducationFieldAttribute($value){
        if(!is_null($value)){
            return ucwords(str_replace("_", " ", $value));
        }
        return 'N/A';
        
    }

    public function getCreatedAtAttribute($value){
        return Carbon::parse($value)->toFormattedDateString();
    }

    public function getUpdatedAtAttribute($value){
        return Carbon::parse($value)->toFormattedDateString();
    }

    public function getReadinessWeightedScoreAttribute(){
        if($this->readinessAssessment()->exists()){
            $gainedSum =  $this->readinessAssessment()->where('competencies', 'readiness')->sum('weighted_score');
            if(!$gainedSum){
                return 'N/A';
            }

            return number_format(($gainedSum * 100) / $this->readinessTotalSum, 3);
        }
        return 'N/A';
    }

    public function getEvaluationWeightedScoreAttribute(){
        if($this->readinessAssessment()->exists()){
            $evaluationGainedSum = $this->readinessAssessment()->where('competencies', 'evaluation')->sum('weighted_score');
            if(!$evaluationGainedSum){
                return 'N/A';
            }
            return number_format(($evaluationGainedSum * 100) / $this->evaluationTotalSum, 2);
        }
        return 'N/A';
    }

    public function getBestCompetencyAttribute(){
        if($this->readinessAssessment()->exists()){

            $bestCompetency = DB::table('readiness_assessments')
                 ->select('competencies', DB::raw('sum(weighted_score) as total'))
                 ->whereNotIn('competencies', ['readiness', 'evaluation'])
                 ->where('job_seeker_id', '=', $this->id)
                 ->groupBy('competencies')
                 ->orderByRaw('sum(weighted_score) DESC')
                //  ->limit(3)
                 ->get();

            $result = [];
            foreach($bestCompetency as $data){
                $totalSum = $this->readinessAssessment()->where('competencies',  $data->competencies)->count();
                if($totalSum != 0){
                    $result[$data->competencies] = number_format(($data->total * 100) / $totalSum, 2);
                }
            }
            if(!empty($result)){
                $max = max($result);
                $temp = [];
                foreach($result as $k => $x){
                    if($x == $max){
                        array_push($temp, $k);
                    }
                }
                return implode(',', $temp);
            }
            else{
                return 'N/A';
            }
        }
        return 'N/A';
    }

    public function getWorstCompetencyAttribute(){

        if($this->readinessAssessment()->exists()){

            $worstCompetency = DB::table('readiness_assessments')
                 ->select('competencies', DB::raw('sum(weighted_score) as total'))
                 ->whereNotIn('competencies', ['readiness', 'evaluation'])
                 ->where('job_seeker_id', '=', $this->id)
                 ->groupBy('competencies')
                 ->orderByRaw('sum(weighted_score) ASC')
                //  ->limit(3)
                 ->get();
                //  return $worstCompetency;
            $result = [];
            foreach($worstCompetency as $data){
                $totalSum = $this->readinessAssessment()->where('competencies',  $data->competencies)->count();
                if($totalSum != 0){
                    $result[$data->competencies] = number_format(($data->total * 100) / $totalSum, 2);
                }
            }
            if(!empty($result)){
                $min = min($result);
                $temp = [];
                foreach($result as $k => $x){
                    if($x == $min){
                        array_push($temp, $k);
                    }
                }
                return implode(',', $temp);
            }else{
                return 'N/A';
            }
        }
        return 'N/A';
    }

    public function getAnsweredCompetenciesAttribute(){
        if($this->readinessAssessment()->exists()){
            return DB::table('readiness_assessments')->where('job_seeker_id', $this->id)->distinct('competencies')->count('competencies');
        }
        return 0;
    }

    public static function getReadinessQuestions($id){
        $questions = ReadinessAssessment::where('job_seeker_id', $id)
        ->where('competencies', 'readiness')->get();
        return $questions;
    }

    public static function getEvaluationQuestions($id){
        $questions = ReadinessAssessment::where('job_seeker_id', $id)
        ->where('competencies', 'evaluation')->get();
        return $questions;
    }

    public static function getCompetenciesQuestions($id){
        $questions = ReadinessAssessment::where('job_seeker_id', $id)
        ->whereNotIn('competencies', ['readiness','evaluation'])->get();
        return $questions;
    }
}
