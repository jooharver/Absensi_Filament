<?php

namespace App\Exports;

use App\Models\THR;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;

class ThrExport implements FromArray, WithHeadings, WithTitle
{
    /**
     * @return array
     */
    public function array(): array
    {
        // Ambil semua data THR
        $thrData = THR::all()->toArray();

        // Format data menjadi array yang sesuai
        $formattedData = [];
        foreach ($thrData as $item) {
            $formattedData[] = [
                $item['id_thr'],           // ID THR
                $item['karyawan_id'],      // Karyawan ID
                $item['thr'],              // THR
                $item['created_at'],       // Created At
                $item['updated_at'],       // Updated At
            ];
        }

        return $formattedData;
    }

    /**
     * @return array
     */
    public function headings(): array
    {
        return [
            'ID THR',        // Nama kolom
            'Karyawan ID',   // Nama kolom
            'THR',           // Nama kolom
            'Created At',    // Nama kolom
            'Updated At',    // Nama kolom
        ];
    }

    /**
     * @return string
     */
    public function title(): string
    {
        return 'Tabel THR'; // Judul sheet
    }
}
