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

}
?>