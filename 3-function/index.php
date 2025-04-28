<?php

function add($a, $b)
{
    return $a + $b;
}

// echo add(2, 3) . " ";


function massif($arr)
{
    $uzunlik = count($arr);
    $sum = 0;
    foreach ($arr as $a) {
        $sum += $a;
    }
    return ['length' => $uzunlik, 'sum' => $sum];
}

echo massif([1, 2, 3, 4, 5])['length'] . " ";
echo massif([1, 2, 3, 4, 5])['sum'] . " ";
print_r(massif([1, 2, 3, 4, 5]));