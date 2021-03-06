# MritunjoyFrame

1. To check Login status

```bash
<?php
if(APP_AUTH_ADMIN::authCheck() == true){ echo "LOGGED IN";}else{ echo "LOGGED OUT"; }
?>
```

2. To redirect when logged in

```bash
<?php APP_AUTH_ADMIN::authRedirect(true, 'single'); ?>
```

3. Form submit serialize example

```bash
<form id="formtest" action="/api/admin" method="post" enctype="multipart/form-data" class="form-signin" >
```

```bash
$('#formtest').submit(function(event){
    var data = new FormData(this);
    //ADD ADDITIONAL FORM HERE
    data.append('addDocsPage','Adding');
    submitForm(this,data,event,function(mgs){
        if(mgs.code == 1){
            //ADD YOUR PROGRAM HERE ON SUCCESS
            console.log(mgs);
        }
    });
});
```

4. Fetch all lists from api

```bash
APP_CRUD_CRUD::fetchAllLists('https://example.in/api/blogs',function($response){
    return '<div style="border:1px solid red;background-color:lavender;">' . html_entity_decode($response['content']) . '</div>';
});
```

5. Fetch only URL

```bash
echo APP_CRUD_CRUD::fetchURL('https://example.in/api/blogs/total');
```

6. GET THE PAGE PARAMETERS

```bash
<?php echo CONFIG::getRouteRequest(2); ?>
```

7. Fetch single content by Id

```bash
<?php
  $id = CONFIG::getRouteRequest(2);
  $getData = APP_CRUD_CRUD::fetchCont('https://example.in/api/blogs/'.$id);

  echo APP_CRUD_CRUD::content($getData,'content');
?>
```

8. Delete button

```bash
<button delid="23" type="button" class="btn btn-danger btn-sm deleteCont">Delete</button>
```

```bash
<script>
$(document).ready(function(){
  $(".deleteCont").click(function(){
    //alert($(this).attr("delid"));
    $.post("https://example.in/api/blogs",
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
```

After this do something on API

9. Creating Router
   <br/>
   First add this on the index.php

```bash
CONFIG::route('profile','pagecontroller@single');
```

Then go to app/controllers/pagecontrollers.php, and add this. This is to create router and fetch content form API url.

```bash
public static function single(){

    $id = CONFIG::getRouteRequest(2);
    $getData = APP_CRUD_CRUD::fetchCont('https://example.in/api/blogs/'.$id);

    $page_arr = array(
        'title' => APP_CRUD_CRUD::content($getData,'title'),
        'description' => APP_CRUD_CRUD::content($getData,'description')
    );
    CONFIG::route_set('layout.header2','blog.single','layout.footer',$page_arr);
}
```

Now, create file assets/view/blog/single.php
<br/>
Because you had written 'blog.single' on the pagecontroller.
<br/>
And get this values in all of the pages like header, footer, content.

```bash
global $page_arr;

echo $page_arr['title'];
```

10. SEND EMAIL

```bash
<script>
$(document).ready(function(){
  $('#webcontactform').submit(function(event){
    event.preventDefault();

    var data = new FormData();
    data.append('purpose','access');
    data.append('sendtoemail','yourmail@gmail.com');

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
        if(mgs.code == 1){
          alert(mgs.status);
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
```

```bash
echo APP_INTI_EMAIL::send_email();
```

11. To build functions - create file inside assets/functions/ folder i.e., blogs.php
    And then go to app/pagecontrollers.php, find

```bash
public static function func(){
```

And add this inside

```bash
if(CONFIG::getRouteRequest(2) == 'blogs'){

    CONFIG::include_func('blogs',function(){ self::page404(); });

}
```

To get the function link

```bash
/func/blogs
```

12. Include files that are inside /assets/view/layout/menu.php

```bash
<?php config::include('layout.menu'); ?>
```

13. CRUD - Insert & Update Data to Database

```bash
$arr = array(
    "title" => htmlentities($_POST['title']),
    "description" => htmlentities($_POST['description']),
    "content" =>  htmlentities($_POST['content'])
);

APP_CRUD_CRUD::InsertUpdateData($arr,'blogs',APP_CRUD_DB::conn(),"");
```

If you set ID and ID is not empty that it will automatically update.

```bash
"id" =>  htmlentities($_POST['id'])
```

