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

// $sql = "CREATE TABLE IF NOT EXISTS users (
//     id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
//     fname VARCHAR(255),
//     lname VARCHAR(255),
//     email VARCHAR(255),
//     password VARCHAR(255),
//     token VARCHAR(255),
//     phone_number VARCHAR(255),
//     gender VARCHAR(255)
//     )";
// if ($db->db()->query($sql) === TRUE) {
//     echo "Table cars created successfully";
// } else {
//     echo "Error creating table: " . $db->db()->error;
// }






// $medicine_product_array = array(
//     array(
//         'img' => 'https://www.netmeds.com/images/product-v1/600x600/404306/pan_40mg_tablet_15_s_0.jpg',
//         'cat' => 'Ulcer/Reflux/Flatulence',
//         'price' => '120.80',
//         'expiry' => '02/10/2022',
//         'produce_name' => 'PAN 40mg Tablet'
//     ),
//     array(
//         'img' => 'https://www.netmeds.com/images/product-v1/600x600/3140/omez_d_sr_capsule_15_s_0.jpg',
//         'cat' => 'Ulcer/Reflux/Flatulence',
//         'price' => '148.00',
//         'expiry' => '20/09/2022',
//         'produce_name' => 'Omez D SR Capsule'
//     ),array(
//         'img' => 'https://www.netmeds.com/images/product-v1/600x600/996162/pain_app_p_tablet_10s_0_0.jpg',
//         'cat' => 'Pain relief',
//         'price' => '47.00',
//         'expiry' => '05/08/2022',
//         'produce_name' => 'PAIN APP P Tablet'
//     ),array(
//         'img' => 'https://www.netmeds.com/images/product-v1/600x600/996442/dolofirst_650_tablet_15s_0_0.jpg',
//         'cat' => 'fever',
//         'price' => '25.00',
//         'expiry' => '10/01/2023',
//         'produce_name' => 'DOLOFIRST 650 Tablet '
//     ),array(
//         'img' => 'https://www.netmeds.com/images/product-v1/600x600/397620/lopamide_2mg_tablet_10_s_0.jpg',
//         'cat' => 'diarrhoea',
//         'price' => '17.00',
//         'expiry' => '25/03/2023',
//         'produce_name' => 'Lopamide 2mg Tablet'
//     ),array(
//         'img' => 'https://www.netmeds.com/images/product-v1/600x600/388098/zofer_md_4mg_tablet_10_s_0.jpg',
//         'cat' => 'Vomitting/Emesis',
//         'price' => '42.00',
//         'expiry' => '30/10/2022',
//         'produce_name' => 'Zofer MD 4mg Tablet'
//     ),array(
//         'img' => 'https://www.netmeds.com/images/product-v1/600x600/317431/zecuf_cough_syrup_100ml_0.jpg',
//         'cat' => 'cough and cold',
//         'price' => '88.40',
//         'expiry' => '03/11/2022',
//         'produce_name' => 'Zecuf Cough Syrup 100ml'
//     ),array(
//         'img' => 'https://www.netmeds.com/images/product-v1/600x600/930731/saridon_advance_headache_relief_tablet_10s_0_1.jpg',
//         'cat' => 'pain relief',
//         'price' => '39.65',
//         'expiry' => '30/03/2024',
//         'produce_name' => 'Saridon Advance Headache Relief Tablet '
//     ),array(
//         'img' => 'https://www.netmeds.com/images/product-v1/600x600/380063/cyfolac_forte_capsule_10_s_0.jpg',
//         'cat' => 'diarrhoea',
//         'price' => '94.10',
//         'expiry' => '05/12/2022',
//         'produce_name' => 'Cyfolac Forte Capsule'
//     ),array(
//         'img' => 'https://www.netmeds.com/images/product-v1/600x600/15740/kofol_syrup_100_ml_0_1.jpg',
//         'cat' => 'cough and cold',
//         'price' => '85.00',
//         'expiry' => '13/02/2024',
//         'produce_name' => 'Kofol Syrup 100 ml'
//     )
// );

// $sql = "CREATE TABLE IF NOT EXISTS medicine (
//     id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
//     img VARCHAR(255),
//     types VARCHAR(255),
//     name VARCHAR(255),
//     price VARCHAR(255),
//     expiry VARCHAR(255),
//     stock INT(255)
//     )";
// if ($db->db()->query($sql) === TRUE) {
//     echo "Medicine Table created successfully";
// } else {
//     echo "Error creating table: " . $db->db()->error;
// }

// foreach($medicine_product_array as $val){
//     $db->db()->query("INSERT INTO medicine(img,types,name,price,expiry,stock) 
//     VALUES('".$val['img']."','".$val['cat']."','".$val['produce_name']."','".$val['price']."','".$val['expiry']."','3')");
// }

// // --------------------------------------------------------------------------------------

