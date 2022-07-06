<?php 
require_once('../auth.php');
require_once 'config/autoload.php';
require_once 'config/api_function.php';


$db = new DB();
//$db = new APP_CRUD_CRUD();

if($db->db() == true){
    echo 'Database Connected';
}else{
    echo 'Something went wrong';
}
echo '<br/>';
//////create cars table if not exists

// $sql = "CREATE TABLE IF NOT EXISTS employees (
//     id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
//     first_name VARCHAR(255) NULL,
//     mid_name VARCHAR(255) NULL,
//     last_name VARCHAR(255) NULL,
//     email VARCHAR(255) NULL,
//     country VARCHAR(255) NULL,
//     loc_manager VARCHAR(255) NULL,
//     func_manager VARCHAR(255) NULL,
//     join_date VARCHAR(255) NULL,
//     expiry_date VARCHAR(255) NULL,
//     user_id VARCHAR(255) NULL
//     )";
// if ($db->db()->query($sql) === TRUE) {
//     echo "Table employees created successfully";
// } else {
//     echo "Error creating table: " . $db->db()->error;
// }
// echo '<br/>';

// $sql = "CREATE TABLE IF NOT EXISTS teams (
//     id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
//     team_name VARCHAR(255) NULL,
//     des TEXT NULL,
//     team TEXT NULL,
//     user_id VARCHAR(255) NULL
//     )";
// if ($db->db()->query($sql) === TRUE) {
//     echo "Table Team created successfully";
// } else {
//     echo "Error creating table: " . $db->db()->error;
// }
// echo '<br/>';

// $sql = "CREATE TABLE IF NOT EXISTS users (
//     id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
//     fname VARCHAR(255),
//     lname VARCHAR(255),
//     email VARCHAR(255),
//     password VARCHAR(255),
//     token VARCHAR(255) NULL
//     )";
// if ($db->db()->query($sql) === TRUE) {
//     echo "Table Users created successfully";
// } else {
//     echo "Error creating table: " . $db->db()->error;
// }


?>