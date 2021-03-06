<?php

namespace App\Imports;

use App\Models\subsoil_user;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Facades\DB;

class subsoil_user_Import implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        // dd($row);
        $subsoil_user = subsoil_user::firstOrCreate([
            'name' =>$row['nazvanie'],
            'address' => $row['poctovyi_adres'],
            'INN' => $row['inn'],
            'OKPO' => $row['kod_okpo'],
            'OKATO' => $row['kod_okato'],
            'OGRN' => $row['ogrn'],
            'notes' => $row['primecanie'],
            'status' => $row['tekushhee_sostoianie'],
            'count_licences' => $row['kolicestvo_licenzii'],
            'count_valid_licences' => $row['kolicestvo_deistvuiushhix_licenzii'],
        ]);
        
        $subsoil_management = subsoil_user::where('ManagementCo')
        ->update(['ManagementCo' => DB::table ('subsoil_user')
        ->where('name', $row['upravliaiushhaia_kompaniia'])
        ->value('id')]);
    }
}