// $specialist_array = array(
//     array(
//         'name' => 'XYZ',
//         'img' => 'src="https://thumbs.dreamstime.com/b/portrait-happy-young-handsome-indian-man-doctor-smiling-studio-shot-against-white-background-137823661.jpg"',
//         'branch' => 'general physician',
//         'decription' => 'Responsible physician with 14 years of experience maximizing patient wellness and facility profitability.
//         Seeking to deliver healthcare excellence at GMCH, Guwahati',
//         'experience' => '14yrs',
//         'email' => 'XYZ@mail.com'
//     ),
//     array(
//         'name' => 'ABC',
//         'img' => 'https://t4.ftcdn.net/jpg/03/20/74/45/360_F_320744517_TaGkT7aRlqqWdfGUuzRKDABtFEoN5CiO.jpg',
//         'branch' => 'general physician',
//         'decription' => 'Responsible physician with 9 years of experience maximizing patient wellness and facility profitability.
//          Seeking to deliver healthcare excellence at Excel Care Hospital. At Guwahati, maintained 5-star healthgrades score for 112 reviews and 85% patient success',
//         'experience' => '5yrs',
//         'email' => 'ABC@mail.com'
//     ),
//     array(
//         'name' => 'PQR',
//         'img' => 'https://i.pinimg.com/564x/a5/b2/6b/a5b26b335cc94272b7c1878ec5b13dbd.jpg',
//         'branch' => 'general phsician',
//         'decription' => 'Responsible physician with 9 years of experience maximizing patient wellness and facility profitability.
//         Seeking to deliver healthcare excellence at Apollo Hospital. At Guwahati, maintained 5-star healthgrades score for 270 reviews and 89% patient success',
//         'experience' => '7yrs',
//         'email' => 'PQR@mail.com'
//     ),
//     array(
//         'name' => 'MNO',
//         'img' => 'https://www.kindpng.com/picc/m/101-1018785_transparent-handsome-png-indian-doctor-image-png-png.png',
//         'branch' => 'allergist',
//         'decription' => 'Responsible physician with 9 years of experience maximizing patient wellness and facility profitability.
//         Seeking to deliver healthcare excellence at Nemcare Hospital. At Guwahati, maintained 5-star healthgrades score for 150 reviews and 93% patient success',
//         'experience' => '6yrs',
//         'email' => 'MNO@mail.com'
//     )
// );

// $sql = "CREATE TABLE IF NOT EXISTS doctors (
//     id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
//     img VARCHAR(255),
//     doctor_name VARCHAR(255),
//     specialists VARCHAR(255),
//     email VARCHAR(255),
//     des TEXT,
//     experience VARCHAR(255)
//     )";
// if ($db->db()->query($sql) === TRUE) {
//     echo "Doctors Table created successfully";
// } else {
//     echo "Error creating table: " . $db->db()->error;
// }

// foreach($specialist_array as $val){
//     $db->db()->query("INSERT INTO doctors(img,doctor_name,specialists,email,des,experience) 
//     VALUES('".$val['img']."','".$val['name']."','".$val['branch']."','".$val['email']."','".$val['decription']."','".$val['experience']."')");
// }

// // -------------------------------------------------------------------------
// $treatment_array = array(
//     array(
//         'student_name' => 'abc',
//         'prescription' => 'assets/icons/p/p1.png',
//         'rollno' => '1900002019',
//         'branch' => 'CS'
//     ),
//     array(
//         'student_name' => 'xyz',
//         'prescription' => 'assets/icons/p/p2.png',
//         'rollno' => '1900002001',
//         'branch' =>'Mechanical'
//     ),
//     array(
//         'student_name' => 'efg',
//         'prescription' => 'assets/icons/p/p3.png',
//         'rollno' => '1900002016',
//         'branch' => 'Civil'
//     )
// );
// $sql = "CREATE TABLE IF NOT EXISTS treatment (
//     id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
//     student_name VARCHAR(255),
//     prescription VARCHAR(255),
//     rollno VARCHAR(255),
//     branch VARCHAR(255)
//     )";
// if ($db->db()->query($sql) === TRUE) {
//     echo "Treatment Table created successfully";
// } else {
//     echo "Error creating table: " . $db->db()->error;
// }
// foreach($treatment_array as $val){
//     $db->db()->query("INSERT INTO treatment(student_name,prescription,rollno,branch) 
//     VALUES('".$val['student_name']."','".$val['prescription']."','".$val['rollno']."','".$val['branch']."')");
// }

