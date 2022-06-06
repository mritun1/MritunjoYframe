    

  </div>
</div>

</body>
</html>


<!-- Modal -->
<div class="modal fade" id="uploadmodal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Attach Files</h4>
        </div>
        <div class="modal-body">

        <form action="/action_page.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="file">Upload Files:</label>
                <input type="file" class="form-control" name="file">
            </div>
            <button type="submit" class="btn btn-default">Upload</button>
        </form>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>


<script>
$(document).ready(function(){

    $('.AdminLogout').click(function(event){
        
        var data = new FormData();
        data.append('purpose','access');
        data.append('for','Adminlogout');
        
        $.ajax({
        url: '/api/admin',
        type: 'POST',
        dataType: "JSON",
        data: data,
        processData: false,
        contentType: false,
        success: function (data)
        {
            
            let mgs = JSON.parse(JSON.stringify(data));
            if(mgs.code == 1){
            $(location).prop('href', '/');
            
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

function uploadmodal(e){
  $('#uploadmodal').modal("show");
}



</script>

