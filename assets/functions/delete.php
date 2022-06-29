<?php 
APP_CRUD_CRUD::deleteFunctionsAdmin(function(){

    $for = $_POST["delete-confirm"];
    $id = $_POST["del-id"];

    if($for == 'employee'){
        if(APP_CRUD_DB::sql_query("DELETE FROM employees WHERE id='$id' LIMIT 1")){
            $message['code'] = 1;
            $message['status'] = 'Deleted Success';
        }
    }

    if($for == 'team'){
        if(APP_CRUD_DB::sql_query("DELETE FROM teams WHERE id='$id' LIMIT 1")){
            $message['code'] = 1;
            $message['status'] = 'Deleted Success';
        }
    }

    echo json_encode($message);

});
?>