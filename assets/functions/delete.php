<?php 
//FOR ADMIN
APP_CRUD_CRUD::deleteFunctionsAdmin(function(){

    $for = $_POST["delete-confirm"];
    $id = $_POST["del-id"];

    $val = 0;

    if($for == 'dept'){
        if(APP_CRUD_DB::sql_query("DELETE FROM users WHERE id='$id' LIMIT 1")){
            $message['code'] = 1;
            $message['status'] = 'Deleted Success';
            $val = 1;
        }
    }
    
    if($val == 1){
        echo json_encode($message);
    }

});
//FOR USERS
APP_CRUD_CRUD::deleteFunctions(function(){

    $for = $_POST["delete-confirm"];
    $id = $_POST["del-id"];

    $val = 0;

    if($for == 'budget_items'){
        if(APP_CRUD_DB::sql_query("DELETE FROM budget_items WHERE id='$id' LIMIT 1")){
            $message['code'] = 1;
            $message['status'] = 'Deleted Success';
            $val = 1;
        }
    }

    if($val == 1){
        echo json_encode($message);
    }

});
?>