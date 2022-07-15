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


// $sql = "CREATE TABLE IF NOT EXISTS budget (
//     id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
//     user_id VARCHAR(255),
//     budget_name VARCHAR(255),
//     budget_amount VARCHAR(255),
//     budget_start VARCHAR(255),
//     budget_end VARCHAR(255),
//     budget_des VARCHAR(255),
//     budget_status VARCHAR(255)
//     )";
// if ($db->db()->query($sql) === TRUE) {
//     echo "Table Budget created successfully";
// } else {
//     echo "Error creating table: " . $db->db()->error;
// }

// $sql = "CREATE TABLE IF NOT EXISTS budget_items (
//     id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
//     user_id VARCHAR(255),
//     budget_id VARCHAR(255),
//     item_name VARCHAR(255),
//     item_amount VARCHAR(255)
//     )";
// if ($db->db()->query($sql) === TRUE) {
//     echo "Table Budget Items created successfully";
// } else {
//     echo "Error creating table: " . $db->db()->error;
// }

?>