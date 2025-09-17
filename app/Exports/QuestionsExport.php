<?php

namespace App\Exports;

use App\Models\Question;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class QuestionsExport implements FromCollection, withHeadings, withMapping, WithStyles
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Question::all();
    }

    public function map($question): array
    {
        return [
            $question->id,
            $question->category->name,
            $question->subcategory->name,
            $question->description,
            $question->order,
            $question->help_text,
            $question->is_optional ? 'sí' : 'no',
            $question->created_at,
            $question->updated_at
        ];
    }

    public function headings(): array
    {
        return [
            'ID',
            'Categoría',
            'Subcategoría',
            'Descripción',
            'Orden',
            'Texto de ayuda',
            '¿Es opcional?',
            'Fecha de creación',
            'Última modificación',
        ];
    }

    public function styles(Worksheet $sheet){
        return [
            // Style the first row as bold text.
            1    => ['font' => ['bold' => true]],
        ];
    }
}
