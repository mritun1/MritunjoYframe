<?php config::include('layout.menu'); ?>

<section class="main">

    <div class="content">


        <div class="container-lg cont-grid" >

            <div>
                <div class="page_box topic_box_head">
                    <h1><i class="fa-solid fa-book"></i> Documents</h1>
                </div>
                <div class="page_box">
                    <div class="search_box flex" style="height:40px;" >
                        <div>
                            <form method="post" action="">
                                <input type="text" name="title" placeholder="Search Problems..." id="search" />
                            </form>
                        </div>
                        <div class="searchBtn" style="flex:3;">
                            <font style="color:#9b894d;font-size:14px;"><i class="fa-solid fa-search"></i></font>
                        </div>
                    </div>
                </div>
                <div class="product-box container-xs">

                    <div><p>This should be always display:none</p></div>

                    <?php 
                    $data = "SELECT * FROM docs ORDER BY id DESC";
                    $data_num = 0;
                    if(APP_CRUD_DB::checkData($data) == true){
                        $getAll = json_decode(APP_CRUD_DB::getAll($data),true);
                        $data_num = count($getAll);
                    }
                    if($data_num > 0){
                        foreach($getAll as $docs){

                            echo '<div go_href="/view-docs/' . $docs['id'] . '/1/' . str_replace(" ","-",$docs['docs_title']) . '">
                                    <a href="/view-docs/' . $docs['id'] . '/1/' . str_replace(" ","-",$docs['docs_title']) . '">
                                        <img src="/assets/icons/book.png" />
                                        <h3>' . $docs['docs_title'] . '</h3>
                                        <p>' . $docs['docs_cat'] . '</p>
                                    </a>
                                </div>';
                        }
                        
                    }
                    ?>
                    
                    
                   

                </div>
            </div>
            <div id="rightbar_cont">
                <div >

                    <?php if(APP_AUTH_USERS::user_log_status() == true){ ?>
                        <center>
                            <button go_href="/my-docs" class="btn_md btn_warning"><i class="fa-solid fa-book"></i> Manage Docs</button>
                        </center>
                    <?php } ?>

                    <!-- <ul class="vertical-menu">
                        <li><a href="/"><i class="fa-solid fa-file"></i> This is the page</a></li>
                    
                    
                    </ul> -->

                </div>
            </div>

        </div>


    </div>

</section>