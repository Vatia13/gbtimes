<?php
/**
 * Created by PhpStorm.
 * User: vatichild
 * Date: 10/29/15
 * Time: 6:01 PM
 */

$drupal = mysqli_connect('localhost','root','','gb_old');
$laravel = mysqli_connect('localhost','root','','gb');

if(isset($_GET['insert_users_full_name']) == true){
    $drupal_users_fullname = $drupal->query("SELECT field_full_name_value,entity_id,language FROM field_data_field_full_name WHERE language!='und'");

    while($row = $drupal_users_fullname->fetch_array()){
        $user = $laravel->query("SELECT id FROM is_users WHERE uid='".$row['entity_id']."' LIMIT 1");
        $us =$user->fetch_row()[0];
        $check_user_details = $laravel->query("SELECT id FROM is_details WHERE user_id='".$us."' and full_name='".$row['field_full_name_value']."' and lang='".$row['language']."'");
        //print_r($check_user_details->num_rows);
        if($check_user_details->num_rows <= 0){
            $laravel->query("INSERT INTO is_details (user_id,full_name,lang) VALUES (".$us.",'".$row['field_full_name_value']."','".$row['language']."')");
            print_r($us);
            echo $user->fetch_row()[0].",'".$row['field_full_name_value']."','".$row['language']."'<br>'";
        }else{
            echo '--<br>';
        }
        /*

         */
    }

}
if(isset($_GET['update_native_name']) == true){
    $drupal_users_fullname_native = $drupal->query("SELECT field_full_name_native_value,entity_id FROM field_data_field_full_name_native WHERE 1");
    while($row = $drupal_users_fullname_native->fetch_array()){
        $user = $laravel->query("SELECT id FROM is_users WHERE uid='".$row['entity_id']."'");
        $laravel->query("UPDATE is_details SET full_name_native='".$row['field_full_name_native_value']."' WHERE user_id='".$user->fetch_row()[0]."' ");
    }
}

if(isset($_GET['update_about']) == true){
    $drupal_users_about = $drupal->query("SELECT field_about_me_value,entity_id FROM field_data_field_about_me WHERE 1");
    while($row = $drupal_users_about->fetch_array()){
        $user = $laravel->query("SELECT id FROM is_users WHERE uid='".$row['entity_id']."'");
        $laravel->query("UPDATE is_details SET about='".$row['field_about_me_value']."' WHERE user_id='".$user->fetch_row()[0]."' ");
    }
}

if(isset($_GET['insert_info']) == true){
    $insert_info = $laravel->query("SELECT id,user_id FROM is_details WHERE 1");
    while($row = $insert_info->fetch_array()){
        $laravel->query("INSERT INTO is_detail_user (detail_id,user_id) VALUES ('".$row['id']."','".$row['user_id']."')");
echo $row['user_id'].'<br>';
    }
}

if(isset($_GET['insert_users']) == true){
    $drupal_users = $drupal->query("SELECT users.*,users_roles.rid FROM users LEFT JOIN users_roles ON users_roles.uid = users.uid WHERE 1");
    print_r($drupal_users);

    while($row = $drupal_users->fetch_array()){
        switch($row['rid']):
            case 16:
                $role = 15; //translator
                break;
            case 13:
                $role = 9; //content moderator
                break;
            case 10:
                $role = 14; //embedder
                break;
            case 9:
                $role = 13; //3rd party
                break;
            case 4:
                $role = 4; //author
                break;
            case 8:
                $role = 8; //publisher
                break;
            case 22:
                $role = 10; //proofeditor
                break;
            case 5:
                $role = 11;  //content moderator
                break;
            case 7:
                $role = 5; //frontpage editor
                break;
            case 3:
                $role = 2; //administrator
                break;
            case 19:
                $role = 12; //user moderator
                break;
            default :
                $role = 3; //user
                break;
        endswitch;
        $laravel->query("INSERT INTO is_users (uid,name,email,password,created_at,updated_at) VALUES ('".$row['uid']."','".$row['name']."','".$row['mail']."','".$row['pass']."','".$row['created']."','".$row['access']."')");
        $laravel->query("INSERT INTO is_role_user (role_id,user_id) VALUES ($role,$laravel->insert_id)");
        echo $laravel->insert_id.'<br>';
    }
}