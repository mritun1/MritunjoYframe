<?php 
class APP_CRUD_DB{

    //CONNECTION DATABASE
    public static function conn(){
        $db = new mysqli("localhost", constant('DATABASE_USER_NAME'), constant('DATABASE_PASS'), constant('DATABASE_NAME'));
        if($db->connect_error){
            return false;
        }else{
            return $db;
        }
    }

    //CHECK IF DATA EXISTS
    public static function checkData($data){
        if((self::conn()->query($data)->num_rows) > 0){
            return true;
        }else{
            return false;
        }
    }

    //GET ALL DATA
    public static function getAll(string $data){
        $arr = array();
        $return = false;
        $sql = self::conn()->query($data);
        if($sql){
            if($sql->num_rows > 0){
                foreach($sql as $row){
                    $arr[] = $row;
                }
                $return = json_encode($arr);
            }
        }
        return $return;
    }

    //GET ROW OF SINGLE DATA
    public static function getOne(string $row, string $table, string $where){
        $return = false;
         $query = "SELECT $row FROM $table WHERE $where LIMIT 1";
         $sql = self::conn()->query($query);
         if($sql){
             if($sql->num_rows >0){
                 while($rows = $sql->fetch_row()){
                     $return = $rows[0];
                 }
             }
         }
         return $return;
     }

    //SEARCHING DATABASE
    public static function searchData(string $list, string $table, string $query, string $query2 = null){
        $search = '';
        if($query != ""){
            $list_exp = explode(",",$list);
            $i = 0;
            foreach($list_exp as $key){
                if(++$i === count($list_exp)) {
                    $search .= $key." LIKE '%" .$query . "%' ";
                }else{
                    $search .= $key." LIKE '%" .$query . "%' OR ";
                }
            }
            $sql_query = "SELECT * FROM $table WHERE $search $query2";
            return self::getAll($sql_query);
        }
        //return $sql_query;
    }

    //QUERY TO DATABASE
    public static function sql_query($para){
        $sql = self::conn()->query($para);
        if($sql){
            return true;
        }else{
            return false;
        }
    } 

    //GET NUM ROWS
    public static function getNumRows($para){
        $sql = self::conn()->query($para);
        return $sql->num_rows;
    } 

}
?>