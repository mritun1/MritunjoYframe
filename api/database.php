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
// $sql = "CREATE TABLE IF NOT EXISTS blogs (
//    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
//    title VARCHAR(255),
//    description TEXT,
//    content LONGTEXT
// )";
// if ($db->db()->query($sql) === TRUE) {
//    echo "Table cars created successfully";
// } else {
//    echo "Error creating table: " . $db->db()->error;
// }

// $sql = "CREATE TABLE IF NOT EXISTS users (
//     id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
//     fname VARCHAR(255),
//     lname VARCHAR(255),
//     email VARCHAR(255),
//     password VARCHAR(255),
//     token VARCHAR(255) NOT NULL
//     )";
// if ($db->db()->query($sql) === TRUE) {
//     echo "Table cars created successfully";
// } else {
//     echo "Error creating table: " . $db->db()->error;
// }

// $sql = "CREATE TABLE IF NOT EXISTS problems (
//     id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
//     userid VARCHAR(255),
//     title VARCHAR(255),
//     content LONGTEXT,
//     topic VARCHAR(255),
//     solved INT(255) NOT NULL /*1 or 0*/
//     )";
// if ($db->db()->query($sql) === TRUE) {
//     echo "Table created Problems";
// } else {
//     echo "Error creating table: " . $db->db()->error;
// }

// echo '<br/>';

// $sql = "CREATE TABLE IF NOT EXISTS solutions (
//     id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
//     userid VARCHAR(255),
//     content LONGTEXT,
//     problem_id VARCHAR(255),
//     helped INT(255) NOT NULL /*1 or 0*/
//     )";
// if ($db->db()->query($sql) === TRUE) {
//     echo "Table created solutions";
// } else {
//     echo "Error creating table: " . $db->db()->error;
// }


// $sql = "CREATE TABLE IF NOT EXISTS docs (
//     id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
//     user_id VARCHAR(255) NULL,
//     docs_time VARCHAR(255) NULL,
//     docs_thumb VARCHAR(255) NULL,
//     docs_title VARCHAR(255) NULL,
//     docs_des TEXT,
//     docs_cat VARCHAR(255) NULL
//     )";
// if ($db->db()->query($sql) === TRUE) {
//     echo "Table created solutions";
// } else {
//     echo "Error creating table: " . $db->db()->error;
// }
// echo '<br/>';
// $sql = "CREATE TABLE IF NOT EXISTS docs_pages (
//     id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
//     page_time VARCHAR(255) NULL,
//     docs_id VARCHAR(255) NULL,
//     page_title VARCHAR(255) NULL,
//     page_content LONGTEXT,
//     page_sl INT(255) NULL
//     )";
// if ($db->db()->query($sql) === TRUE) {
//     echo "Table created solutions";
// } else {
//     echo "Error creating table: " . $db->db()->error;
// }
?>