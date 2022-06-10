<?php

namespace App\Imports;

use App\Models\field;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Facades\DB;

class field_Import implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        dd($row);
        return new field([
            'name' => $row['mestorozdenie_deistvuiushhie_licenzii'],
            'degree_of_development'=> $row['stepen_osvoeniia'],
            'polygon' => $row['geom_geometrymultipolygon'],
            'subject_rf_id' => DB::table('subject_rf')->where('shortname', $row['subieekt_rf'])->value('id'),
            'licence_area_id' => DB::table('licence_area')->where('name', $row['licenzionnye_ucastki'])->value('id'),//можно взять explode?
        ]);
    }
}
