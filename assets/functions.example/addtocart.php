<?php 
if(isset($_POST['getAddToCart'])){
    APP_INTI_ADDCART::cartLists("medical",function($id,$qty,$query){
        //WHEN ADD TO CART EXISTS
        $data = "SELECT * FROM medicine WHERE id='$id' LIMIT 1";
        $getAll = json_decode(APP_CRUD_DB::getAll($data),true);
        $return = "";
        if($query == 'img'){
            //EDIT HERE
            $return = $getAll[0]['img'];
        }
        if($query == 'name'){
            //EDIT HERE
            $return = $getAll[0]['name'];
        }
        if($query == 'price'){
            //EDIT HERE
            $return = number_format($getAll[0]['price'] * $qty, 2);
        }
        return $return;
    });
}
?>