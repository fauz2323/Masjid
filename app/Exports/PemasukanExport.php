<?php

namespace App\Exports;

use App\Models\Pemasukan;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PemasukanExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Pemasukan::select('penanggung_jawab','pemasukan','keterangan')->get();
    }

    public function headings(): array
    {
        return [
            'Penanggung Jawab',
            'Pemasukan',
            'Keterangan',
        ];
    }
}
