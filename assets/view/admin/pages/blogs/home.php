
    <div class="well">
        <h3>Your Blogs <a href="/admin-blogs-create" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Create Blog</a></h3>
    </div>

    <?php 
    $data = "SELECT * FROM blogs ORDER BY id DESC";
    $getAll = json_decode(APP_CRUD_DB::getAll($data),true);
    $totalBlogs = 0;
    if($getAll){
      $totalBlogs = count($getAll);
    }
    ?>

    <p>Total Blogs: <span class="badge"><?php echo $totalBlogs; ?></span></p><br>

      <?php if($totalBlogs>0){ ?>
      
      <div class="row">

        <?php 
          
          if($getAll){
            foreach($getAll as $key){
              echo '
                  <div class="col-sm-10" style="border-bottom:1px solid lightgray;">
                    <h4>' . html_entity_decode($key['title']) . '</h4>
                    <p>' . html_entity_decode($key['description']) . '</p>
                    <div style="overflow:auto;">
                      
                      <div class="btn-group" style="float:right;padding:10px;">
                          <a target="_blank" href="/blogs-view/' . html_entity_decode($key['id']) . '/' . str_replace(" ","-",html_entity_decode($key['title'])) . '" class="btn btn-info btn-sm">View</a>
                          <a href="/admin-blogs-create/' . html_entity_decode($key['id']) . '" class="btn btn-warning btn-sm">Edit</a>
                          <button del-for="blogs" del-id="' . html_entity_decode($key['id']) . '" class="btn btn-danger btn-sm deleteCont">Delete</button>
                      </div>
                    </div>
                  </div>';
            }
          }
        ?>

        
      </div>

      <?php }else{ ?>
        <div class="text-center">
          <h1 class="text-danger">Sorry! No content found.</h1>
          <p>Please create one.</p>
        </div>
      <?php } ?>



    