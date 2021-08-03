<?php

namespace App\Exports;

use App\Models\JobSeeker;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStrictNullComparison;

class JobSeekersExport implements FromCollection, WithHeadings, ShouldAutoSize, WithStrictNullComparison
{
    /**
    * @return \Illuminate\Support\Collection
    */

    protected $status;

    public function __construct($status)
    {
        $this->status = $status;

    }



    public function collection()
    {

        // return JobSeeker::get(['id', 'title','first_name', 'middle_name', 'last_name', 'martial_status', 'mobile', 'email', 'city',
        //     'region', 'nin', 'dob', 'gender', 'qualification', 'full_time_employment', 'on_job_training', 'social_benficiary',
        //     'unemployed', 'reviewed', 'status','created_at', 'updated_at','role', 'sector','job_role', 'education_major', 'education_field']);
        if($this->status == 'all')
            return JobSeeker::get(['nin','first_name', 'middle_name', 'last_name', 'gender', 'dob', 'mobile','email', 'city',
            'region', 'qualification', 'education_major', 'education_field', 'sector','role','job_role',
            'unemployed','created_at']);

        if($this->status == 'selected')
            return JobSeeker::where('status', 1)->get(['nin','first_name', 'middle_name', 'last_name', 'gender', 'dob', 'mobile','email', 'city',
            'region', 'qualification', 'education_major', 'education_field', 'sector','role','job_role',
            'unemployed','created_at']);

        if($this->status == 'rejected')
            return JobSeeker::where('status', 0)->get(['nin','first_name', 'middle_name', 'last_name', 'gender', 'dob', 'mobile','email', 'city',
            'region', 'qualification', 'education_major', 'education_field', 'sector','role','job_role',
            'unemployed','created_at']);

        if($this->status == 'reviewed')
            return JobSeeker::where('reviewed', 1)->get(['nin','first_name', 'middle_name', 'last_name', 'gender', 'dob', 'mobile','email', 'city',
            'region', 'qualification', 'education_major', 'education_field', 'sector','role','job_role',
            'unemployed','created_at']);
    }

    public function headings(): array
    {
        return [
            // 'ID',
            // 'Title',
            'NIN',
            'First Name',
            'Middle Name',
            'Last Name',
            'Gender',
            'Date of birth',
            'Mobile',
            'Email',
            'City',
            'Region',
            'Education Level',
            'Education Major',
            'Education Field',
            'Employment Sector',
            'Role Preference',
            'Job Role Sector',
            'Length of Unemployment',
            'Referral Date',
            'Job Readiness Stream',
            'Self Evaluation Stream',
            'Best Competencies',
            'Worst Competencies',
            'Total Competencies Answered'
            // 'Marital Status',
            
            
            
            
            
            // 'Qualification',
            // 'Full Time Employment',
            // 'On Job Training',
            // 'Social Beneficiary',
            
            // 'Reviewed',
            // 'Status',
            
            // 'Updated At',
            
            
            
            
            // 'CV',
            // 'Degree certificate',
            // 'Gosi evidence',
            
            
            // 'Best Competencies',
            // 'Worst Competencies',
            // 'Total Competencies Answered'
        ];
    }
}
