
$laravel->query("INSERT INTO is_images (article_id,title,alt,img,source,author,status,meta_key,meta_desc) VALUES
({$lara_article_id},'".stirpslashes_deep($row['field_shared_title_value'])."',
'".stripslashes_deep($row['field_shared_alt_value'])."','".str_replace('public://','',$row['uri'])."',
'".stripslashes_deep($row['field_shared_photo_source_value'])."',
'".$row['field_shared_photo_authors_value']."',
'1',
'".join(',',array_unique($image_keys))."',
'".stripslashes_deep($row['field_shared_caption_value'])."')");
$laravel->query("INSERT INTO is_article_image(article_id,image_id) VALUES ({$lara_article_id},$laravel->insert_id)");