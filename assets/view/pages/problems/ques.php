<?php config::include('layout.menu'); ?>

  <section class="main">

    <div class="content">

        <?php 
        $id = CONFIG::getRouteRequest(2); 

        $data = "SELECT * FROM problems WHERE id='$id' LIMIT 1";
        if(APP_CRUD_DB::checkData($data) != true){
            header("Location:/");
        }

        $getAll = json_decode(APP_CRUD_DB::getAll($data),true);
        $userid = $getAll[0]['userid'];

        //GETTING USERS DATA
        $sql_users = "SELECT * FROM users WHERE id='$userid' LIMIT 1";
        $getAllUsers = json_decode(APP_CRUD_DB::getAll($sql_users),true);
        
        $topics = APP_CUSTOM_PROBLEMS::topics('single_topic',$getAll[0]['topic']);
        
        ?>


        <div class="page_title container-xs" style="margin-bottom:8px;">
            <button go_href="/"><i class="fa-solid fa-house"></i> Home</button>
            <button go_href="<?php echo $topics['url']; ?>" ><i class="fa-solid fa-circle-exclamation"></i> <?php echo $getAll[0]['topic']; ?></button>
        </div>

        <div class="page_box container-xs" >
            
            <div class="ques_box">
                <p>
                    <img src="/assets/icons/img/gamer.png" />
                    <a href="/profile/<?php echo $getAllUsers[0]['id']; ?>"><?php echo $getAllUsers[0]['fname'] . ' '. $getAllUsers[0]['lname']; ?></a>
                </p>
                <div>
                    <h1><?php echo $getAll[0]['title']; ?></h1>
                </div>
                <div class="cont-textarea">
                    <?php echo html_entity_decode($getAll[0]['content']); ?>
                </div>
            </div>
            
        </div>


        <div class="content-box container-xs">
            
            <p class="title text-light font-xs">Answer</p>
            
            <?php 
            //GETTING ALL ANSWERS
            $sql_solutions = "SELECT * FROM solutions WHERE problem_id='$id' ORDER BY id ASC";
            $getAllSolutions = json_decode(APP_CRUD_DB::getAll($sql_solutions),true);
            foreach($getAllSolutions as $sol){

                $avatar_id = $sol['userid'];
                //GETTING USERS DATA
                $sql_avatar = "SELECT * FROM users WHERE id='$avatar_id' LIMIT 1";
                $getAvatar = json_decode(APP_CRUD_DB::getAll($sql_avatar),true);

                echo '<div class="answer_box">
                        <p>
                            <img src="/assets/icons/img/gamer.png" />
                            <a href="/profile/'.$getAvatar[0]['id'].'">' . $getAvatar[0]['fname'] . ' ' . $getAvatar[0]['lname'] . '</a>
                        </p>
                        <div class="cont-textarea">
                            ' . html_entity_decode($sol['content']) . '
                        </div>
                        <div>
                            <p><i class="fa-solid fa-circle-up"></i> 0 <i class="fa-solid fa-circle-down"></i> 0</p>
                        </div>
                    </div>';
            }
            ?>
            
            <p class="title text-light font-xs">Submit Answer</p>

            <?php if(APP_AUTH_USERS::user_log_status() == true){ ?>

            <form id="addSolutionForm" action="/func/problems" method="post" enctype="multipart/form-data" >

                <input type="hidden" name="id" value="<?php echo $id; ?>" required />

                <div id="container" class="textEditor" >
                    <div class="tools">
                        <button type="button" onclick="document.execCommand('italic',false,null);" title="Italicize Highlighted Text"><i class="fa-solid fa-italic"></i></button>
                        <button type="button" onclick="document.execCommand( 'bold',false,null);" title="Bold Highlighted Text"><i class="fa-solid fa-bold"></i></button>
                        <button type="button" onclick="document.execCommand( 'underline',false,null);"><i class="fa-solid fa-underline"></i></button>
                        <button type="button" onclick="createLink()"><i class="fa-solid fa-link"></i></button>
        
                        <button type="button" onclick="document.execCommand( 'unlink',false,null);"><i class="fa-solid fa-link-slash"></i></button>

                        <button type="button" onclick="document.execCommand( 'strikethrough',false,null);"> <i class="fa-solid fa-strikethrough"></i></button>
                        <button type="button" onclick="document.execCommand( 'removeFormat',false,null);"><i class="fa-solid fa-text-slash"></i></button>
                        
                        <button type="button" onclick="document.execCommand( 'justifyLeft',false,null);"><i class="fas fa-align-left"></i> </button>
                        <button type="button" onclick="document.execCommand( 'justifyCenter',false,null);"> <i class='fas fa-align-justify'></i></button>
                        <button type="button" onclick="document.execCommand( 'justifyRight',false,null);"> <i class='fas fa-align-right'></i></button>
                        <button type="button" onclick="document.execCommand( 'redo',false,null);"> <i class='fas fa-redo'></i></button>
                        <button type="button" onclick="document.execCommand( 'undo',false,null);"> <i class='fas fa-undo'></i></button>
                        <button type="button" onclick="document.execCommand('insertOrderedList', false, null);"> <i class='fas fa-list-ol'></i></button>
                        <button type="button" onclick="document.execCommand('insertUnorderedList',false, null)"> <i class='fas fa-list'></i></button>
                        
                        <button type="button" onclick="createCode()"> <i class="fa-solid fa-code"></i></button>
                        <button type="button" onclick="createCodeBase()"><i style="font-size:20px;" class="fa-solid fa-file-code"></i></button>
                        
                        
                        <input type="color" onchange="chooseColor()" id="myColor">

                        <!-- font size start -->
                        <select id="fontSize" onclick="changeSize()">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                        </select>
                        <!-- font size end -->
                        <button type="button" onclick="insertImg()"> Image</button>
                        <button type="button" onclick="insertVideo()"> Video</button>
                        <button type="button" onclick="heading()"> Heading</button>
                    </div>
                    
                    <div class="editor" id="editor1" contenteditable="true" data-placeholder="Add your solution here..."></div>
                
                </div>

                <div class="align_right">
                    <button type="submit" class="btn_md btn_success">Submit Solution</button>
                </div>

            </form>
            
            <?php }else{ ?>

                <div class="please-login">
                    <h3>
                        Please 
                        <button go_href="/login"><i class="fa-solid fa-right-to-bracket"></i> Login</button>
                        to Answer
                    </h3>
                </div>

            <?php } ?>

        </div>

    </div>

</section>

<script>

$(document).ready(function(){
  $('#addSolutionForm').submit(function(event){
    event.preventDefault();

    let content = document.getElementById("editor1").innerHTML;

    var data = new FormData(this);
    data.append('addSolutions','Adding');
    data.append('content',content);
    
    $.ajax({
      url: $(this).attr("action"),
      type: $(this).attr("method"),
      dataType: "JSON",
      data: data,
      processData: false,
      contentType: false,
      success: function (data)
      {
        console.log(data);
        let mgs = JSON.parse(JSON.stringify(data));
        
        if(mgs.code == 1){

          $(location).prop('href', '/ques/' + mgs.id);

        }else{
        //   alert(
        //     'Status: ' + mgs.err
        //   );
        }
      },
      error: function (err)
      {
        //alert(err);
      }
    });
  });


});   
</script>

