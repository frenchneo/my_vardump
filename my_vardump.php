<?php
/*
 * my_vardump.php
 * PHP version 8.1.2
 * Author: frenchneo@Web@cademie
 * Date: 2023-06-12
 * Description : reprodution of var_dump function
 */

function my_vardump($val, $indent_level = 0)
{
    echo str_repeat('  ', $indent_level);
    // usage of specifiers in printf : https://php.net/manual/fr/function.printf.php
    switch (gettype($val)) {
        // get type of value
        case 'integer':
            printf('int(%d)' . PHP_EOL, $val); // display integer value
            break;
        case 'double':
            $serialized = serialize($val); // use serialize to have exact comporation with var_dump
            $result = substr($serialized, 2, -1); // remove type and ; at the end
            printf('float(%s)' . PHP_EOL, $result); // display float value
            break;
        case 'string':
            printf('string(%d) "%s"' . PHP_EOL, strlen($val), $val); // display string value and length
            break;
        case 'array':
            printf('array(%d) {' . PHP_EOL, count($val)); // display array length
            foreach ($val as $key => $value) {
                // loop on array
                is_numeric($key)
                    ? printf(
                        '%s  [%d]=>' . PHP_EOL,
                        str_repeat('  ', $indent_level),
                        $key
                    ) // display key
                    : printf(
                        '%s  ["%s"]=>' . PHP_EOL,
                        str_repeat('  ', $indent_level),
                        $key
                    ); // display key
                my_vardump($value, $indent_level + 1); // display value with utils function to have same display as var_dump
            }
            printf('%s}' . PHP_EOL, str_repeat('  ', $indent_level)); // close array
            break;
        case 'NULL':
            printf('NULL' . PHP_EOL); // display NULL
            break;
        case 'boolean':
            printf('bool(%s)' . PHP_EOL, $val ? 'true' : 'false'); // display boolean value
            break;
        default:
            break;
    }
}
?>
