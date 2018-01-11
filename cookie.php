
<script src="http://code.jquery.com/jquery-latest.js"></script>
<script src="./js/jquery.cookie.js"></script>
<script type="text/javascript">

  // 쿠키 세팅
  $.cookie("testCookie", "test쿠키");
  getTestCookie();

  // 쿠키 삭제
  $.cookie("testCookie", null);
  getTestCookie();


  function getTestCookie(){
      console.log("쿠키를 한번 불러오겠습니다");
      console.log($.cookie("testCookie"));
  }
</script>

<?php
  //http://naminsik.com/blog/1864



 ?>
