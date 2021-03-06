<?php

namespace App\Imports;

use App\Models\licence;
use App\Models\licence_status;
use App\Models\licence_author;
use App\Models\licence_area;
use App\Models\licence_condition;
use App\Models\type_of_main_mineral;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Facades\DB;

class licence_Import implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        // dd($row);

        // $licence_author = licence_author::firstOrCreate([
        //     'name' =>$row['organ_vydavsii_licenziiu']
        // ]);

        // $licence_status = licence_status::firstOrCreate([
        //     'status' =>$row['status_licenzii']
        // ]);

        // $licence_condition = licence_condition::firstOrCreate([
        //     'condition' =>$row['sostoianie_licenzii']
        // ]);

        // $type_of_main_mineral = type_of_main_mineral::firstOrCreate([
        //     'name' =>$row['vid_osnovnogo_poleznogo_iskopaemo']
        // ]);

        // $licence_area = licence_area::firstOrCreate([
        //     'name' =>$row['licenzionnyi_ucastok']
        // ]);

        $licence = licence::firstOrCreate([
                'series' => $row["seriia"],
                'number'=> $row["nomer"],
                'view'=> $row["vid"],
                'date_of_receiving'=> $row["data_registracii"]->formatDates(true, 'Y-m-d'),
                'date_of_expiration'=> $row["data_okoncaniia"]->formatDates(true, 'Y-m-d'),
                'date_of_annulment'=> $row["data_annulirovaniia"]->formatDates(true, 'Y-m-d'),
                'polygon'=> $row["geom_geometrymultipolygon"],
                'subsoil_user_id' => DB::table('subsoil_user')->where('name', $row['nedropolzovatel'])->value('id'),
                'licence_area_id' => DB::table('licence_area')->where('name', $row['licenzionnyi_ucastok'])->value('id'),
                'type_of_main_mineral_id' => DB::table('type_of_main_mineral')->where('name', $row['vid_osnovnogo_poleznogo_iskopaemo'])->value('id'),
                'licence_condition_id' => DB::table('licence_condition')->where('condition', $row['sostoianie_licenzii'])->value('id'),
                'licence_status_id' => DB::table('licence_status')->where('status', $row['status_licenzii'])->value('id'),
                'licence_author_id' => DB::table('licence_author')->where('name', $row['organ_vydavsii_licenziiu'])->value('id'),
        ]);
        
                // 'previous_licence'=>,
                
    }
}
