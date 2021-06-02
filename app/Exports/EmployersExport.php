<?php

namespace App\Exports;

use App\Models\Employer;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStrictNullComparison;

class EmployersExport implements FromCollection, WithHeadings, ShouldAutoSize, WithStrictNullComparison
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Employer::all();
    }

    public function headings(): array
    {
        return [
            'ID',
            'Name',
            'Company Name',
            'Email',
            'Number',
            'Employment Sector',
            'Head Quater Location',
            'City',
            'Expected Vacancies',
            'Created at',
            'Updated at'
        ];
    }
}
