<?php config::include('layout.menu'); ?>
<?php APP_AUTH_USERS::log_redirect_off("/docs"); ?>

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
                    <h1><i class="fa-solid fa-add"></i>Add Page</h1>
                </div>
                <div class="page_box add_docs_page">

                    <div class="add_docs_title">
                        <h3><i go_href="/view-docs/<?php echo $docs_id; ?>/<?php echo $docs_page[0]['page_sl']; ?>" class="fa-solid fa-circle-arrow-left"></i> <?php echo $getAll[0]['docs_title']; ?></h3>
                        <p>Write your content here</p>
                    </div>

                    <span id="status"></span>

                    <form id="addDocsPage" action="/func/docs" method="post" enctype="multipart/form-data" >

                        <input type="hidden" name="docs_id" value="<?php echo $docs_id; ?>">
                        <input type="hidden" name="page_id" value="<?php echo $docs_page[0]['id']; ?>">
                        <input type="hidden" name="page_go" value="<?php echo $docs_page[0]['page_sl']; ?>">

                        <div class="input_box">
                             <label>Chapter Title</label>
                             <input type="text" name="title" value="<?php echo $docs_page[0]['page_title']; ?>" placeholder="Chapter Title" />
                         </div>


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

                            <div class="editor" id="editor1" contenteditable="true" data-placeholder="Explain your problems here..."><?php echo html_entity_decode($docs_page[0]['page_content']); ?></div>

                        </div>

                        <div class="add_docs_submit">
                            <button class="btn_md btn_success"><i class="fa-solid fa-paper-plane"></i> Submit</button>
                        </div>

                    </form>


                </div>
                
            </div>
            <div id="rightbar_cont">
                <div >

                    <h3 go_href="/view-docs/<?php echo $docs_id; ?>/<?php echo $docs_page[0]['page_sl']; ?>" class="cursor_pointer"><i  class="fa-solid fa-circle-arrow-left"></i> Go back</h3>

                    <!-- <ul class="vertical-menu">
                        <li><a href="/"><i class="fa-solid fa-file"></i> This is the page</a></li>
                    
                    
                    </ul> -->

                </div>
            </div>

        </div>


    </div>

</section>

<script>
// //..............................................................
// //      TEXT-EDITOR  START
// //..............................................................
// var document = document.getElementsByClassName("editor")[0];

// function chooseColor() {
//   var mycolor = document.getElementById("myColor").value;
//   document.execCommand("foreColor", false, mycolor);
// }

// function changeSize() {
//   var mysize = document.getElementById("fontSize").value;
//   document.execCommand("fontSize", false, mysize);
// }

// function createLink() 
// { 
// 	var szURL = prompt("Enter a URL:", "http://");
// 	if ((szURL != null) && (szURL != "")) {
// 		document.execCommand("createLink",false,szURL);
// 	}
// }

// function insertImg() 
// { 
// 	var szURL = prompt("Enter a URL:", "http://");
// 	if ((szURL != null) && (szURL != "")) {
//         var data = "<img src='"+szURL+"' style='width:80%;' />";
// 		document.execCommand("insertHTML", false, data);
// 	}
// }
// function createCode(){
//     if (window.getSelection){ // all modern browsers and IE9+
//         let selectedText = window.getSelection().toString();
//         var data = "<code style='background-color:lightgray;padding:3px 5px;border-radius:6px;color:orangered;'>"+htmlEntities(selectedText)+"<code/>";
// 	 	document.execCommand("insertHTML", false, data);
//     }
// }
// function createCodeBase(){
//     if (window.getSelection){ // all modern browsers and IE9+
//         let selectedText = window.getSelection().toString();
//         selectedText = htmlEntities(selectedText);
//         var data = "<div><pre style='background-color:black;padding:3px 5px;color:orangered;'>"+selectedText+"<pre/></div>";
// 	 	document.execCommand("insertHTML", false, data);
//     }
// }
// function insertVideo(){
//     var urlString = prompt("Youtube URL:", "http://");

//     let paramString = urlString.split('?')[1];
//     let queryString = new URLSearchParams(paramString);
//     let value;
//     for(let pair of queryString.entries()) {
//         value = pair[1];
//     }

//     //alert(value);
// 	if ((value != null) && (value != "")) {
//         var data = '<iframe width="80%" height="200px" src="https://www.youtube.com/embed/' + value +'" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
// 		document.execCommand("insertHTML", false, data);
// 	}
// }
// function heading(){
//     if (window.getSelection){ // all modern browsers and IE9+
//         let selectedText = window.getSelection().toString();
//         var data = "<div style='border-left:4px solid lightgray;padding:3px 8px;background-color:lavender;border-radius:6px;margin:8px 3px;'>"+selectedText+"</div>";
// 	 	document.execCommand("insertHTML", false, data);
//     }
// }

// function htmlEntities(str) {
//     return String(str).replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;').replace(/"/g, '&quot;');
// }
</script>