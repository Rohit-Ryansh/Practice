<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;

class StudentExport implements FromCollection
{
    /**
     * @return \Illuminate\Support\Collection
     */
    use Exportable;
    public function headings(): array
    {
        return [
            'S.No.',
            'Name',
            // 'Email',
            // 'Registration Expirey Date',
            // 'Registration Date',
        ];
    }
    public function collection()
    {
        return User::notAuthUser()->select('name')->get();
    }
}
