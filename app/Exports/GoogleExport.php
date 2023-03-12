<?php

namespace App\Exports;

use App\Models\Google;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class GoogleExport implements FromCollection, WithHeadings
{

    public function collection()
    {
        return Google::all();
    }
    public function headings(): array
    {
        return ["id", "file_name", "file_path", "downloaded_at"];
    }
}
