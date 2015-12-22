<?php
/**
 * Created by PhpStorm.
 * User: vatichild
 * Date: 10/22/15
 * Time: 12:35 PM
 */
@include('functions.php');
$drupal = mysqli_connect('localhost','root','','gb_old');
if (!mysqli_set_charset($drupal, "utf8")) {
    printf("Error loading character set utf8: %s\n", mysqli_error($drupal));
    exit();
} else {
    printf("Current character set: %s\n", mysqli_character_set_name($drupal));
}
$laravel = mysqli_connect('localhost','root','','gb');

/*
$drupal_articles_body = $drupal->query('SELECT nid FROM field_data_body WHERE id > 0');
$drupal_articles_body_array = array();
foreach($drupal_articles_body->fetch_all() as $item):
    foreach($item as $it):
        $drupal_articles_body_array['id'][] = $it;
        endforeach;
endforeach;

$drupal_articles_img = array();
$drupal_images = $drupal->query("SELECT field_main_image_fid FROM field_data_field_main_image WHERE entity_id IN (".join(',',$drupal_articles_body_array['id']).")");
foreach($drupal_images->fetch_all() as $item):
    foreach($item as $it):
        $drupal_articles_img[] = $it;
    endforeach;
endforeach;

$drupal->query("DELETE FROM file_managed WHERE fid NOT IN (".join(',',$drupal_articles_img).")");
*/
/**
 * Insert Articles From drupal to Laravel
 */
if(isset($_GET['insert_articles']) == true):
    if(isset($_GET['start'])){$start = $_GET['start'];}
    if(isset($_GET['end'])){$end = $_GET['end'];}
    if(!empty($start) && !empty($end)){
        $limit = "LIMIT $start,$end";
    }else{
        $limit = "";
    }
    echo $limit;
