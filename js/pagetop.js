$(document).ready(function () {
  
    $(window).on("scroll", function() {
      if ($(this).scrollTop() > 100) {
        $(".page-top").fadeIn("slow");
      } else {
        $(".page-top").fadeOut("slow");
      }

    scrollHeight = $(document).height();
    scrollPosition = $(window).height() + $(window).scrollTop();
    footHeight = $("footer").innerHeight();

    if (scrollHeight - scrollPosition <= footHeight - 30) {
      $(".page-top").css({
        "position": "absolute",
      });
    } else {
      $(".page-top").css({
        "position": "fixed",
      });
    }
    });
  
  // スムーススクロール設定
  $(".page-top").click(function () {
    $("body, html").animate({
      scrollTop: 0
    }, 800);
    return false;
  });

});