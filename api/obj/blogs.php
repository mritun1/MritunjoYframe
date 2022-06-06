<?php 
class BLOGS{

    public static function getAllData($type,$sort,$limit,$offset){
        //LISTS OF ALL DATA
        $db = new DB();
        if($type == 'pag'){
            $para = "SELECT * FROM blogs ORDER BY id $sort LIMIT $limit OFFSET $offset";
        }else{
            $para = "SELECT * FROM blogs ORDER BY id DESC";
        }
        
        return $db->GetDataJson($para,$type);
    }

    public static function getDataUsingId($id){
        //GET SINGLE DATA BY ID
        
        $db = new DB();
        $para = "SELECT * FROM blogs WHERE id='$id' LIMIT 1";
        return $db->GetDataJson($para,'single');
    }

    public static function searchData_1($query){
        //GET SINGLE DATA BY ID
        
        // $db = new DB();
        // $para = "SELECT * FROM Art WHERE artist LIKE '%".$query."%'";
        // return $db->GetDataJson($para);
    }

    public static function searchData_2($query){
        // $db = new DB();
        // $para = "SELECT * FROM Art WHERE year<='2015' AND year>='2007'";
        // return $db->GetDataJson($para);
    }

    public static function insertData(){
        
    }

    public static function UpdateData($id){
        
    }

    public static function DeleteData($id){
        //DELETE DATA BY ID
        if(APP_AUTH_ADMIN::authCheck() == true){
            $db = new DB();
            $para = "DELETE FROM blogs WHERE id='$id' LIMIT 1";
            echo $db->InputData("Delete", $para);
        }else{
            echo "Error: not_logged_in";
        }
    }

    public static function Access(){

        //$for = filter_input(INPUT_POST, 'for', FILTER_SANITIZE_STRING);

        // if($for == 'Adminlogin'){
        //     $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
        //     $password = strip_tags($_POST['password']);
        //     echo json_encode(APP_AUTH_ADMIN::login($username,$password));
        // }

        // if($for == 'Adminlogout'){
        //     $message['code'] = '1';
        //     $message['status'] = 'Logout Success';
        //     session_destroy();
        //     echo json_encode($message);
        // }

    }
}
?>