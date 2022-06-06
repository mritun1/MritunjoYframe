

</body>
</html>

<script src="/assets/js/style.js?v=1"></script>


<script src="/assets/js/library.js?v=6.6"></script>

<div id="addDocs" class="modal" >
    <div class="modal-section">
        <div class="modal-xs add-docs-modal">

            <form id="createDocs" action="/func/docs" method="post" enctype="multipart/form-data" >

                <div class="modal-head">
                    <button type="button" class="edit-modal-close"><i class="fa-solid fa-xmark"></i></button>
                    <p><i class="fa-solid fa-plus"></i> Create Document</p>
                </div>
                <div class="modal-content">

                    <span id="status"></span>

                    <div class="input_box">
                        <label>Document Title</label>
                        <input type="text" name="title" placeholder="Title" />
                    </div>

                    <div class="input_box">
                        <label>Document Description</label>
                        <textarea name="description" rows="5" placeholder="Description"></textarea>
                    </div>

                    <div class="input_box">
                        <label>Category (Codes,softwares,hardware,etc.)</label>
                        <input type="text" name="cat" placeholder="Category" />
                    </div>

                </div>
                <div class="modal-foot">
                    <button editId="" id="editId" class="btn_md btn_success">Save Details <i class="fa-solid fa-arrow-right"></i></button>
                </div>

            </form>

        </div>
    </div>
</div>

<div id="deleteModal" class="modal">
    <div class="modal-section">
        <div class="modal-xs add-docs-modal">

            <div class="modal-head">
                <button type="button" class="modal-close"><i class="fa-solid fa-xmark"></i></button>
                <p class="text-danger"><i class="fa-solid fa-trash"></i> Are you sure to delete?</p>
            </div>
            <div class="modal-content align_center">

                <span id="deleteStatus"></span>

                <button class="btn_md btn_success modal-close">Cancel</button>
                <button delete-confirm="" del-id="" class="btn_md btn_danger">Confirm</button>

            </div>
            <div class="modal-foot">
                
            </div>

        </div>
    </div>
</div>


<script>
    $(document).ready(function(){
        //
        $('#createDocs').submit(function(event){
            event.preventDefault();

            var data = new FormData(this);
            data.append('createDocs','Adding');
            data.append('editId',$("#editId").attr("editId"));

            $.ajax({
            url: $(this).attr("action"),
            type: $(this).attr("method"),
            dataType: "JSON",
            data: data,
            processData: false,
            contentType: false,
            success: function (data)
            {
                let mgs = JSON.parse(JSON.stringify(data));
                console.log(data);
                if(mgs.code == 1){
                    window.location.href = window.location.href;
                }else{
                    $("#status").html(`<div class="alert alert-danger">
                                         <div>
                                         <a href="javascript:void(0)" class="close-alert"><i class="fa-solid fa-xmark"></i></a>
                                         <p>`+mgs.status+`</p>
                                         </div>
                                     </div>`);
                }
            },
            error: function (err)
            {
                alert(err);
            }
            });
        });


        $('#addDocsPage').submit(function(event){
            event.preventDefault();

            let content = document.getElementById("editor1").innerHTML;

            var data = new FormData(this);
            data.append('addDocsPage','Adding');
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
                let mgs = JSON.parse(JSON.stringify(data));
                console.log(data);
                if(mgs.code == 1){
                    window.location.href = "/view-docs/"+$('input[name=docs_id]').val()+"/"+mgs.id;
                }else{
                    $("#status").html(`<div class="alert alert-danger" style="width:100%;">
                                         <div style="width:100%;">
                                         <a href="javascript:void(0)" class="close-alert"><i class="fa-solid fa-xmark"></i></a>
                                         <p>`+mgs.status+`</p>
                                         </div>
                                     </div>`);
                }
            },
            error: function (err)
            {
                alert(err);
            }
            });
        });



        $("button[docs-page-pag]").click(function(){
            page = parseInt($(this).attr("page-id")) + parseInt($(this).attr("docs-page-pag"));
            window.location.href = "/view-docs/"+$(this).attr("docs-id")+"/"+page+"/view-docs";
        });

        $('a[docs-edit]').click(function(event){
            var data = new FormData();
            //ADD ADDITIONAL FORM HERE
            data.append('editDocs','edit');
            data.append('id',$(this).attr('docs-edit'));

            ajaxFunc('post','/func/docs',data,function(mgs){
                //console.log(mgs);
                if(mgs.code == 1){
                    let arr = JSON.parse(JSON.stringify(mgs.data));
                    for(let i =0; i < arr.length; i++){
                        $(arr[i][0]).val(arr[i][1]);
                    }
                    $("#editId").attr("editId",mgs.editId);
                }
            });

        });

        
        


    });



function ajaxFunc(method, action, data, func) {
    $.ajax({
      url: action,
      type: method,
      dataType: "JSON",
      data: data,
      processData: false,
      contentType: false,
      success: function (data) {
        let mgs = JSON.parse(JSON.stringify(data));
        return func(mgs);
      },
      error: function (err) {
        alert(err);
      },
    });
  }
  //..............................................................
  //      SENT AJAX REQUEST - ONCLICK
  //..............................................................
  // $("a[docs-edit]").click(function (event) {
  //   var data = new FormData();
  //   //ADD ADDITIONAL FORM HERE
  //   data.append("editDocs", "edit");
  //   ajaxFunc("post", "/func/docs", data, function (mgs) {
  //     //ADD HERE GETTING RESPONSE
  //     if (mgs.code == 1) {
  //       //CODES HERE
  //     }
  //   });
  // });

</script>