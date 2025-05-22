<?php 

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class RutValidation implements Rule{

    public function passes($attribute, $value)
    {
        $rut = preg_replace('/[^kK0-9]/', '', $value);

        if (strlen($rut) < 2) return false;

        $cuerpo = substr($rut, 0, -1);
        $dv = strtoupper(substr($rut, -1));

        if (!ctype_digit($cuerpo)) return false;

        $suma = 0;
        $multiplo = 2;

        for ($i = strlen($cuerpo) - 1; $i >= 0; $i--) {
            $suma += $cuerpo[$i] * $multiplo;
            $multiplo = $multiplo === 7 ? 2 : $multiplo + 1;
        }

        $resto = $suma % 11;
        $dvEsperado = 11 - $resto;

        if ($dvEsperado === 11) $dvEsperado = '0';
        elseif ($dvEsperado === 10) $dvEsperado = 'K';
        else $dvEsperado = (string) $dvEsperado;

        return $dv === $dvEsperado;
    }

    public function message()
    {
        return 'El RUT ingresado no es válido.';
    }

}