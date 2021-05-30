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
    public function collection()
    {
        return JobSeeker::all();
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
            'Status'
        ];
    }
}
