<?php config::include('layout.menu'); ?>

  <section class="main">

    <div class="content">

        <?php 
        $id = CONFIG::getRouteRequest(3); 
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

        <div class="page_box container-xs" >
            
            <div class="search_box flex" style="width:100%;" >
                <div>
                    <form id="searchForm" method="post" action="/asking/<?php echo $id; ?>">
                        <input type="text" name="title" placeholder="Search Problems..." id="search" />
                    </form>
                </div>
                <div class="searchBtn" style="flex:2;">
                    <font style="color:#9b894d;font-size:14px;"><i class="fa-solid fa-plus"></i> Add</font>
                </div>
            </div>
            
            
        </div>
    
        <div class="page_title container-xs">
            <p class="text-light font-xs"><i class="fa-solid fa-circle-info"></i> Search Results and Add problems</p>
        </div>

        <div class="content-box container-xs">
            
            <p class="title text-light font-xs">Result: 0</p>

            <!-- <div class="flex list">
                <div>
                    <img src="https://www.diethelmtravel.com/wp-content/uploads/2016/04/bill-gates-wealthiest-person.jpg"  >
                </div>
                <div>
                    <a href=""><h4>Where to write the questions? I am getting confusion here.</h4></a>
                    <p>7 answers <button>#JavaScript</button></p>
                    
                </div>
            </div> -->

            <div class="no_content_found">
                <div>
                    <i class="fa-solid fa-triangle-exclamation"></i>
                    <h2 class="text-warning">Sorry, no problem found</h2>
                    <p>Please Add one</p>
                    <button class="btn_md btn_success searchBtn"><i class="fa-solid fa-plus" style="font-size:16px;color:white;"></i> Add Problem</button>
                </div>
            </div>
            

        </div>

    </div>

</section>

<script>
$(document).ready(function(){

    $(".searchBtn").click(function(){
        if($("#search").val() != ""){
            $("#searchForm").submit();
        }
    });

  $('#search').on("keyup",function(event){
    var data = new FormData();
    data.append('query',$(this).val());
    data.append('search_problems',"Searching");
    
    $.ajax({
      url: "/func/problems",
      type: "post",
      dataType: "JSON",
      data: data,
      processData: false,
      contentType: false,
      success: function (data)
      {
        let mgs = JSON.parse(JSON.stringify(data));
        console.log(mgs);
        // if(mgs.code == 1){


        //   //$(location).prop('href', '/admin-dash');

        // }else{
        //   alert(
        //     'Status: ' + mgs.err
        //   );
        // }
      },
      error: function (err)
      {
        //alert(err);
      }
    });
  });


});
</script>

