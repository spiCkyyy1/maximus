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
        if($this->status == 'all')
            return JobSeeker::get(['id', 'title','first_name', 'middle_name', 'last_name', 'martial_status', 'mobile', 'email', 'city',
            'region', 'nin', 'dob', 'gender', 'qualification', 'full_time_employment', 'on_job_training', 'social_benficiary',
            'unemployed', 'reviewed', 'status','created_at', 'updated_at','role', 'sector','job_role', 'education_major', 'education_field']);

        if($this->status == 'selected')
            return JobSeeker::where('status', 1)->get(['id', 'title','first_name', 'middle_name', 'last_name', 'martial_status', 'mobile', 'email', 'city',
            'region', 'nin', 'dob', 'gender', 'qualification', 'full_time_employment', 'on_job_training', 'social_benficiary',
            'unemployed', 'reviewed', 'status','created_at', 'updated_at','role', 'sector','job_role', 'education_major', 'education_field']);

        if($this->status == 'rejected')
            return JobSeeker::where('status', 0)->get(['id', 'title','first_name', 'middle_name', 'last_name', 'martial_status', 'mobile', 'email', 'city',
            'region', 'nin', 'dob', 'gender', 'qualification', 'full_time_employment', 'on_job_training', 'social_benficiary',
            'unemployed', 'reviewed', 'status','created_at', 'updated_at','role', 'sector','job_role', 'education_major', 'education_field']);

        if($this->status == 'reviewed')
            return JobSeeker::where('reviewed', 1)->get(['id', 'title','first_name', 'middle_name', 'last_name', 'martial_status', 'mobile', 'email', 'city',
            'region', 'nin', 'dob', 'gender', 'qualification', 'full_time_employment', 'on_job_training', 'social_benficiary',
            'unemployed', 'reviewed', 'status','created_at', 'updated_at','role', 'sector','job_role', 'education_major', 'education_field']);
    }

    public function headings(): array
    {
        return [
            'ID',
            'Title',
            'First Name',
            'Middle Name',
            'Last Name',
            'Marital Status',
            'Mobile',
            'Email',
            'City',
            'Region',
            'NIN',
            'Date of birth',
            'Gender',
            'Qualification',
            'Full Time Employment',
            'On Job Training',
            'Social Beneficiary',
            'Un-Employed',
            'Reviewed',
            'Status',
            'Created At',
            'Updated At',
            'Role',
            'Sector',
            'Job Role',
            'Education Major',
            'Education Field',
            // 'CV',
            // 'Degree certificate',
            // 'Gosi evidence',
            'Readiness Assessment',
            'Evaluation Assessment',
            'Best Competencies',
            'Worst Competencies',
            'Total Competencies Answered'
        ];
    }
}
