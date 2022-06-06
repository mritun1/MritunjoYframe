<?php config::include('layout.menu'); ?>

<section class="main">

    <div class="content">


        <div class="container-lg cont-grid" >

            <?php 
            $docs_id = CONFIG::getRouteRequest(2);
            $data = "SELECT * FROM docs WHERE id='$docs_id' LIMIT 1";
            $data_num = 0;
            if(APP_CRUD_DB::checkData($data) == true){
                $getAll = json_decode(APP_CRUD_DB::getAll($data),true);
                $data_num = count($getAll);
            }
            
            if($data_num < 0){
                header("Location:/docs");
            }

            //GETTING PAGE CONTENT
            $page_id = CONFIG::getRouteRequest(3);
            $pages_num = 0;
            $data_page = "SELECT * FROM docs_pages WHERE docs_id='$docs_id' AND page_sl='$page_id'";
            if(APP_CRUD_DB::checkData($data_page) == true){
                $docs_page = json_decode(APP_CRUD_DB::getAll($data_page),true);
                $pages_num = count($docs_page);
            }
            
            ?>

            <div>
                <div class="page_box topic_box_head">
                    <h1><i class="fa-solid fa-file"></i> <?php echo html_entity_decode($docs_page[0]['page_title']); ?></h1>
                </div>

                <div class="page_box">
                    <p><i class="fa-solid fa-book"></i> <?php echo $getAll[0]['docs_title']; ?></p>
                </div>

                <div class="page_box docs-view-cont">

                    <div class="docs-pag">
                        <div style="display:none;"></div>
                        <div>
                            <button docs-page-pag="-1" docs-id="<?php echo $docs_id; ?>" page-id="<?php echo $page_id; ?>" ><i class="fa-solid fa-arrow-left"></i> Prev</button>
                        </div>
                        <div>
                            <?php if(APP_AUTH_USERS::user_log_status() == true){ ?>
                                <button go_href="/create-docs-page/<?php echo $docs_id; ?>/<?php echo $page_id; ?>"><i class="fa-solid fa-pen-to-square"></i> Edit</button>
                                <button del-for="docs_page" del-id="<?php echo $docs_page[0]['id']; ?>" ><i class="fa-solid fa-trash"></i> Delete</button>
                            <?php } ?>
                        </div>
                        <div>
                            <button docs-page-pag="1" docs-id="<?php echo $docs_id; ?>" page-id="<?php echo $page_id; ?>">Next <i class="fa-solid fa-arrow-right"></i></button>
                        </div>
                    </div>

                    <div class="docs-content" style="overflow:auto;width:100%;">

                        <?php 
                        if($pages_num>0){
                            echo '<div class="cont-textarea">';
                            echo html_entity_decode($docs_page[0]['page_content']);
                            echo '</div>';
                        }else{
                        ?>

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

                    <div class="docs-pag">
                        <div style="display:none;"></div>
                        <div>
                            <button docs-page-pag="-1" docs-id="<?php echo $docs_id; ?>" page-id="<?php echo $page_id; ?>" ><i class="fa-solid fa-arrow-left"></i> Prev</button>
                        </div>
                        <div>
                            <?php if(APP_AUTH_USERS::user_log_status() == true){ ?>
                                <button go_href="/create-docs-page/<?php echo $docs_id; ?>/<?php echo $page_id; ?>"><i class="fa-solid fa-pen-to-square"></i> Edit</button>
                                <button del-for="docs_page" del-id="<?php echo $docs_page[0]['id']; ?>" ><i class="fa-solid fa-trash"></i> Delete</button>
                            <?php } ?>
                        </div>
                        <div>
                            <button docs-page-pag="1" docs-id="<?php echo $docs_id; ?>" page-id="<?php echo $page_id; ?>">Next <i class="fa-solid fa-arrow-right"></i></button>
                        </div>
                    </div>

                </div>
                
                
            </div>
            <div id="rightbar_cont">
                <div class="right-bar">
                    
                    <?php if(APP_AUTH_USERS::user_log_status() == true){ ?>
                        <center>
                            <button go_href="/my-docs" class="btn_md btn-blue"><i class="fa-solid fa-book"></i> Manage Docs</button>
                        </center>
                    <?php } ?>

                    <div class="docs-thumb">
                        <img src="/assets/icons/book.png" />
                    </div>

                    <h3 class="docs-thumb-name"><?php echo $getAll[0]['docs_title']; ?></h3>
                    <?php if(APP_AUTH_USERS::user_log_status() == true){ ?>
                        <center>
                            <button class="docs-add-page-btn cursor_pointer" go_href="/create-docs-page/<?php echo $docs_id; ?>"><i class="fa-solid fa-plus"></i> Add page</button>
                        </center>
                    <?php } ?>
                    
                    <ul class="vertical-menu">

                            <?php 
                                //GETTING CHAPTER TITLES
                                $pages_num_all = 0;
                                $data_page_all = "SELECT * FROM docs_pages WHERE docs_id='$docs_id' ORDER BY id ASC";
                                if(APP_CRUD_DB::checkData($data_page_all) == true){
                                    $docs_page_all = json_decode(APP_CRUD_DB::getAll($data_page_all),true);
                                    $pages_num_all = count($docs_page_all);
                                }
                                if($pages_num_all>0){
                                    foreach($docs_page_all as $doct){
                                        echo '<li><a href="/view-docs/'.$docs_id.'/'.$doct['page_sl'].'/'.str_replace(" ","-",$doct['page_title']).'"><i class="fa-solid fa-file"></i> '.$doct['page_title'].'</a></li>';
                                    }
                                }
                            ?>

                        
                    
                    
                    </ul>

                </div>
            </div>

        </div>


    </div>

</section>