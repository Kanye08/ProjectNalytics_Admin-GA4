<?php

namespace App\Imports;

use App\Models\Google;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class GoogleImport implements ToModel, WithHeadingRow
{

    public function model(array $row)
    {
        return new Google([]);
    }
}
