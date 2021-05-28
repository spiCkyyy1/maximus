<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Employer extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = ['name', 'company_name', 'email', 'number', 'employment_sector', 'hq_location', 'city', 'expected_vacancies'];
}
