<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel = "stylesheet" type = "text/css" href = "../../../css/mainLogo.css?ver=1.0002">
    <link rel = "stylesheet" type = "text/css" href = "../../../css/manageDir/manageList.css?ver=1.0004">
    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <script type="text/javascript">
      $(document).ready(function() {
        $("#manageList ul li").click(function(e){
          console.log("manager list touch");
          console.log("target : " + e.target);
        });
      });
    </script>
  </head>

  <body>
    <?php
    include_once "../mainLogo.php";
    ?>
    <div id="subject">
      관리페이지
    </div>
    <div class="margin"></div>
    <div id="manageWrap">
      <!-- 관리 리스트들을 담는 div -->
      <div id="manageList">
        <ul>
          <li>상품 관리</li>
          <li>상품 등록</li>
        </ul>
      </div>
      <!-- 관리 리스트에서 불러온 주요 컨텐츠를 표시하는 div -->
      <div id="manageContent">
        주요 컨텐츠
      </div>
    </div>

  </body>
</html>
