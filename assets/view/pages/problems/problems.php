<?php config::include('layout.menu'); ?>

  <section class="main">

      <div class="content">
        
        <?php config::include('layout.menu-home'); ?>


        <div class="page_title container-xs" style="margin-top:8px;">
          <h1 class="text-light"><i class="fa-solid fa-circle-info"></i> Discussion and portfolio-building platform</h1>
        </div>

        <div class="page_title container-xs" style="margin-top:8px;">
          <h5><i class="fa-solid fa-clipboard-check"></i> Select Problem's Category</h5>
        </div>

       
        <div class="gird_box container-xs">

          <?php 

            $p_categories = APP_CUSTOM_PROBLEMS::category('all');

            foreach($p_categories as $data){
              echo '<div go_href="'.$data['href'].'">
                        <h5>
                          <img src="'.$data['img'].'" />
                          <br/>
                          '.$data['title'].'
                          <br/>
                          <small class="text-light">
                          '.$data['des'].'
                          </small>
                        </h5>
                    </div>';
            }

            
          ?>

        </div>

        <div class="content-box container-xs content-home">
          <h4 class="title align_center">A place to share your problems and discuss them.</h4>
          <div class="center_img">
            <img src="/assets/icons/problem.png" />
          </div>
          <p class="text-light text-normal">No one is ever left without problems in their life. And we believe that each of us might have solved those problems in our lives.</p>
          <p class="text-light text-normal">Please share your solved solutions with us, so that we may also get relief from our problems.</p>
        </div>

      </div>

  </section>

  
  
