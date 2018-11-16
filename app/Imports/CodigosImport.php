<?php

namespace App\Imports;

use App\Codigo;
use Maatwebsite\Excel\Concerns\ToModel;

class CodigosImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        if($row[0] != 'ubicacion' && $row[1] != 'codigo' && $row[2] != 'envio'){
            $codigo = Codigo::where('codigo', $row[1])->first();
            if(!$codigo){
                return new Codigo([
                    'ubicacion' => $row[0],
                    'codigo'    => $row[1],
                    'envio'     => $row[2],
                ]);
            }else{
                $codigo->ubicacion = $row[0];
                $codigo->codigo    = $row[1];
                $codigo->envio     = $row[2];

                return $codigo;
            }
        }
    }
}