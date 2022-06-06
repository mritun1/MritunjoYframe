<?php config::include('layout.menu'); ?>

  <section class="main">

    <div class="content">

        <?php 

        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header("Location:/");
        }

        $id = CONFIG::getRouteRequest(2); 
        if(!isset($id) || $id==""){ header("Location:/"); }
        $topics = APP_CUSTOM_PROBLEMS::topics('single_topic',$id);
        
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
       
    
        <div class="page_title container-xs">
            <h3 ><i class="fa-solid fa-circle-question"></i> <?php echo APP_AUTH_SET::postData('title'); ?></h3>
        </div>

        <div class="content-box container-xs">
            
            <h5 class="title text-light">Explain your problems</h5>

            <?php if(APP_AUTH_USERS::user_log_status() == true){ ?>

            <form id="addProblemsForm" action="/func/problems" method="post" enctype="multipart/form-data" >

                <input type="hidden" name="title" value="<?php echo APP_AUTH_SET::postData('title'); ?>" required/>

                <input type="hidden" name="topic" value="<?php echo $id; ?>" required />
                <input type="hidden" name="cat" value="<?php echo $id; ?>" required />

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
                    
                    <div class="editor" id="editor1" contenteditable="true" data-placeholder="Explain your problems here..."></div>
                
                </div>

                <div class="align_right">
                    <button type="submit" class="btn_md btn_success">Submit Problem</button>
                </div>

            </form>

            <?php }else{ ?>
                <div class="please-login">
                    <h3>
                        Please 
                        <button go_href="/login"><i class="fa-solid fa-right-to-bracket"></i> Login</button>
                        to Add Question
                    </h3>
                </div>
            <?php } ?>

        </div>


    </div>

</section>


<script>

$(document).ready(function(){
  $('#addProblemsForm').submit(function(event){
    event.preventDefault();

    let content = document.getElementById("editor1").innerHTML;

    var data = new FormData(this);
    data.append('addProblems','Adding');
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