$drupal_articles =
$drupal->query('SELECT a.*,b.body_value,b.body_summary,c.field_author_target_id
FROM node as a
LEFT JOIN field_data_body as b ON b.entity_id = a.nid
LEFT JOIN field_data_field_author as c ON c.entity_id = a.nid
WHERE a.nid > 0 ORDER BY a.nid DESC '.$limit);
print_r($drupal_articles);
$laravel_articles = array();

while($row = $drupal_articles->fetch_array()) {
    $laravel_articles['node'] = $row['nid'];
    $laravel_articles['lang'] = $row['language'];
    $laravel_articles['title'] = $row['title'];
    $laravel_articles['head'] = $row['body_summary'];
    $laravel_articles['body'] = $row['body_value'];
    $laravel_articles['created_at'] = $row['created'];
    $laravel_articles['updated_at'] = $row['changed'];
    $laravel_articles['status'] = $row['status'];
    $laravel_articles['type'] = $row['type'];

    $check_if_exists = $laravel->query("SELECT count(id) FROM is_articles WHERE node='" . $laravel_articles['node'] . "'");
    $check_num = $check_if_exists->fetch_row();

    print_r($check_num[0] . '-' . $laravel_articles['node'] . '<br>');
    if ($check_num[0] <= 0) {
    $slug = $drupal->query("SELECT alias FROM url_alias WHERE `source`='node/".$laravel_articles['node']."'");
    $user = $drupal->query("SELECT field_full_name_value FROM field_data_field_full_name WHERE entity_id=".$row['field_author_target_id']);
    //$user = $drupal->query("SELECT name FROM users WHERE uid=".$row['field_author_target_id']);
    $username = '';
    if($user){
        $i=0;foreach($user->fetch_all() as $item){ $i++;
            $username .= $item[0];
            if($i<$user->num_rows){
                $username .= ', ';
            }
        }
    }else{
        $username = '';
    }


        $laravel->query("INSERT INTO is_articles
(node,user_id,type,lang,title,head,body,slug,author,status,created_at,updated_at,published_at) VALUES
('" . $laravel_articles['node'] . "',
1,
'".$laravel_articles['type']."',
'" . $laravel_articles['lang'] . "',
'" . mysql_real_escape_string($laravel_articles['title']) . "',
'" . mysql_real_escape_string($laravel_articles['head']) . "',
'" . mysql_real_escape_string($laravel_articles['body']). "',
'".$slug->fetch_row()[0]."',
'".$username."',
'".$laravel_articles['status']."',
'" . date('Y-m-d H:i:s',$laravel_articles['created_at']) . "',
'" . date('Y-m-d H:i:s',$laravel_articles['updated_at']) . "',
'" . date('Y-m-d H:i:s',$laravel_articles['created_at']) . "')
");
    }
}

endif;



/**
 * INSERT FRONTPAGE TITLE
 */
if(isset($_GET['front_page_title']) == true){
    $front_page_title = $drupal->query("SELECT field_frontpage_title_value,entity_id FROM field_data_field_frontpage_title WHERE 1");
    while($row = $front_page_title->fetch_array()){
        $laravel->query("UPDATE is_articles SET frontpage_title='".$row['field_frontpage_title_value']."' WHERE node=".$row['entity_id']);
        echo $row['entity_id'].'<br>';
    }
}

/**
 * INSERT SOCIAL MEDIA TITLE
 */
if(isset($_GET['social_media_title']) == true){
    $front_page_title = $drupal->query("SELECT field_social_media_title_value,entity_id FROM field_data_field_social_media_title WHERE 1");
    while($row = $front_page_title->fetch_array()){
        $laravel->query("UPDATE is_articles SET social_media_title='".$row['field_social_media_title_value']."' WHERE node=".$row['entity_id']);
        echo $row['entity_id'].'-'.$row['field_social_media_title_value'].'<br>';
    }
}


/**
 * add TAGS
 */
if(isset($_GET['add_tags']) == 1){
    $tags = $drupal->query("SELECT a.field_tags_tid,a.entity_id,b.name FROM field_data_field_tags as a LEFT JOIN taxonomy_term_data as b ON b.tid=a.field_tags_tid WHERE 1");
    $tags_array = array();

    while($row = $tags->fetch_array()){
        $tags_array[$row['entity_id']][] = $row['name'];
    }
    foreach($tags_array as $key=>$item){
        $laravel->query("UPDATE is_articles SET meta_key='".join(', ',array_unique($item))."' WHERE node='".$key."'");
        echo $key.'---'.join(', ',array_unique($item)).'<br>';
    }
}


/**
 * INSERT brightcove VIDEO
 */
$larray = array();
if(isset($_GET['brightcove_insert']) == true){
    $videos = $drupal->query("SELECT field_video_brightcove_id,entity_id FROM field_data_field_video WHERE 1");
    while($row = $videos->fetch_array()){
        $larray['extra_fields']['brightcove'] = $row['field_video_brightcove_id'];
        $field = base64_encode(serialize($larray['extra_fields']));
        $laravel->query("UPDATE is_articles set extra_fields='{$field}',type='video' WHERE node='".$row['entity_id']."'");
        echo $row['entity_id'].'<br>';
    }
}
/**
 * INSERT EMBED VIDEO
 */

if(isset($_GET['embed_insert']) == true){
    $videos = $drupal->query("SELECT field_embed_video_value,entity_id FROM field_data_field_embed_video WHERE 1");
    while($row = $videos->fetch_array()){
       // $exv = $laravel->query("SELECT extra_fields FROM is_articles WHERE node=".$row['entity_id']);
        $larray['extra_fields']['embed_video'] = $row['field_embed_video_value'];
        $field = base64_encode(serialize($larray['extra_fields']));
        $laravel->query("UPDATE is_articles set extra_fields='{$field}',type='video' WHERE node='".$row['entity_id']."'");
        echo $row['entity_id'].'<br>';
    }
}


//print_r($laravel_articles);
/**
 * Insert cats from drupal to Laravel
 */
if(isset($_GET['insert_cats']) == true){
    $laravel_query = $laravel->query("SELECT id,node,type FROM is_articles WHERE 1");
    $cat = 0;
    while($item = $laravel_query->fetch_array()){
        $drupal_query = $drupal->query("SELECT field_section_tid from field_data_field_section WHERE entity_id=".$item['node']);
        switch($drupal_query->fetch_row()[0]):
            case 1:
                $cat = 74; //china
                break;
            case 323101:
                $cat = 81; //chinema
                break;
            case 2:
                $cat = 75; //world
                break;
            case 3:
                $cat = 76; //opinion
                break;
            case 4:
                $cat = 77; //business
                break;
            case 5:
                $cat = 78; //life
                break;
            case 6:
                $cat = 79; //travel
                break;
            case 9616:
                $cat = 80; //blogs
                break;
            default :
                $cat = 55;
                break;
        endswitch;
        if($item['type']=='horoscope'){
            $cat = 82;
        }
        $laravel_cats = $laravel->query("INSERT INTO is_article_cat (article_id,cat_id) VALUES ({$item['id']},{$cat})");
        echo $cat.' - successfully added';
    }

    //while($row = $drupal_cats->fetch_array()){

        //$laravel_articles = $laravel->query("SELECT id FROM is_articles WHERE node=".$row['entity_id']);
        //$article_id = $laravel_articles->fetch_row();
        //$if_cat_exists = $laravel->query("SELECT count(id) FROM is_article_cat WHERE article_id={$article_id[0]} and cat_id={$cat}");
        //if($if_cat_exists){
          //  if($if_cat_exists->fetch_row()[0] > 0){
          //      echo 'don`t add';
           // }else{

           // }
       // }

        /*if($if_cat_exists){
            $check_cat = $if_cat_exists->fetch_row();
        }*/



        //$laravel_cats = $laravel->query("INSERT INTO is_article_cat (article_id,cat_id) VALUES ({$article_id[0]},{$cat})");
        //print_r($article_id[0].'-'.$cat.'<br>');

}

/**
 * Insert Authors to Articles From drupal to Laravel
 */
if(isset($_GET['insert_authors']) == true){
    $drupal_authors = $drupal->query("SELECT field_author_target_id,entity_id FROM field_data_field_author WHERE 1");
    while($row = $drupal_authors->fetch_array()){
        $drupal_users = $drupal->query("SELECT field_full_name_value FROM field_data_field_full_name WHERE entity_id=".$row['field_author_target_id']);
        if($laravel->query("UPDATE is_articles SET author='".$drupal_users->fetch_row()[0]."' WHERE node=".$row['entity_id'])){
            print_r($row['entity_id'].'-'.$row['field_author_target_id'].'<br>');
        }else{
            print_r($row['entity_id'].'-0');
        }

    }

}

/**
 * Insert Main Image
 */
if(isset($_GET['insert_main_image']) == true){
    $drupal_images = $drupal->query("SELECT
      a.entity_id,
      a.field_main_image_fid,b.uri,
      c.field_caption_value,
      d.field_file_image_alt_text_value,
      e.field_file_image_title_text_value,
      f.field_external_content_from_value,
      g.field_photo_source_value
      FROM field_data_field_main_image as a
      LEFT JOIN file_managed as b ON b.fid=a.field_main_image_fid
      LEFT JOIN field_data_field_caption as c ON c.entity_id=a.entity_id
      LEFT JOIN field_data_field_file_image_alt_text as d ON d.entity_id=a.entity_id
      LEFT JOIN field_data_field_file_image_title_text as e ON e.entity_id=a.entity_id
      LEFT JOIN field_data_field_external_content_from as f ON f.entity_id=a.entity_id
      LEFT JOIN field_data_field_photo_source as g ON g.entity_id=a.entity_id
      WHERE 1 GROUP by a.entity_id");
    $lara_nodes = array();
    $img = array();
    //print_r($drupal_images->fetch_array());
    //print_r($img);
    //LEFT JOIN field_data_field_photo_keywords as h ON h.entity_id = a.field_main_image_fid
    //LEFT JOIN field_data_field_photo_authors as i ON i.entity_id = a.field_main_image_fid

    while($row = $drupal_images->fetch_array()){
        $image_keys = '';
        $image_auth = '';
        $image_keywords = $drupal->query("SELECT b.name FROM field_data_field_photo_keywords as a
        LEFT JOIN taxonomy_term_data as b ON b.tid=a.field_photo_keywords_tid
        WHERE entity_id=".$row['field_main_image_fid']."");

        if($image_keywords){
            //echo $row['entity_id'].'-';
            $i=0;foreach($image_keywords->fetch_all() as $item){ $i++;
                $image_keys .= $item[0];
                if($i<$image_keywords->num_rows){
                   $image_keys .= ', ';
                }
            }
        }
       // echo '<br>';
        //$image_authors = $drupal->query("SELECT name FROM taxonomy_term_data WHERE tid=".$row['field_photo_authors_tid']."");
        $image_authors = $drupal->query("SELECT b.name FROM field_data_field_photo_authors as a
        LEFT JOIN taxonomy_term_data as b ON b.tid=a.field_photo_authors_tid
        WHERE entity_id=".$row['field_main_image_fid']."");

        if($image_authors){
            //echo $row['entity_id'];
            $i=0;foreach($image_keywords->fetch_all() as $item){ $i++;
                $image_auth .= $item[0];
                if($i<$image_keywords->num_rows){
                    $image_auth .= ', ';
                }
            }
        }
        //echo $image_auth;
        $image_url = str_replace('public://','',$row['uri']);
        echo $row['entity_id'].'----'.$image_url.'<br>';
        //echo $row['entity_id'].'-'.$row['field_photo_keywords_tid'].'-'.$row['field_photo_authors_tid'].'<br>';


        $lara_article = $laravel->query("SELECT id FROM is_articles WHERE node=".$row['entity_id']);
        $lara_article_id = $lara_article->fetch_row()[0];
        $laravel->query("INSERT INTO is_images (article_id,title,alt,img,source,author,meta_key,meta_desc) VALUES
     ({$lara_article_id},'".mysql_real_escape_string($row['field_file_image_title_text_value'])."',
        '".mysql_real_escape_string($row['field_file_image_alt_text_value'])."','".mysql_real_escape_string($image_url)."',
        '".mysql_real_escape_string($row['field_photo_source_value']).' '.mysql_real_escape_string($row['field_external_content_from_value'])."',
        '".$image_auth."',
        '".$image_keys."',
        '".mysql_real_escape_string($row['field_caption_value'])."')");
        $laravel->query("INSERT INTO is_article_image(article_id,image_id) VALUES ({$lara_article_id},$laravel->insert_id)");

    }

}



/**
 * Insert Gallery Image
 */
if(isset($_GET['insert_gallery_image']) == true){
    $drupal_images = $drupal->query("SELECT
      a.entity_id,
      a.field_slideshow_images_fid,b.uri,
      c.field_shared_caption_value,
      d.field_shared_alt_value,
      e.field_shared_title_value,
      f.field_shared_photo_authors_value,
      g.field_shared_photo_source_value
      FROM field_data_field_slideshow_images as a
      LEFT JOIN file_managed as b ON b.fid=a.field_slideshow_images_fid
      LEFT JOIN field_data_field_shared_caption as c ON c.entity_id=a.entity_id
      LEFT JOIN field_data_field_shared_alt as d ON d.entity_id=a.entity_id
      LEFT JOIN field_data_field_shared_title as e ON e.entity_id=a.entity_id
      LEFT JOIN field_data_field_shared_photo_authors as f ON f.entity_id=a.entity_id
      LEFT JOIN field_data_field_shared_photo_source as g ON g.entity_id=a.entity_id
      WHERE 1");
    $lara_nodes = array();
    $img = array();

    //print_r($img);
    //LEFT JOIN field_data_field_photo_keywords as h ON h.entity_id = a.field_main_image_fid
    //LEFT JOIN field_data_field_photo_authors as i ON i.entity_id = a.field_main_image_fid

    while($row = $drupal_images->fetch_array()){
        $image_keys = '';
        $image_auth = '';
        $image_keywords = $drupal->query("SELECT b.name FROM field_data_field_photo_keywords as a
        LEFT JOIN taxonomy_term_data as b ON b.tid=a.field_photo_keywords_tid
        WHERE entity_id=".$row['field_slideshow_images_fid']."");

        if($image_keywords){
            //echo $row['entity_id'].'-';
            $i=0;foreach($image_keywords->fetch_all() as $item){ $i++;
                $image_keys .= $item[0];
                if($i<$image_keywords->num_rows){
                    $image_keys .= ', ';
                }
            }
        }
        echo $row['uri'].'<br>';



        $lara_article = $laravel->query("SELECT id FROM is_articles WHERE node=".$row['entity_id']);
        $lara_article_id = $lara_article->fetch_row()[0];
        echo $lara_article_id.'<br>';
        $laravel->query("INSERT INTO is_images (article_id,title,alt,img,source,author,status,meta_key,meta_desc) VALUES
     ({$lara_article_id},'".mysql_real_escape_string($row['field_shared_title_value'])."',
        '".mysql_real_escape_string($row['field_shared_alt_value'])."','".mysql_real_escape_string(str_replace('public://','',$row['uri']))."',
        '".mysql_real_escape_string($row['field_shared_photo_source_value'])."',
        '".$row['field_shared_photo_authors_value']."',
        '1',
        '".$image_keys."',
        '".mysql_real_escape_string($row['field_shared_caption_value'])."')");
        $laravel->query("INSERT INTO is_article_image(article_id,image_id) VALUES ({$lara_article_id},$laravel->insert_id)");

    }

}

