<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class UsersExport implements FromCollection, ShouldAutoSize, WithMapping, WithHeadings,
        WithEvents
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection(){
        return User::all();
    }

    public function map($user): array{
        return [
            $user->id,
            $user->name,
            $user->email,
        ];
    }

    public function headings(): array{
        return [
            '#',
            'Name',
            'Email'
        ];
    }


    public function registerEvents(): array
    {
        return[
            AfterSheet::class => function(AfterSheet $event) {
                $event->sheet->styleCells(
                    'A1:D1',
                    [
                        'font' => [
                                'bold' => true,
                        ]
                    ]
                );

                
            }
        ];
    }
}
