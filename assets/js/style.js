$(document).ready(function () {
  //ON CLICK LEFT MENU
  $("#toggle_sidebar").click(function () {
    //alert($(".sidebar").css("width"));
    if ($(".sidebar").css("left") != "-250px") {
      $(".sidebar").css("left", "-250px");
      if ($(document).width() > 992) {
        $(".main").css("margin-left", "0");
      }
      $(".menu").css("left", "0");
    } else {
      $(".sidebar").css("left", "0");

      if ($(document).width() > 992) {
        $(".main").css("margin-left", "250px");
      }
      $(".menu").css("left", "250px");
    }
  });
  //ONCLICK RIGHT MENU
  $("#right_sidebar_btn").click(function () {
    if ($("#rightbar_cont")) {
      if ($("#rightbar_cont").css("right") == "0px") {
        $("#rightbar_cont").css("right", "-260px");
      } else {
        $("#rightbar_cont").css("right", "0px");
      }
    }
  });
});
