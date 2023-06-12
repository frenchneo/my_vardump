<?php
/*
 * unit_tests.php
 * PHP version 8.1.2
 * Author: frenchneo@Web@cademie
 * Date: 2023-06-12
 * Description : unit tests for my_vardump function
 */

require_once 'my_vardump.php';

function unit_test($val)
{
    ob_start();
    my_vardump($val);
    $my_vardump_result = ob_get_clean();

    ob_start();
    var_dump($val);
    $var_dump_result = ob_get_clean();

    if ($my_vardump_result === $var_dump_result) {
        echo 'OK' . PHP_EOL;
    } else {
        echo 'KO' . PHP_EOL;
        echo "Excpected <$var_dump_result> but got <$my_vardump_result>";
    }
}

$int = 123;
$float = 1.21567567455641;
$string =
    'Hello Worldeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeee';
$array = [1, 'f', 3];
$arrayOfarray = [[1, 2, 3], [4, 5, 6], [7, 'a', 9]];
$arrayOfarray2 = [
    [[1, 2, 3], [4, 5, 6], [7, 8, 'e']],
    [
        [1, 2, 3],
        [4, 5, 6],
        [
            7,
            8,
            [
                [[1, 2, 3], [4, 5.548555, 6], [7, 8, 9]],
                [[1, 2, 3], [4, 5, 6], [7, 8, 9]],
            ],
        ],
    ],
    [[1, 2, 3], [4, 5, 6], [7, 8, 9]],
    [[[1, 2, 3], [4, 5, 6], [7, 8, 9]], [[1, 2, 3], [4, 5, 6], [7, 8, 9]]],
    [[1, 2, 3], [4, 5, 6], [7, 8, 9]],
];

$complex_array = [
    'name' => 'toto',
    'age' => 23,
    'adress' => [
        'city' => 'Marseille',
        'country' => 'France',
    ],
];

unit_test($int);
unit_test($float);
unit_test($string);
unit_test($array);
unit_test($arrayOfarray);
unit_test($arrayOfarray2);
unit_test($complex_array);
