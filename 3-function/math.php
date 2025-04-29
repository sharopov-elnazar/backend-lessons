<?php

$M_PI = 3.14159265358979323846;
$M_E = 2.71828182845904523536;

function modul($son)
{
    return $son > 0 ? $son : -$son;
}

function daraja($son, $darajasi)
{
    $k = 1;
    for ($i = 0; $i < $darajasi; $i++) {
        $k *= $son;
    }
    return $k;
}

function doira_yuzi($r)
{
    global $M_PI;
    return $M_PI * daraja($r, 2);
}

function doira_perimetri($r)
{
    global $M_PI;
    return 2 * $M_PI * $r;
}

function katta($a, $b)
{
    return $a > $b ? $a : $b;
}

function kichik($a, $b)
{
    return $a < $b ? $a : $b;
}

function max_arr($arr)
{
    $max = $arr[0];
    $index = 0;

    foreach ($arr as $i => $a) {
        if ($max < $a) {
            $max = $a;
            $index = $i;
        }
    }
    return ['max_element' => $max, 'max_index' => $index];
}

// uy ishi string, number, massif, bool bilan ishlaydigan funcsiyalar yozish