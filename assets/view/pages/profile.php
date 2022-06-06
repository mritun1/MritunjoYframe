<?php config::include('layout.menu'); ?>

  <section class="main">

    <div class="content">

        <div class="container-lg cont-grid" >

            <div>

                <?php 
                $id = CONFIG::getRouteRequest(2); 
                if($id == ''){ header("Location:/"); }
                $data = "SELECT * FROM users WHERE id='$id' LIMIT 1";
                $getAll = json_decode(APP_CRUD_DB::getAll($data),true);
                //$password = $getAll[0]['row_name'];
                ?>

                <div class="page_box">
                    <div>
                        <h1><?php echo $getAll[0]['fname'] . ' ' . $getAll[0]['lname']; ?></h1>
                        
                        <p>PIN CODE, TOWN, DIST, ADDRESS</p>
                    </div>
                    
                </div>
            
                <div class="page_title">
                    <button class="active"><i class="fa-solid fa-chart-simple"></i> Newest</button>
                    <button><i class="fa-solid fa-circle-exclamation"></i> Unsolved</button>
                    <button><i class="fa-solid fa-circle-exclamation"></i> Topics</button>
                </div>

                <div class="page_box">
                    <div class="content-box">
                        <h4 class="title">Problems by <?php echo $getAll[0]['fname']; ?></h4>
                        
                        <div class="profile-problems">
                            <?php 
                            $data = "SELECT * FROM problems WHERE userid='$id' ORDER BY id DESC";
                            echo APP_CUSTOM_PROBLEMS::getListOfProblems($data);
                            ?>
                        </div>
                        

                    </div>
                </div>

            </div>
            <div id="rightbar_cont">
                <div class="right-bar">

                    <h2 class="bo-bottom-light right-title"><i class="fa-solid fa-user"></i> Profile</h2>

                    <ul class="vertical-menu vertical-menu-light">
                        <li><a href="#"><i class="fa-solid fa-circle-info"></i> Personal Info</a></li>
                        <li><a href="#"><i class="fa-solid fa-circle-xmark"></i> Problems</a></li>
                        <li><a href="#"><i class="fa-solid fa-book"></i> Docs</a></li>
                    </ul>

                </div>
            </div>

        </div>

    </div>

</section>



