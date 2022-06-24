<?php 
APP_CRUD_CRUD::deleteFunctions(function(){

    $for = $_POST["delete-confirm"];
    $id = $_POST["del-id"];

    if($for == 'docs'){
        if(APP_CRUD_DB::sql_query("DELETE FROM docs WHERE id='$id' LIMIT 1")){
            $message['code'] = 1;
            $message['status'] = 'Deleted Success';
        }
    }
    if($for == 'docs_page'){
        if(APP_CRUD_DB::sql_query("DELETE FROM docs_pages WHERE id='$id' LIMIT 1")){
            $message['code'] = 1;
            $message['status'] = 'Deleted Success';
        }
    }

    echo json_encode($message);

});
?>