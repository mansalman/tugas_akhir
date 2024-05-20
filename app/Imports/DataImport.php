<?php

namespace App\Imports;

use App\Models\Data;
use Maatwebsite\Excel\Concerns\ToModel;

class DataImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Data([
            'niup' => $row[0],
            'nama_santri' => $row[1],
            'wilayah' => $row[2],
            'daerah' => $row[3],
            'lembaga' => $row[4],
            'nilai_t' => $row[5],
            'nilai_f' => $row[6],
            'nilai_h' => $row[7],
        ]);
    }
}