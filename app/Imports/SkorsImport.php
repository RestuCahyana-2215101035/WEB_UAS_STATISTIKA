<?php

namespace App\Imports;

use App\Models\Skor;
use Maatwebsite\Excel\Concerns\ToModel;

class SkorsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Skor([
            'skor' => $row[0]
        ]);
    }
}
