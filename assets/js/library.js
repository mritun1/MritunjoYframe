function close_alert(e) {
  let parent1 = $(e).parent();
  $(parent1).parent().hide();
}

$(document).ready(function () {
  $("[go_href]").click(function () {
    let go_href = $(this).attr("go_href");
    let go_target = $(this).attr("go_target");
    if (typeof go_target !== "undefined" && go_target !== false) {
      window.open(go_href, go_target);
    } else {
      window.location.href = go_href;
    }
  });
  // --------------------------------------
  // REDIRECT WHEN CLICK
  // --------------------------------------
  // <button go_href="/" >Home</button>
  // <button go_target="_blank" go_href="/new-problems" >Newest</button>
  //---
  $(".modal-close").click(function () {
    let parent = $(this).parent().parent().parent().parent();
    parent.css("display", "none");
    $(this).closest("form").find("input[type=text], textarea").val("");
  });
  $(".edit-modal-close").click(function () {
    let parent = $(this).parent().parent().parent().parent().parent();
    parent.css("display", "none");
    $(this).closest("form").find("input[type=text], textarea").val("");
    $("#editId").attr("editId", "");
  });
  // --------------------------------------
  // MODAL CLOSE - ON CLICK
  // --------------------------------------
  $(".close-alert").click(function () {
    let parent1 = $(this).parent();
    $(parent1).parent().hide();
  });
  // --------------------------------------
  // ALERT CLOSE - ON CLICK
  // --------------------------------------
  $("*[modal-show]").click(function () {
    let modalId = $(this).attr("modal-show");
    $("#" + modalId).css("display", "block");
  });
  // --------------------------------------
  // SHOW MODAl - ON CLICK
  // --------------------------------------
  $("*[del-for]").click(function () {
    $("#deleteModal").css("display", "block");
    $("button[delete-confirm]").attr("delete-confirm", $(this).attr("del-for"));
    $("button[delete-confirm]").attr("del-id", $(this).attr("del-id"));
  });
  // --------------------------------------
  // TO SHOW DELETE MODAl - ON CLICK
  // --------------------------------------
  $("*[delete-confirm]").click(function () {
    var data = new FormData();
    data.append("forDeleting", "Delete");
    data.append("delete-confirm", $(this).attr("delete-confirm"));
    data.append("del-id", $(this).attr("del-id"));

    $.ajax({
      url: "/func/delete",
      type: "post",
      dataType: "JSON",
      data: data,
      processData: false,
      contentType: false,
      success: function (data) {
        let mgs = JSON.parse(JSON.stringify(data));
        console.log(data);
        if (mgs.code == 1) {
          window.location.href = window.location.href;
        } else {
          $("#deleteStatus").html(
            `<div class="alert alert-danger">
                                 <div>
                                 <a href="javascript:void(0)" class="close-alert"><i class="fa-solid fa-xmark"></i></a>
                                 <p>` +
              mgs.status +
              `</p>
                                 </div>
                             </div>`
          );
        }
      },
      error: function (err) {
        alert(err);
      },
    });
  });
  // --------------------------------------
  // CONFIRM DELETE - ON CLICK
  // --------------------------------------
  function submitForm(id, data, event, func) {
    event.preventDefault();
    $.ajax({
      url: $(id).attr("action"),
      type: $(id).attr("method"),
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
  //      SUBMIT FORM - ONCLICK
  //..............................................................
  // $("#formtest").submit(function (event) {
  //   var data = new FormData(this);
  //   //ADD ADDITIONAL FORM HERE
  //   data.append("addDocsPage", "Adding");
  //   submitForm(this, data, event, function (mgs) {
  //     if (mgs.code == 1) {
  //       //ADD YOUR PROGRAM HERE ON SUCCESS
  //       console.log(mgs);
  //     }
  //   });
  // });
  //..............................................................
});

//..............................................................
//      TEXT-EDITOR  START
//..............................................................
if (document.getElementsByClassName("editor")[0]) {
  var document = document.getElementsByClassName("editor")[0];

  //..............................................................
  //      TEXT-EDITOR  END
  //..............................................................

  function chooseColor() {
    var mycolor = document.getElementById("myColor").value;
    document.execCommand("foreColor", false, mycolor);
  }

  function changeSize() {
    var mysize = document.getElementById("fontSize").value;
    document.execCommand("fontSize", false, mysize);
  }

  function createLink() {
    var szURL = prompt("Enter a URL:", "http://");
    if (window.getSelection) {
      // all modern browsers and IE9+
      let selectedText = window.getSelection().toString();
      if (szURL != null && szURL != "") {
        var adata =
          "<a href='" +
          szURL +
          "' style='word-break: break-all;'>" +
          selectedText +
          "</a>";
        document.execCommand("insertHTML", false, adata);
      }
    }
  }

  function insertImg() {
    var szURL = prompt("Enter a URL:", "http://");
    if (szURL != null && szURL != "") {
      var data = "<img src='" + szURL + "' style='width:80%;' />";
      document.execCommand("insertHTML", false, data);
    }
  }
  function createCode() {
    if (window.getSelection) {
      // all modern browsers and IE9+
      let selectedText = window.getSelection().toString();
      var data =
        "<code style='background-color:lightgray;padding:3px 5px;border-radius:6px;color:orangered;'>" +
        htmlEntities(selectedText) +
        "<code/>";
      document.execCommand("insertHTML", false, data);
    }
  }
  function createCodeBase() {
    if (window.getSelection) {
      // all modern browsers and IE9+
      let selectedText = window.getSelection().toString();
      selectedText = htmlEntities(selectedText);
      var data =
        "<div><pre style='background-color:black;padding:3px 5px;color:orangered;'>" +
        selectedText +
        "<pre/></div>";
      document.execCommand("insertHTML", false, data);
    }
  }
  function insertVideo() {
    var urlString = prompt("Youtube URL:", "http://");

    let paramString = urlString.split("?")[1];
    let queryString = new URLSearchParams(paramString);
    let value;
    for (let pair of queryString.entries()) {
      value = pair[1];
    }

    //alert(value);
    if (value != null && value != "") {
      var data =
        '<iframe width="80%" height="200px" src="https://www.youtube.com/embed/' +
        value +
        '" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
      document.execCommand("insertHTML", false, data);
    }
  }
  function heading() {
    if (window.getSelection) {
      // all modern browsers and IE9+
      let selectedText = window.getSelection().toString();
      var data =
        "<div style='border-left:4px solid lightgray;padding:3px 8px;background-color:lavender;border-radius:6px;margin:8px 3px;'>" +
        selectedText +
        "</div>";
      document.execCommand("insertHTML", false, data);
    }
  }
  document.addEventListener("keypress", function (event) {
    if (event.key === "Enter") {
      document.execCommand("defaultParagraphSeparator", false, "p");
    }
  });
}

function richTextPlaceHolder() {
  //------------------------------------------------------
  // Get the placeholder attribute
  //------------------------------------------------------
  if (document.getElementsByClassName("editor")[0]) {
    //const ele = document.getElementById("editor1");
    const ele = document.getElementsByClassName("editor")[0];
    //------------------------------------------------------
    // Get the placeholder attribute
    //------------------------------------------------------
    const placeholder = ele.getAttribute("data-placeholder");
    // Set the placeholder as initial content if it's empty
    ele.innerHTML === "" && (ele.innerHTML = placeholder);
    ele.addEventListener("focus", function (e) {
      const value = e.target.innerHTML;
      value === placeholder && (e.target.innerHTML = "");
    });
    ele.addEventListener("blur", function (e) {
      const value = e.target.innerHTML;
      value === "" && (e.target.innerHTML = placeholder);
    });
  }
}
richTextPlaceHolder();

function htmlEntities(str) {
  return String(str)
    .replace(/&/g, "&amp;")
    .replace(/</g, "&lt;")
    .replace(/>/g, "&gt;")
    .replace(/"/g, "&quot;");
}

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
// --------------------------------------------------------------
//   ADD TO CART - START
// --------------------------------------------------------------
function AddToCartCookies(cookiename, cookieval, days, act, qty) {
  let carts;
  let cookieData = getCookie(cookiename);
  if (act == "add") {
    //ADDING
    if (cookieData) {
      carts = cookieData + "," + cookieval + "-" + qty;
    } else {
      carts = cookieval + "-" + qty;
    }
  } else {
    //MINUS
    carts = cookieData.replace("," + cookieval + "-" + qty, "");
    carts = carts.replace(cookieval + "-" + qty, "");
  }
  // Set a cookie
  setCookie(cookiename, carts, days);
}
function setCookie(cname, cvalue, exdays) {
  const d = new Date();
  d.setTime(d.getTime() + exdays * 24 * 60 * 60 * 1000);
  let expires = "expires=" + d.toUTCString();
  document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}
function getCookie(cname) {
  let name = cname + "=";
  let decodedCookie = decodeURIComponent(document.cookie);
  let ca = decodedCookie.split(";");
  for (let i = 0; i < ca.length; i++) {
    let c = ca[i];
    while (c.charAt(0) == " ") {
      c = c.substring(1);
    }
    if (c.indexOf(name) == 0) {
      return c.substring(name.length, c.length);
    }
  }
  return "";
}
function AddToCartCount(cookieName) {
  let cart = getCookie(cookieName);
  if (cart) {
    cart = cart.split(",");
    cart = cart.length;
  } else {
    cart = 0;
  }
  return cart;
}
// --------------------------------------------------------------
//   ADD TO CART - END
// --------------------------------------------------------------
