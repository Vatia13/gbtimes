<?php
/**
 * Created by PhpStorm.
 * User: Vati
 * Date: 10/25/15
 * Time: 9:22 AM
 */

function stripslashes_deep($value)
{
    $value = is_array($value) ?
        array_map('stripslashes_deep', $value) :
        stripslashes($value);

    return $value;
}