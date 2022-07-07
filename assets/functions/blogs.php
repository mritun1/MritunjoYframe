<?php
if(APP_AUTH_ADMIN::authCheck() == true){

    if(isset($_POST['content']) && $_POST['content']!=''){

        if(isset($_POST['id']) && $_POST['id']!=''){
            $arr = array(
                "id" =>  htmlentities($_POST['id']),
                "title" => htmlentities($_POST['title']),
                "description" => htmlentities($_POST['description']),
                "content" =>  htmlentities($_POST['content']),
            );
        }else{
            $arr = array(
                "title" => htmlentities($_POST['title']),
                "description" => htmlentities($_POST['description']),
                "content" =>  htmlentities($_POST['content'])
            );
        }
        
        $last_id = APP_CRUD_CRUD::InsertUpdateData($arr,'blogs',APP_CRUD_DB::conn(),"");
        

        $message['code'] = 1;
        $message['status'] = 'Blog created success.';
        echo json_encode($message);
    }
    
    if(isset($_POST['deleteBlog']) && $_POST['deleteBlog'] == 'JDK78'){
        $id = htmlentities($_POST['contid']);

        $db->sql_query("DELETE FROM blogs WHERE id='$id' LIMIT 1");
        header("Location:/admin-blogs");

    }
    

}else{
    echo "Error: not_logged_in";
}



?>
