<?php 
if(isset($_POST['registration']) && $_POST['registration'] == 'access'){

    echo APP_AUTH_USERS::register_users();

    //OR YOU CAN DO LIKE THIS
    // $arr = array(
    //     "fname" => htmlentities($_POST['first_name']),
    //     "email" =>  $_POST['email'],
    //     "password" =>  $_POST['password'],
    //     "phone_number" =>  $_POST['phone_number'],
    //     "gender" =>  $_POST['gender']
    // );

    // echo APP_AUTH_USERS::register_users($arr);
    
}

if(isset($_POST['login']) && $_POST['login'] == 'access'){
    
    echo APP_AUTH_USERS::login_users();

}

if(isset($_GET['logout']) && $_GET['logout'] == 'success'){
    
    APP_AUTH_USERS::user_logout("/login");

}
?>