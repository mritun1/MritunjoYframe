<?php 
class PAGECONTROLLER{

    public static function home(){
        $page_arr = array(
            'title' => 'Welcome - MritunjoyFrame.',
            'description' => 'Homepage - MritunjoyFrame.'
        );
        CONFIG::route_set('','welcome','',$page_arr);
    }
    //----------------------------------------------------------------------
    //          PAGES ROUTER - START
    //----------------------------------------------------------------------
    
        // ADD YOUR CODE HERE


    //----------------------------------------------------------------------
    //          PAGES ROUTER - END
    //----------------------------------------------------------------------

    //----------------------------------------------------------------------
    //          ADMIN PANEL ROUTER - START
    //----------------------------------------------------------------------

    //........ FOR ADMIN - LOGIN ..................................

    public static function adminlog(){
        $page_arr = array(
            'title' => 'Login',
            'description' => 'Admin - Login'
        );
        CONFIG::route_set('','admin.login','',$page_arr);
    }

    public static function admindash(){
        $page_arr = array(
            'title' => 'Admin',
            'description' => 'Admin - Dash'
        );
        CONFIG::route_set('admin.layout.header','admin.pages.dashboard','admin.layout.footer',$page_arr);
    }

    //............ FOR ADMIN - BLOGS ...................

    public static function adminblogs(){
        $page_arr = array(
            'title' => 'Admin',
            'description' => 'Admin - Dash'
        );
        CONFIG::route_set('admin.layout.header','admin.pages.blogs.home','admin.layout.footer',$page_arr);
    }

    public static function adminblogscreate(){
        $page_arr = array(
            'title' => 'Admin',
            'description' => 'Admin - Dash'
        );
        CONFIG::route_set('admin.layout.header','admin.pages.blogs.create','admin.layout.footer',$page_arr);
    }

    //........ FOR FUNCTIONS/ ..................................

    public static function func(){
        if(CONFIG::getRouteRequest(1) == "func"){
            global $page_exists;
            if(CONFIG::getRouteRequest(2) != ""){
                
                //LISTS YOUR FUNCTIONS/ .PHP HERE - START
                // if(CONFIG::getRouteRequest(2) == 'example'){

                //     CONFIG::include_func('example',function(){ self::page404(); });

                // }
                // else{
                //     self::page404();
                // }
                //LISTS YOUR FUNCTIONS/ .PHP HERE - END
                
            }else{
                self::page404();
            }
            $page_exists = 1;
        }else{
            self::page404();
        }
    }

    //........ FOR 404 error Page ..................................
    public static function page404(){
        $page_arr = array(
            'title' => 'Page Not found',
            'description' => 'The description of the Page'
        );
        CONFIG::route_set('layout.header','404.404','layout.footer',$page_arr);
    }

}
?>