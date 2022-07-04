<?php

namespace App\Imports;

use App\Models\federal_district;
use App\Models\subject_rf;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;


class subject_rf_Import implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {   //firstOrCreate()проверяет наличие всех аргументов перед findsсовпадением.
        // Если не все аргументы совпадают, будет создан новый экземпляр модели.
        //Если вы хотите проверить только определенное поле,
        // используйте firstOrCreate(['field_name' => 'value'])только один элемент в массиве.
        // Это вернет первый соответствующий элемент или создаст новый, если не будет найдено совпадений.
        $federal_districts = federal_district::firstOrCreate([
            'name' =>$row['federalnyi_okrug']
        ]);

        $subject_rf = subject_rf::firstOrCreate([
            'name' =>$row['nazvanie'],
            'shortname' =>$row['nazvanie_korotkoe'],
            'federal_district_id' =>DB::table ('federal_district')->where('name', $row['federalnyi_okrug'])->value('id')
        ]);
    }
}
