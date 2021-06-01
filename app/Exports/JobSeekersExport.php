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
            return JobSeeker::all();

        if($this->status == 'selected')
            return JobSeeker::where('status', 1)->get();

        if($this->status == 'rejected')
            return JobSeeker::where('status', 0)->get();

        if($this->status == 'reviewed')
            return JobSeeker::where('reviewed', 1)->get();
    }

    public function headings(): array
    {
        return [
            'ID',
            'First Name',
            'Middle Name',
            'Last Name',
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
            'Readiness Assessment',
            'Evaluation Assessment',
            'Best Competencies',
            'Worst Competencies',
            'Total Competencies Answered'
        ];
    }
}
