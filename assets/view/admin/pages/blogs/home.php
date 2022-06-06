
    <div class="well">
        <h3>Your Blogs <a href="/admin-blogs-create" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Create Blog</a></h3>
    </div>

    <?php $totalBlogs = APP_CRUD_CRUD::fetchURL('https://rahulsharmaco.in/api/blogs/total'); ?>

    <p>Total Blogs: <span class="badge"><?php echo $totalBlogs; ?></span></p><br>

      <?php if($totalBlogs>0){ ?>
      
      <div class="row">

        <?php 
        APP_CRUD_CRUD::fetchAllLists('https://rahulsharmaco.in/api/blogs',function($response){
          return '
                  <div class="col-sm-10" style="border-bottom:1px solid lightgray;">
                    <h4>' . html_entity_decode($response['title']) . '</h4>
                    <p>' . html_entity_decode($response['description']) . '</p>
                    <div style="overflow:auto;">
                      
                      <div class="btn-group" style="float:right;padding:10px;">
                          <a target="_blank" href="/single/' . html_entity_decode($response['id']) . '/' . str_replace(" ","-",html_entity_decode($response['title'])) . '" class="btn btn-info btn-sm">View</a>
                          <a href="/admin-blogs-create/' . html_entity_decode($response['id']) . '" class="btn btn-warning btn-sm">Edit</a>
                          <button delid="' . html_entity_decode($response['id']) . '" type="button" class="btn btn-danger btn-sm deleteCont">Delete</button>
                      </div>
                    </div>
                  </div>';
            //return '<div style="border:1px solid red;background-color:lavender;">' . html_entity_decode($response['content']) . '</div>';
        });
        ?>

        <!-- <div class="col-sm-2 text-center">
          <img src="https://w7.pngwing.com/pngs/340/946/png-transparent-avatar-user-computer-icons-software-developer-avatar-child-face-heroes-thumbnail.png" class="img-circle" height="65" width="65" alt="Avatar">
        </div>
        <div class="col-sm-10">
          <h4>Title of the text</h4>
          <p>Keep up the GREAT work! I am cheering for you!! Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
          <div style="overflow:auto;">
            <div class="btn-group" style="float:right;">
                <button type="button" class="btn btn-info btn-sm">View</button>
                <a href="/admin-blogs-create" class="btn btn-warning btn-sm">Edit</a>
                <button type="button" class="btn btn-danger btn-sm">Delete</button>
            </div>
          </div>
        </div>

        <div class="col-sm-2 text-center">
          <img src="https://w7.pngwing.com/pngs/340/946/png-transparent-avatar-user-computer-icons-software-developer-avatar-child-face-heroes-thumbnail.png" class="img-circle" height="65" width="65" alt="Avatar">
        </div>
        <div class="col-sm-10">
          <h4>Title of the text</h4>
          <p>Keep up the GREAT work! I am cheering for you!! Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
          <div style="overflow:auto;">
            <div class="btn-group" style="float:right;">
                <button type="button" class="btn btn-info btn-sm">View</button>
                <button type="button" class="btn btn-warning btn-sm">Edit</button>
                <button type="button" class="btn btn-danger btn-sm">Delete</button>
            </div>
          </div>
        </div> -->
      </div>

      <?php }else{ ?>
        <div class="text-center">
          <h1 class="text-danger">Sorry! No content found.</h1>
          <p>Please create one.</p>
        </div>
      <?php } ?>

<script>
$(document).ready(function(){
  $(".deleteCont").click(function(){
    //alert($(this).attr("delid"));
    $.post("https://rahulsharmaco.in/api/blogs",
    {
      purpose: "Delete",
      id: $(this).attr("delid")
    },
    function(data,status){
      //alert("Data: " + data + "\nStatus: " + status);
      if(status == 'success'){
        window.location.replace(window.location.href);
      }
    });
  });
});
</script>

    