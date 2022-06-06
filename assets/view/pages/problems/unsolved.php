<?php config::include('layout.menu'); ?>

  <section class="main">

      <div class="content">
        
      <?php config::include('layout.menu-home'); ?>

        <div class="content-box container-xs">
          <h4 class="title">Lists of Unsolved Problems</h4>

          <div class="search_box flex" style="width:100%;" >
              <div>
                  <form id="searchForm" method="post" action="#">
                      <input type="text" name="title" placeholder="Search Problems..." id="search" />
                  </form>
              </div>
              <div class="searchBtn" style="flex:2;">
                  <font style="color:#9b894d;font-size:14px;"><i class="fa-solid fa-magnifying-glass fa-flip-horizontal"></i> Search</font>
              </div>
          </div>

          <?php 
          $data = "SELECT * FROM problems ORDER BY id DESC";
          echo APP_CUSTOM_PROBLEMS::getListOfProblems($data,'unsolved');
          ?>


        </div>

      </div>

  </section>