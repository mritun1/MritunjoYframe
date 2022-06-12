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
if(isset($_POST['insertToOrder'])){
    APP_INTI_ADDCART::cartListsSql("medical",function($id,$qty){
        $data = "SELECT * FROM medicine WHERE id='$id' LIMIT 1";
        $getAll = json_decode(APP_CRUD_DB::getAll($data),true);
        //INSERT INTO ORDER
        $arr = array(
            "img" => $getAll[0]['img'],
            "product_name" => $getAll[0]['name'],
            "qty" =>  $qty,
            "price" => number_format($getAll[0]['price'] * $qty,2),
            "status" =>  '0',
            "day" =>  time()
        );
        
        APP_CRUD_CRUD::InsertUpdateData($arr,'orders',APP_CRUD_DB::conn(),"");

    });
}
?>