<?php

namespace App\Imports;

use App\Models\subsoil_user;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Collection;

class subsoil_user_Import implements ToCollection, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
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
        } 
        foreach ($rows as $row) {
            $company_id = DB::table ('subsoil_user')->where('name', $row['upravliaiushhaia_kompaniia'])->value('id');
            
            $subsoil_management = subsoil_user::where('name', $row['nazvanie'])->update(['ManagementCo' => $company_id]);

            //старый вариант тут 
            // $subsoil_management = subsoil_user::where('ManagementCo',)
            // ->update(['ManagementCo' => DB::table ('subsoil_user')
            // ->where('name', $row['upravliaiushhaia_kompaniia'])
            // ->value('id')]);
        }
    }
}
