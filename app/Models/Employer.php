<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Carbon;

class Employer extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = ['name', 'company_name', 'email', 'number', 'employment_sector', 'hq_location','region', 'city', 'expected_vacancies'];

    public function getNameAttribute($value){
        return ucfirst($value);
    }

    public function getCompanyNameAttribute($value){
        return ucfirst($value);
    }

    public function getEmploymentSectorAttribute($value){
        return ucfirst($value);
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

    public function getCreatedAtAttribute($value){
        return Carbon::parse($value)->toFormattedDateString();
    }

    public function getUpdatedAtAttribute($value){
        return Carbon::parse($value)->toFormattedDateString();
    }
}
