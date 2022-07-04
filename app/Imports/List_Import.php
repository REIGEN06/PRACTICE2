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
            'Месторождение' => new field_Import(),
            'Субъект РФ' => new subject_rf_Import(),
        ];
    }
}
