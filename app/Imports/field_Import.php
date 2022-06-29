<?php

namespace App\Imports;

use App\Models\field;
use App\Models\field_subject_rf;
use App\Models\field_licence_area;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Collection;

class field_Import implements ToCollection, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function collection(Collection $rows)
    {
        // foreach ($rows as $row) {
        //     $field = field::firstOrCreate([
        //     'name' => rtrim(explode('(',$row['mestorozdenie_deistvuiushhie_licenzii'])[0]),
        //     'degree_of_development'=> $row['stepen_osvoeniia'],
        //     // 'polygon' => $row['geom_geometrymultipolygon'],
        // ]);
        // }

            
        // foreach ($rows as $row) {
        //     // dd($row);
        //     $field_id = DB::table('field')
        //     ->where('name', rtrim(explode('(',$row['mestorozdenie_deistvuiushhie_licenzii'])[0]))
        //     ->value('id');

        //     $subject_id = DB::table('subject_rf')
        //     ->where('shortname', $row['subieekt_rf'])
        //     ->value('id');

        //     $field_subject_rf = field_subject_rf::firstOrCreate([
        //     'field_id' => $field_id,
        //     'subject_rf_id' => $subject_id,
        // ]);
        // }
            set_time_limit(360);
        foreach ($rows as $row) {
            $field_id = DB::table('field')
            ->where('name', rtrim(explode('(',$row['mestorozdenie_deistvuiushhie_licenzii'])[0]))
            ->value('id');
            
            foreach(preg_split('/\r\n|\r|\n/', $row['licenzionnye_ucastki']) as $licence_area) {
                
                if($licence_area == '') break; 
                
                $licence_area = rtrim(explode('(', $licence_area)[0]);
                
                $licence_area_id = DB::table('licence_area')
                ->where('name', $licence_area)
                ->value('id');

                $field_licence_area = field_licence_area::firstOrCreate([
                    'field_id' => $field_id,
                    'licence_area_id' => $licence_area_id,
                    ]);
            }
        }
    }
}