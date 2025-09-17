<?php

namespace App\Exports;

use App\Models\User;
use App\Models\Repository;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class ReportExport implements FromArray, withHeadings, WithStyles
{
    /**
    * @return \Illuminate\Support\Array
    */
    public function array(): array
    {
        return [
            [
                User::get()->where('is_active',1)->count(),
                User::get()->where('is_active',0)->count(),
                Repository::where('status','=','aprobado')->get()->count(),
                Repository::where('status','!=','aprobado')->where('status','!=','rechazado')->get()->count(),
                Repository::where('status','!=','rechazado')->get()->count(),
            ]
        ];
    }

    public function headings(): array
    {
        return [
            'USUARIOS ACTIVOS',
            'USUARIOS INACTIVOS',
            strtoupper( __("containerName") ).' APROBADAS',
            strtoupper( __("containerName") ).' PENDIENTES',
            strtoupper( __("containerName") ).' RECHAZADOS',
        ];
    }

    public function styles(Worksheet $sheet){
        return [
            // Style the first row as bold text.
            1    => ['font' => ['bold' => true]],
        ];
    }
}
