<?php
    const TOTAL_PERCENTAGE = 100;
    const MIN_CAL_VALUE = 0;
    const MAX_CAL_VALUE = 10;
    const MIN_PERCENTAGE_VALUE = 0;
    const MAX_PERCENTAGE_VALUE = 100;

    function is_valid_range(array $values_array, float $min, float $max): bool
    {
        foreach ($values_array as $value) {
            if ($value < $min || $value > $max) {
                return false;
            }
        }
        return true;
    }

    function eliminar_cadenas_vacias(array $array): array
    {
        return array_filter($array, "es_equiv_cadena_vacia");
    }

    function es_equiv_cadena_vacia($var)
    {
        return trim($var) != "";
    }



    function validar_numeric_values(array $array): bool
    {
        foreach ($array as $value) {
            if (!is_numeric($value)) {
                return false;
            }
        }
        return true;
    }

    function validar_pesos(array $pesos_array): bool
    {
        $suma = array_sum($pesos_array);
        return ($suma == TOTAL_PERCENTAGE);
    }

    function validar_count_arrays(array $cals_array, array $pesos_array): bool
    {
        return sizeof($cals_array) == count($pesos_array);
    }

    function calcular_media_ponderada(array $cals_array, array $pesos_array): float
    {
        $media_ponderada = 0;
        for ($i = 0; $i < count($cals_array); $i++) {
            $media_ponderada += $cals_array[$i] * $pesos_array[$i] / TOTAL_PERCENTAGE;
        }
        return $media_ponderada;
    }

?>