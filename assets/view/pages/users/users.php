<?php config::include('layout.menu'); ?>

  <section class="main">

      <div class="content">


        <div class="page_title container-xs" style="margin-top:8px;">
          <h1 class="text-light"><i class="fa-solid fa-circle-info"></i> Users</h1>
        </div>

        
        <div class="content-box container-xs">

            <?php 
                $count = 0;
                $userDataLists = '';
                $data = "SELECT * FROM users ORDER BY id DESC";
                $getAll = json_decode(APP_CRUD_DB::getAll($data),true);
                if($getAll){
                    $count = count($getAll);
                    if($count>0){
                        foreach($getAll as $user){
                            $userDataLists .= '<div class="flex list">
                                                    <div>
                                                        <img go_href="/profile/'.$user['id'].'/' . str_replace(" ","-",$user['fname']) . '" src="/assets/icons/img/gamer.png"  >
                                                    </div>
                                                    <div>
                                                        <a href="/profile/' . $user['id'] . '/' . str_replace(" ","-",$user['fname']) . '"><h4>'.$user['fname'].' '.$user['lname'].'</h4></a>
                                                        <p>User\'s job not given</p>
                                                        
                                                    </div>
                                                </div>';
                        }
                    }
                }
                //$password = $getAll[0]['row_name'];
                echo $userDataLists;
            ?>

            <!-- <div class="flex list">
                <div>
                    <img go_href="/profile/'.$user_id.'" src="/assets/icons/img/gamer.png"  >
                </div>
                <div>
                    <a href="/ques/' . $qid . '/' . str_replace(" ","-",$title) . '"><h4>Mritunjoy Mushahary</h4></a>
                    <p>PHP Developer in 72dragons</p>
                    
                </div>
            </div> -->


        </div>
       
        

      </div>

  </section>

  
  
