<?php
/**
 * Created by PhpStorm.
 * User: vatichild
 * Date: 10/29/15
 * Time: 3:21 PM
 */

@include('functions.php');
$drupal = mysqli_connect('localhost','root','','gb_horo');
$laravel = mysqli_connect('localhost','root','','gb');

$lara_extra = array();
if(isset($_GET['horo_type']) == true){
    $horoscope_type = $drupal->query("SELECT field_horoscope_type_value,entity_id FROM field_data_field_horoscope_type WHERE 1");

    while($row = $horoscope_type->fetch_array()){
        $lara_extra['extra_fields']['horoscope_type'] = $row['field_horoscope_type_value'];
        $horoscope_animal = $drupal->query("SELECT c.name FROM field_data_field_horoscope_animal as a LEFT JOIN taxonomy_term_data as c ON c.tid=a.field_horoscope_animal_tid  WHERE a.entity_id=".$row['entity_id']);
        $lara_extra['extra_fields']['horoscope_animal'] = strtolower($horoscope_animal->fetch_row()[0]);
        //echo $horoscope_animal->fetch_row()[0].'-'.$row['entity_id'].'<br>';
        $horo_type = base64_encode(serialize($lara_extra['extra_fields']));
        $laravel->query("UPDATE is_articles SET extra_fields='".$horo_type."' WHERE node=".$row['entity_id']);
    }

    /*
    while($row = $horoscope_type->fetch_array()){
        $lara_extra['extra_fields']['horoscope_type'] = $row['field_horoscope_type_value'];
        $horo_type = serialize($lara_extra['extra_fields']);
        $laravel->query("UPDATE is_articles SET extra_fields='".$horo_type."' WHERE node=".$row['entity_id']);
    }*/
}

