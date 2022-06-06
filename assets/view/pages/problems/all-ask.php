<?php config::include('layout.menu'); ?>

  <section class="main">

    <div class="content">

        <?php 
        $id = CONFIG::getRouteRequest(3); 
        if(!isset($id) || $id==""){ header("Location:/"); }
        $topics = APP_CUSTOM_PROBLEMS::topics('single_topic',$id);
        //print_r($topics);
        ?>

        <div class="page_box problems-title container-xs" >
            <div>
                <h3>
                    <img src="<?php echo $topics['img']; ?>" alt="problems" />
                    <?php echo $topics['title']; ?>
                </h3>
                <p class="font-xs">(<?php echo $topics['des']; ?>)</p>
            </div>
        </div>
        
        <div class="page_box container-xs" >
            
            <div class="search-ask-box">
                <button go_href="/search-ask/ask-all/<?php echo $id; ?>"><i class="fa-solid fa-magnifying-glass"></i> <b>Search & Ask</b> <i class="fa-solid fa-plus"></i></button>
            </div>
            
            
        </div>

        <div class="page_title container-xs">
            <button go_href="#" class="btn-new"><i class="fa-solid fa-chart-simple"></i> Newest</button>
            <button go_href="#" class="btn-unsolved"><i class="fa-solid fa-circle-exclamation"></i> Unsolved</button>
            <button go_href="/list-problem/<?php echo CONFIG::getRouteRequest(2); ?>" class="btn-home"><i class="fa-solid fa-circle-exclamation"></i> <?php echo CONFIG::getRouteRequest(2); ?></button>
        </div>
    
        <div class="page_title container-xs">
            <p class="text-light font-xs"><i class="fa-solid fa-circle-info"></i> Discuss about <?php echo $topics['title']; ?></p>
        </div>

        <div class="content-box container-xs">

            <?php 
            $data_num = 0;
            $data = "SELECT * FROM problems WHERE topic='$id' ORDER BY id DESC";
            if(APP_CRUD_DB::checkData($data) == true){
                $getAll = json_decode(APP_CRUD_DB::getAll($data),true);
                $data_num = count($getAll);
            }
            ?>
            
            <p class="title text-light font-xs">Result: <?php echo $data_num; ?></p>

            <?php 

            echo APP_CUSTOM_PROBLEMS::getListOfProblems($data);

            // if($data_num > 0){
            //     foreach($getAll as $que){

            //         echo '<div class="flex list">
            //                 <div>
            //                     <img src="/assets/icons/img/gamer.png"  >
            //                 </div>
            //                 <div>
            //                     <a href="/ques/' . $que['id'] . '/' . str_replace(" ","-",$que['title']) . '"><h4>' . $que['title'] . '</h4></a>
            //                     <p>7 answers <button>#' . $id . '</button></p>
                                
            //                 </div>
            //             </div>';
            //     }
            // }else{
            ?>

                <!-- <div class="no_content_found">
                    <div>
                        <i class="fa-solid fa-triangle-exclamation"></i>
                        <h2 class="text-warning">Sorry, no problem found</h2>
                        <p>Please Add one</p>
                        
                    </div>
                </div> -->
            
            <?php //} ?>

        </div>

    </div>

</section>



