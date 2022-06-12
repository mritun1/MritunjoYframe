<?php 
class APP_INTI_ADDCART{

    public static function AddToCartCheck($cookieName,$cookieId){
        $return = false;
        if(isset($_COOKIE[$cookieName])){ 
            $pattern = "/".$cookieId."/i";
            if(preg_match($pattern, $_COOKIE[$cookieName]) == 1){
                $return = true;
            }
        }
        return $return;
    }

    public static function AddToCartCount($cookiename){
        $cart = $_COOKIE[$cookiename];
        if($cart){ 
            $cartExp = explode(",",$cart);
            $return = count($cartExp);
        }else{
            $return = 0;
        }
        return $return;
    }

    public static function cartLists($cookieName,$func){
        $data = $_COOKIE[$cookieName];
        $return = array();
        if($data){
            $dataExp = explode(",",$data);
            $return['code'] = 1;
            $return['status'] = "Data Exists";
            $arrData = array();
            $total_price = 0;
            foreach($dataExp as $val){
                if($val != ""){
                    $valExp = explode("-",$val);
                    $id = $valExp[0];
                    $qty = $valExp[1];
                    array_push($arrData, array(
                        "img" => $func($id,$qty,'img'),
                        "name" => $func($id,$qty,'name'),
                        "price" => $func($id,$qty,'price'),
                        "qty" => $qty,
                        "id" => $id
                    ));
                    $total_price = $total_price + $func($id,$qty,'price');
                }
            }
            $return['data'] = $arrData;
            $return['total_price'] = $total_price;
        }else{
            $return['code'] = 0;
            $return['status'] = "Not found";
        }
        echo json_encode($return);
    }

    public static function cartListsSql($cookieName,$func){
        $data = $_COOKIE[$cookieName];
        if($data){
            $dataExp = explode(",",$data);
            foreach($dataExp as $val){
                if($val != ""){
                    $valExp = explode("-",$val);
                    $id = $valExp[0];
                    $qty = $valExp[1];

                    $func($id,$qty);
                }
            }
        }
        $return['code'] = 1;
        unset($_COOKIE[$cookieName]);
        setcookie($cookieName, '', time() - 3600, '/');
        echo json_encode($return);
    }

}
?>