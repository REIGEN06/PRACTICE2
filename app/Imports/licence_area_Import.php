<?php

namespace App\Imports;

use App\Models\licence_area;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class licence_area_Import implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        dd($row);
        $licence_area = licence_status::firstOrCreate([
            'name' =>$row['status_licenzii']
        ]);
    }
}
