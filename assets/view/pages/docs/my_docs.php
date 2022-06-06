<?php config::include('layout.menu'); ?>
<?php APP_AUTH_USERS::log_redirect_off("/docs"); ?>

<section class="main">

    <div class="content">


        <div class="container-lg cont-grid" >

            <div>
                <div class="page_box topic_box_head">
                    <h1><i class="fa-solid fa-book"></i>Manage Documents</h1>
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
                    $user_id = htmlspecialchars($_COOKIE["user_id"]);
                    $data = "SELECT * FROM docs WHERE user_id='$user_id' ORDER BY id DESC";
                    
                    $data_num = 0;
                    if(APP_CRUD_DB::checkData($data) == true){
                        $getAll = json_decode(APP_CRUD_DB::getAll($data),true);
                        $data_num = count($getAll);
                    }
                    if($data_num > 0){
                        foreach($getAll as $docs){

                            echo '<div>
                                    <a href="#">
                                        <img src="/assets/icons/book.png" />
                                        <h3>' . $docs['docs_title'] . '</h3>
                                        <p>
                                            <a href="/view-docs/' . $docs['id'] . '/1/' . str_replace(" ","-",$docs['docs_title']) . '" class="btn_xs btn_danger"><i class="fa-solid fa-eye"></i> View</a>
                                            <a href="javascript:void(0)" modal-show="addDocs" docs-edit="' . $docs['id'] . '" class="btn_xs btn_danger"><i class="fa-solid fa-pen-to-square"></i> Edit</a>
                                            <a del-for="docs" del-id="' . $docs['id'] . '" href="javascript:void(0)" class="btn_xs btn_danger"><i class="fa-solid fa-trash"></i> Delete</a>
                                        </p>
                                    </a>
                                </div>';
                        }
                        
                    }
                    ?>
                    

                </div>

                <?php if($data_num <= 0){ ?>
                     <div class="content-box">
                        <div class="no_content_found">
                            <div>
                                <i class="fa-solid fa-triangle-exclamation"></i>
                                <h2 class="text-warning">Sorry, content found</h2>
                                <p>Please Add one</p>
                                
                            </div>
                        </div>
                    </div>
                <?php } ?>

            </div>
            <div id="rightbar_cont">
                <div >

                    <center>
                        <button modal-show="addDocs" class="btn_md btn_success"><i class="fa-solid fa-plus"></i> Add Docs</button>
                    </center>

                    <!-- <ul class="vertical-menu">
                        <li><a href="/"><i class="fa-solid fa-file"></i> This is the page</a></li>
                    
                    
                    </ul> -->

                </div>
            </div>

        </div>


    </div>

</section>