14. CHECK IF STRONG PASSWORD

```bash
if(APP_AUTH_VALID::password($password) == true){

}else{
  $message['status'] = APP_AUTH_VALID::password($password);
}
```

15. VALIDATE NAME AND MOBILE

```bash
APP_AUTH_VALID::mobile($_POST['mobile']) == true &&
APP_AUTH_VALID::personName($_POST['first_name']) == true &&
```

16. TO CHECK IF EXISTS IN DATABASE

```bash
$data = "SELECT * FROM users WHERE email='$email' LIMIT 1";
if(APP_CRUD_DB::checkData($data) == true){

}
```

17. USER REGISTRATION
    <br/>
    Put this on your functions

```bash
//SEND REQUEST - POST
//password, password1, email, first_name, last_name
if(isset($_POST['registration']) && $_POST['registration'] == 'access'){

    echo APP_AUTH_USERS::register_users();

}

//ALSO YOUR CAN SEND ADDITIONAL DATA HERE
$arr = array(
        "fname" => htmlentities($_POST['first_name']),
        "email" =>  $_POST['email'],
        "password" =>  password_hash($_POST['password'], PASSWORD_BCRYPT),
        "phone_number" =>  $_POST['phone_number'],
        "gender" =>  $_POST['gender']
    );

    echo APP_AUTH_USERS::register_users($arr);
```

18. GET SINGE ROW FROM DATABASE

```bash
$where = "email='".$email."'";
echo APP_CRUD_DB::getOne('fname','users',$where);
```

19. GET ALL DATA FROM DATABASE

```bash
$data = "SELECT * FROM users WHERE email='$email' LIMIT 1";
$getAll = json_decode(APP_CRUD_DB::getAll($data),true);
$password = $getAll[0]['row_name'];
```

20. SET COOKIES

```bash
APP_AUTH_SET::setcookie("pass",'124',"30");
```

21. CHECK IF USER - LOGIN LOGOUT

```bash
if(APP_AUTH_USERS::user_log_status() == true){
  echo "LOGGED IN";
}else{
  echo "OUT";
}
```

22. REDIRECT LOGIN WHEN LOGGED IN

```bash
<?php APP_AUTH_USERS::log_redirect("/home"); ?>
```

23. USER LOGOUT

```bash
<a href="/func/auth/?logout=success">Logout</a>
```

24. SEARCH FROM DATABASE

```bash
$columns = "fname,lname,content";
$table ="table_name";
$query = "search query";
$result = APP_CRUD_DB::searchData($columns,$table,$query);
```

25. GETTING THE POST DATA

```bash
<?php echo APP_AUTH_SET::postData('title'); ?>
```

26. GET THE LOGGED IN - USER TABLE DATA

```bash
echo APP_AUTH_USERS::logData('fname');
```

27. TO DELETE
    <br/>
    Set this attribute on the delete button

```bash
<button del-for="docs" del-id="6">delete</button>
```

Now, create /delete.php functions file

And your can write like this to execute delete

```bash
<?php
APP_CRUD_CRUD::deleteFunctions(function(){

    $for = $_POST["delete-confirm"];
    $id = $_POST["del-id"];

    if($for == 'docs'){
        if(APP_CRUD_DB::sql_query("DELETE FROM table WHERE id='$id' LIMIT 1")){
            $message['code'] = 1;
            $message['status'] = 'Deleted Success';
        }
    }

    echo json_encode($message);

});
?>
```

Add this modal to the footer

```bash
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
```

28. SQL QUERY TO DATABASE

```bash
if(APP_CRUD_DB::sql_query("DELETE FROM docs WHERE id='$id' LIMIT 1")){
    $message['code'] = 1;
    $message['status'] = 'Deleted Success';
}
```

29. REDIRECT WHEN USERS LOG OFF

```bash
<?php APP_AUTH_USERS::log_redirect_off("/docs"); ?>
```

30. SEND AJAX REQUEST
    <br/>
    JQUREY

```bash
# jQuery Ajax
$("#submitForm").click(function (event) {
    var data = new FormData();
    //ADD ADDITIONAL FORM HERE
    data.append("editDocs", "edit");

    let method = $(this).attr("method");
    let action = $(this).attr("action");
    ajaxFunc(method, action, data, function (mgs) {
      //ADD HERE GETTING RESPONSE
      if (mgs.code == 1) {
        //CODES HERE
      }
    });
  });
```

