<?php

namespace App\Exports;

use App\Models\Contact;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class UsersExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Contact::select(
            'name',
            'email',
            'proffession',
            'address',
            'phone',
            'suggestion',
            'education'
        )->get();
    }

    /**
     * @return array
     */
    public function headings(): array
    {
        return [
            'Name',
            'Email',
            'Profession',
            'Address',
            'Phone',
            'Suggestion',
            'Education',
        ];
    }
}