<?php config::include('layout.menu'); ?>

  <section class="main">

      <div class="content">

      <?php 
      $id = CONFIG::getRouteRequest(2); 
      if(!isset($id) || $id==""){ header("Location:/"); }
      $category = APP_CUSTOM_PROBLEMS::category('single',$id);
      //echo $category['img'];
      ?>
        
        <div class="page_title container-xs topic_box_head" style="margin-top:8px;">

          <div class="flex topic_box">
              <div>
                  <img src="<?php echo $category['img']; ?>" />
              </div>
              <div>
                  <div>
                    <h1><?php echo $category['title']; ?></h1>
                    <p class="font-xs text-light"><?php echo $category['des']; ?></p>
                  </div>
              </div>
          </div>

        </div>

        

        <div class="content-box container-xs">
          <h4 class="title">Lists of Topics</h4>

          <?php 
            $topics = APP_CUSTOM_PROBLEMS::topics('single',$id);
            //print_r($topics);

            foreach($topics as $key){
                
                echo '<div class="flex topic_list_box">
                        <div>
                          <div>
                            <img src="'.$key['img'].'"  >
                          </div>
                        </div>
                        <div>
                          <div>
                            <a href="'.$key['url'].'"><h4>'.$key['title'].'</h4></a>
                            <p>'.$key['des'].'</p>
                            <p><b>Enter the place of discussion</b></p>
                          </div>
                        </div>
                        <div>
                            <div>
                                <!-- <button>345345</button> -->
                                <button go_href="'.$key['url'].'">View</button>
                            </div>
                        </div>
                      </div>';
            }
          ?>

          

          

        </div>

      </div>

  </section>

  
  
