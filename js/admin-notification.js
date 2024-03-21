$(document).ready(function () {
  $(".notif-btn").click(function () {
    $("body").addClass("calender-announcement-notices-active");
    $(".calender-announcement-notices").addClass("active");
    $(".notif-btn").css("visibility", "hidden");
  });

  $(".x-mark").click(function () {
    $("body").removeClass("calender-announcement-notices-active");
    $(".calender-announcement-notices").removeClass("active");
    $(".notif-btn").css("visibility", "visible");
  });
});
