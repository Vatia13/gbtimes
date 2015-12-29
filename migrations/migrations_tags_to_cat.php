<?php
/**
 * Created by PhpStorm.
 * User: vatichild
 * Date: 10/29/15
 * Time: 3:21 PM
 */

@include('migrations_functions.php');

$laravel = mysqli_connect('localhost','root','root','gbtimes');
if (!mysqli_set_charset($laravel, "utf8")) {
    printf("Error loading character set utf8: %s\n", mysqli_error($drupal));
    exit();
} else {
    printf("Current character set: %s\n", mysqli_character_set_name($drupal));
}


if(isset($_GET['tag']) <> '' && $_GET['cat'] > 0){
    $tag_news = $laravel->query("SELECT id FROM is_articles WHERE meta_key LIKE '%".$_GET['tag']."%'");
    while($row = $tag_news->fetch_array()){
        echo $row['id'];
        $insert = $laravel->query("INSERT INTO is_article_cat (article_id,cat_id) VALUES ('".$row['id']."','".intval($_GET['cat'])."')");
    }
}