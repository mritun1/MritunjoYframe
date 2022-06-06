    
  <?php 
  $id = CONFIG::getRouteRequest(2);
  if($id != ''){
    $getData = APP_CRUD_CRUD::fetchCont('https://rahulsharmaco.in/api/blogs/'.$id);
  }
  ?>

    <div class="well">
        <h3>
            <a href="/admin-blogs" ><span class="glyphicon glyphicon-circle-arrow-left"></span> </a>
            Write your Article <?php echo $id; ?>
        </h3>
    </div>

<form id="createBlog" editid="<?php echo APP_CRUD_CRUD::content($getData,'id'); ?>" action="func/blogs" method="post" enctype="multipart/form-data" >


    <div class="well">
        <div class="form-group">
            <label>Title</label>
            <input type="text" class="form-control" name='title' value="<?php echo APP_CRUD_CRUD::content($getData,'title'); ?>" placeholder="Write Title">
        </div>
    </div>
   
    <div class="well">
      <div class="form-group">
      
        <?php if(APP_CRUD_CRUD::content($getData,'image') != ''){ ?>
            <label>Files</label>
            <p>
                <img src="/assets/icons/file.png" style="height:60px;width:auto;" >
                File is uploaded <button type="button" id="delfile" contid="<?php echo APP_CRUD_CRUD::content($getData,'id'); ?>" class="btn btn-danger">Delete</button>
            </p>
        <?php }else{ ?>
            <label for="image">Upload files (.zip)</label>
            <input type="file" class="form-control" name="image" id="image" >
        <?php } ?>

      </div>
    </div>

  
    <!-- <div class="well">
        <div class="form-group">
            <label for="exampleFormControlSelect1">Example select</label>
            <select class="form-control" id="exampleFormControlSelect1">
            <option>1</option>
            <option>2</option>
            <option>3</option>
            <option>4</option>
            <option>5</option>
            </select>
        </div>
    </div> -->

    <div class="well">
        <div class="form-group">
            <label >Description</label>
            <textarea class="form-control" name="description" placeholder="Write Description" rows="3"><?php echo APP_CRUD_CRUD::content($getData,'description'); ?></textarea>
        </div>
    </div>
            
    <h4>Write your content here</h4>
    <textarea id="summernote" name="editordata"><?php echo APP_CRUD_CRUD::content($getData,'content'); ?></textarea>

    <div class="well text-center">
        <button id="submit" type="submit" class="btn btn-primary btn-success"> <span class="glyphicon glyphicon-plus"></span> Submit & publish Article</button> 
    </div>

</form>

<script>
    $(document).ready(function() {
        $('#summernote').summernote();
    });
</script>
<script>
$(document).ready(function(){

    //DELETE FILE
    $('#delfile').click(function(){

        window.location.href = '/func/blogs/?deleteBlog=JDK78&contid='+$(this).attr("contid");
        
    });


  $('#createBlog').submit(function(event){
    event.preventDefault();

    var data = new FormData(this);
    var textareaValue = $('#summernote').summernote('code');
    data.append('content',textareaValue);

    let purpose = 'Insert';
    if($(this).attr("editid")){
      data.append('id',$(this).attr("editid"));
      purpose = 'Update';
    }

    data.append('purpose',purpose);
    
    $.ajax({
      url: $(this).attr("action"),
      type: $(this).attr("method"),
      dataType: "JSON",
      data: data,
      cache: false,
      processData: false,
      contentType: false,
      success: function (data)
      {
        let mgs = JSON.parse(JSON.stringify(data));
        if(mgs.code == 1){
          $(location).prop('href', '/admin-blogs');
        }else{
          alert(
            'Status: ' + mgs.err
          );
        }
      },
      error: function (err)
      {
        alert(err);
      }
    });
  });


});
</script>