<?php

namespace App\Services;

class FiltradoTexto
{
    public function filtrar_texto($texto)
    {
        $acentos = [
            'á' => 'a', 'é' => 'e', 'í' => 'i', 'ó' => 'o', 'ú' => 'u',
            'Á' => 'A', 'É' => 'E', 'Í' => 'I', 'Ó' => 'O', 'Ú' => 'U',
            'ñ' => 'n', 'Ñ' => 'N'
        ];

        return strtr($texto, $acentos);
    }
}
