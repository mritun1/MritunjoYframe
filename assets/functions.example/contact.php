<?php 
if(isset($_POST['submitContact'])){

    if($_POST['name']!='' && $_POST['email']!='' && $_POST['message']!=''){

        $arr = array(
            "name" => htmlentities($_POST['name']),
            "email" => htmlentities($_POST['email']),
            "message" =>  htmlentities($_POST['message']),
            "day" => time()
        );
        
        APP_CRUD_CRUD::InsertUpdateData($arr,'contact',APP_CRUD_DB::conn(),"");
        $message['code'] = 1;
    }else{
        $message['code'] = 0;
    }
    echo json_encode($message);
}
?>