PURE JAVASCRIPT

```bash
function loadMyCart(){
  //ADD ADDITIONAL FORM HERE
  let data = "getAddToCart=get";
  let method = "post";
  let action = "/func/addtocart";
  ajaxFuncJS(method, action, data, function (mgs) {
    //ADD HERE GETTING RESPONSE
    console.log(mgs);
  }
}
```

JQUERY + JS

```bash
$('#contactForm').submit(function(event){
    event.preventDefault();
    var data = $(this).serialize();
    data = data + "&submitContact=submit";
    let method = $(this).attr("method");
    let action = $(this).attr("action");
    ajaxFuncJS(method, action, data, function (mgs) {
    //submitForm(this,data,event,function(mgs){
        if(mgs.code == 1){
            //ADD YOUR PROGRAM HERE ON SUCCESS
            console.log(mgs);
            $("#contactsubmited").modal("show");
        }
    });
});
```

31. ADD TO CARD - FUNCTIONS
    <br/>
    This is the php for buttons

```bash
$addCartBtn = '<button addtocart="medical" act="add" productid="'.$val['id'].'" days="30" qty="1" >Add Cart</button>';
if(APP_INTI_ADDCART::AddToCartCheck('medical',$val['id']) == true){
    $addCartBtn = '<button addtocart="medical" act="minus" productid="'.$val['id'].'" days="30" qty="1" >Remove</button>';
}
```

After that add this to your jQuery

```bash
$('*[addtocart]').click(function(event){
    let cookiename = $(this).attr("addtocart");
    let cookieval = $(this).attr("productid");
    let days = $(this).attr("days");
    let act = $(this).attr("act");
    let qty = $(this).attr("qty");
    AddToCartCookies(cookiename,cookieval,days,act,qty);
    if(act == "add"){
        //EDIT YOUR CODE HERE
        $(this).attr("act","minus");
        $(this).removeClass("text-success");
        $(this).addClass("text-danger");
        $(this).html(`<i class="fa-solid fa-minus"></i> Remove`);
    }else{
        //EDIT YOUR CODE HERE
        $(this).attr("act","add");
        $(this).removeClass("text-danger");
        $(this).addClass("text-success");
        $(this).html(`<i class="fa-solid fa-plus"></i> Add Cart`);
    }
    $('.cart_noti').text(AddToCartCount(cookiename));
});
```

Your Add to cart notification have this .cart_noti class

```bash
<span class="cart_noti"><?php echo APP_INTI_ADDCART::AddToCartCount("medical"); ?></span>
```

32. Redirect on Click

```bash
<button go_href="mycarts" >Click Here</button>
```

33. My Cart Page
    <br/>
    First carte addtocart.php function
    And add this and Edit according to your database

```bash
<?php
if(isset($_POST['getAddToCart'])){
    APP_INTI_ADDCART::cartLists("medical",function($id,$qty,$query){
        //WHEN ADD TO CART EXISTS
        $data = "SELECT * FROM table WHERE id='$id' LIMIT 1";
        $getAll = json_decode(APP_CRUD_DB::getAll($data),true);
        $return = "";
        if($query == 'img'){
            //EDIT HERE
            $return = $getAll[0]['img'];
        }
        if($query == 'name'){
            //EDIT HERE
            $return = $getAll[0]['name'];
        }
        if($query == 'price'){
            //EDIT HERE
            $return = number_format($getAll[0]['price'] * $qty, 2);
        }
        return $return;
    });
}
?>
```

Now, go to your mycart page and follow this
For showing your cart lists

```bash
<div id="getCartLists"></div>
<span id="total_price">0</span>
```

And add this JavaScript function and edit according to your design

