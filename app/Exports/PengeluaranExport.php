<?php

namespace App\Exports;

use App\Models\Pengeluaran;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PengeluaranExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Pengeluaran::select('penanggung_jawab','pengeluaran','keperluan')->get();
    }

    public function headings(): array
    {
        return [
            'Penanggung Jawab',
            'pengeluaran',
            'keperluan',
        ];
    }
}
