<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Maatwebsite\Excel\Concerns\WithConditionalSheets;

class List_Import implements WithMultipleSheets 
{
    use WithConditionalSheets;
    public function conditionalSheets(): array
    {
        return [
            'Недропользователь (компания)' => new subsoil_user_Import(),
            'Лицензия' => new licence_Import(),
            // 'Лицензионный участок' => new licence_area_Import(),//не использую, потому что в листе с лицензионными участками участки одни те же, просто лицензии разные (млечный например)
            'Месторождение' => new field_Import(),
            'Субъект РФ' => new subject_rf_Import(),
        ];
    }
}