```bash
function loadMyCart(){
    //ADD ADDITIONAL FORM HERE
    let data = "getAddToCart=get";
    let method = "post";
    let action = "/func/addtocart";
    ajaxFuncJS(method, action, data, function (mgs) {
    //ADD HERE GETTING RESPONSE
    //console.log(mgs);
    let content = '';
    let total_price = 0;
    if (mgs.code == 1) {
        //CODES HERE
        if(mgs.data){
            let data = mgs.data;
            data.forEach(function(list){
                content += `
                            <tr>
                            <td>
                                <img src="`+list[`img`]+`" style="width: 80px; height: auto" />
                            </td>
                            <td>`+list[`name`]+`</td>
                            <td>
                                <input
                                type="number"
                                value="`+list[`qty`]+`"
                                style="
                                    width: 50px;
                                    border: 1px solid gray;
                                    padding: 5px;
                                    border-radius: 6px;
                                "
                                class="eachCart"
                                cart="medical"
                                productid="`+list[`id`]+`"
                                act="add"
                                days="30"
                                onchange="chagneAddToCart(this)"
                                />
                            </td>
                            <td >
                                <i class="fa-solid fa-indian-rupee-sign"></i> `+list[`price`]+`
                            </td>
                            <td class="w-10 text-center">
                                <button
                                onclick="removeAddToCart(this)"
                                removeAddToCart="medical"
                                productid="`+list[`id`]+`"
                                qty="`+list[`qty`]+`"
                                act="minus"
                                days="30"
                                >
                                <i class="fa-solid fa-xmark"></i>
                                </button>
                            </td>
                            </tr>
                            `
                            ;

            });
        }
        total_price = mgs.total_price;
    }
    document.getElementById("getCartLists").innerHTML = content;
    document.getElementById("total_price").innerHTML = total_price.toFixed(2);;
    document.getElementsByClassName("cart_noti")[0].innerHTML = AddToCartCount("medical");
    });
}
loadMyCart();
```

FOR SUBMITTING WHILE ON CLICK

```bash
<button type="button" onclick="submitPayCart()" >Pay now</button>
```

JAVASCRIPT

```bash
function submitPayCart(){
  let data1 = "insertToOrder=get";
  let method1 = "post";
  let action1 = "/func/addtocart";
  ajaxFuncJS(method1, action1, data1, function (mgs) {
    //ADD HERE GETTING RESPONSE
    if (mgs.code == 1) {
      window.location.href = "/orders";
    }
  });
}
```

on func/addtocart

```bash
if(isset($_POST['insertToOrder'])){
    APP_INTI_ADDCART::cartListsSql("medical",function($id,$qty){
        $data = "SELECT * FROM medicine WHERE id='$id' LIMIT 1";
        $getAll = json_decode(APP_CRUD_DB::getAll($data),true);
        //INSERT INTO ORDER
        $arr = array(
            "img" => $getAll[0]['img'],
            "product_name" => $getAll[0]['name'],
            "qty" =>  $qty,
            "price" => number_format($getAll[0]['price'] * $qty,2),
            "status" =>  '0',
            "day" =>  time()
        );

        APP_CRUD_CRUD::InsertUpdateData($arr,'orders',APP_CRUD_DB::conn(),"");

    });
}
```

34. Buy button

```bash
<button buynow="medical" productid="'.$val['id'].'" qty="1" days="30" >Buy</button>
```

```bash
//BUY BUTTON
$('*[buynow]').click(function(event){
    let cookiename = $(this).attr("buynow");
    let cookieval = $(this).attr("productid");
    let days = $(this).attr("days");
    let qty = $(this).attr("qty");
    AddToCartCookies(cookiename,cookieval,days,'add',qty);
    window.location.href = 'mycarts';
});
```

35. CONTACT FORM
    <br/>
    FORM EXAMPLE

```bash
<form id="contactForm" action="/func/contact" method="post" enctype="multipart/form-data" >

//name,email,message
```

    ADD THIS FOR SUBMITTING FORM

```bash
$('#contactForm').submit(function(event){
    event.preventDefault();
    var data = $(this).serialize();
    data = data + "&submitContact=submit";
    let method = $(this).attr("method");
    let action = $(this).attr("action");
    ajaxFuncJS(method, action, data, function (mgs) {
    //submitForm(this,data,event,function(mgs){
        if(mgs.code == 1){
            //ADD YOUR PROGRAM HERE ON SUCCESS
            console.log(mgs);
            $("#contactsubmited").modal("show");
        }
    });
});
```

CREATE DATABASE

```bash
$sql = "CREATE TABLE IF NOT EXISTS contact(
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255),
    email VARCHAR(255),
    message TEXT,
    day VARCHAR(255)
    )";
if ($db->db()->query($sql) === TRUE) {
    echo "Contact Table created successfully";
} else {
    echo "Error creating table: " . $db->db()->error;
}
```

We need function file .. function/contact.php

---

Gimit Medical,