// $students_array = array(
//     array(
//         'img' => 'https://thumbs.dreamstime.com/b/male-graduate-student-profile-icon-gown-cap-flat-style-vector-eps-male-graduate-student-profile-icon-gown-cap-183202486.jpg',
//         'student_name' => 'Punit Sharma',
//         'rollno' => '190310014028',
//         'branch' => 'CE',
//         'semester' => '5th',
//         'age' => '21'
//     ),
//     array(
//         'img' => 'https://thumbs.dreamstime.com/b/male-graduate-student-profile-icon-gown-cap-flat-style-vector-eps-male-graduate-student-profile-icon-gown-cap-183202486.jpg',
//         'student_name' => 'Ankita Gupta',
//         'rollno' => '180410024019',
//         'branch' => 'BCA',
//         'semester' => '3rd',
//         'age' => '22'
//     ),array(
//         'img' => 'https://thumbs.dreamstime.com/b/male-graduate-student-profile-icon-gown-cap-flat-style-vector-eps-male-graduate-student-profile-icon-gown-cap-183202486.jpg',
//         'student_name' => 'Aniket Yadav',
//         'rollno' => '200410012040',
//         'branch' => 'BCA',
//         'semester' => '1st',
//         'age' => '21'
//     ),array(
//         'img' => 'https://thumbs.dreamstime.com/b/male-graduate-student-profile-icon-gown-cap-flat-style-vector-eps-male-graduate-student-profile-icon-gown-cap-183202486.jpg',
//         'student_name' => 'Ankita Gupta',
//         'rollno' => '180410052020',
//         'branch' => 'ME',
//         'semester' => '5th',
//         'age' => '23'
//     ),array(
//         'img' => 'https://thumbs.dreamstime.com/b/male-graduate-student-profile-icon-gown-cap-flat-style-vector-eps-male-graduate-student-profile-icon-gown-cap-183202486.jpg',
//         'student_name' => 'Dipankar Baishya',
//         'rollno' => '190410034036',
//         'branch' => 'BBA',
//         'semester' => '3rd',
//         'age' => '23'
//     ),array(
//         'img' => 'https://thumbs.dreamstime.com/b/male-graduate-student-profile-icon-gown-cap-flat-style-vector-eps-male-graduate-student-profile-icon-gown-cap-183202486.jpg',
//         'student_name' => 'Sourav Kumar',
//         'rollno' => '200510040041',
//         'branch' => 'ECE',
//         'semester' => '1st',
//         'age' => '20'
//     ),array(
//         'img' => 'https://thumbs.dreamstime.com/b/male-graduate-student-profile-icon-gown-cap-flat-style-vector-eps-male-graduate-student-profile-icon-gown-cap-183202486.jpg',
//         'student_name' => 'Pradyut Thapa',
//         'rollno' => '200610052029',
//         'branch' => 'EE',
//         'semester' => '5th',
//         'age' => '23'
//     ),array(
//         'img' => 'https://thumbs.dreamstime.com/b/male-graduate-student-profile-icon-gown-cap-flat-style-vector-eps-male-graduate-student-profile-icon-gown-cap-183202486.jpg',
//         'student_name' => '',
//         'rollno' => '180210036010',
//         'branch' => 'CE',
//         'semester' => '5th',
//         'age' => '23'
//     ),array(
//         'img' => 'https://thumbs.dreamstime.com/b/male-graduate-student-profile-icon-gown-cap-flat-style-vector-eps-male-graduate-student-profile-icon-gown-cap-183202486.jpg',
//         'student_name' => 'Ethan Deori',
//         'rollno' => '210210054011',
//         'branch' => 'CSE',
//         'semester' => '1st',
//         'age' => '20'
//     )
// );
// $sql = "CREATE TABLE IF NOT EXISTS students (
//     id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
//     img VARCHAR(255),
//     student_name VARCHAR(255),
//     rollno VARCHAR(255),
//     branch VARCHAR(255),
//     semester VARCHAR(255),
//     age VARCHAR(255)
//     )";
// if ($db->db()->query($sql) === TRUE) {
//     echo "Student Table created successfully";
// } else {
//     echo "Error creating table: " . $db->db()->error;
// }
// foreach($students_array as $val){
//     $db->db()->query("INSERT INTO students(img,student_name,rollno,branch,semester,age) 
//     VALUES('".$val['img']."','".$val['student_name']."','".$val['rollno']."','".$val['branch']."','".$val['semester']."','".$val['age']."')");
// }

// $sql = "CREATE TABLE IF NOT EXISTS orders(
//     id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
//     img VARCHAR(255),
//     product_name VARCHAR(255),
//     qty INT(255),
//     price VARCHAR(255),
//     status INT(255),
//     day VARCHAR(255),
//     user_id VARCHAR(255)
//     )";
// if ($db->db()->query($sql) === TRUE) {
//     echo "Orders Table created successfully";
// } else {
//     echo "Error creating table: " . $db->db()->error;
// }

// $sql = "CREATE TABLE IF NOT EXISTS contact(
//     id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
//     name VARCHAR(255),
//     email VARCHAR(255),
//     message TEXT,
//     day VARCHAR(255)
//     )";
// if ($db->db()->query($sql) === TRUE) {
//     echo "Contact Table created successfully";
// } else {
//     echo "Error creating table: " . $db->db()->error;
// }

$data = "SELECT * FROM contact ORDER BY id DESC";
$getAll = json_decode(APP_CRUD_DB::getAll($data),true);
//$password = $getAll[0]['row_name'];
if($getAll){
    foreach($getAll as $key){
        echo $key['name'] . '<br/>';
    }
    
}

// $sql = "CREATE TABLE IF NOT EXISTS appointment(
//     id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
//     rollno VARCHAR(255),
//     branch VARCHAR(255),
//     message TEXT,
//     day VARCHAR(255)
//     )";
// if ($db->db()->query($sql) === TRUE) {
//     echo "Appointment Table created successfully";
// } else {
//     echo "Error creating table: " . $db->db()->error;
// }
?>