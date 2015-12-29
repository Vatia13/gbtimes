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


if(isset($_GET['news_img']) == 1){
    $news_img = $laravel->query("SELECT img,article_id FROM is_images WHERE status='1'");
    while($row = $news_img->fetch_array()){
        echo $row['article_id'];
        $insert = $laravel->query("UPDATE is_articles SET img='".$row['img']."' WHERE id = '".$row['article_id']."'");
    }
}