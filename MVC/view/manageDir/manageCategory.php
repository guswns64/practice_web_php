<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel = "stylesheet" type = "text/css" href = "../../../css/mainLogo.css?ver=1.0002">
    <link rel = "stylesheet" type = "text/css" href = "../../../css/manageDir/manageList.css?ver=1.0005">
    <link rel = "stylesheet" type = "text/css" href = "../../../css/manageDir/manageCategory.css?ver=1.0004">
    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <script type="text/javascript">
      $(document).ready(function() {

        init();

        $("#mainCategory div").click(function(e){
          $("#mainCategory div").css("font-weight", "normal");
          $(this).css("font-weight", "bold");
          var mainKindKey = $(this).attr("key");

          for(var index = 0; index < categoryObjArr.length; index++ ){
            var categoryObj = categoryObjArr[index];
            var categoryKey = categoryObj[0]["key"];
            if( mainKindKey == categoryKey ){
              var subKindArr = categoryObj[1];
              setSubKind(subKindArr);
            }
          }
        });

      });

      function init(){
        $("#mainCategory").html("");
        for(var index = 0; index < categoryObjArr.length; index++){
          var categoryObj = categoryObjArr[index];
          var mainCategoryObj = categoryObj[0];
          var mainCategoryKey = mainCategoryObj["key"];
          var mainCategoryValue = mainCategoryObj["value"];
          $("#mainCategory").append("<div key='"+mainCategoryKey+"'>"+mainCategoryValue+"</div>");
        }
      }

      // 서브 목록 세팅
      function setSubKind(subKindArr){
        $("#subCategory").html("");
        for(var index = 0; index < subKindArr.length; index++ ){
          var subCategory = subKindArr[index];
          var subCategoryKey = subCategory["key"];
          var subCategoryValue = subCategory["value"];
          $("#subCategory").append("<div key='"+subCategoryKey+"'>"+subCategoryValue+"</div>");
        }
      }

    </script>
  </head>

  <body>
    <?php
    // 메인 로고 세팅
    include_once "../mainLogo.php";
    // 카테고리 데이터 가져오기
    include_once "../../model/getCategoryList.php";
    $categoryArr = getCategoryObj();
    ?>
    <script type="text/javascript">
      var categoryObjArr = <?= json_encode($categoryArr) ?>;
    </script>
    <div id="subject">
      관리페이지
    </div>
    <div class="margin"></div>
    <div id="manageWrap">
      <!-- 관리 리스트들을 담는 div -->
      <?php include_once "./manageList.php"; ?>
      <!-- 관리 리스트에서 불러온 주요 컨텐츠를 표시하는 div -->
      <div id="manageContent">
          <div>
            카테고리 페이지
          </div>

          <div id="mainCategoryDIV">
            메인 카테고리
            <br>
            <div id="mainCategory"></div>
          </div>
          <div id="subCategoryDIV">
            서브 카테고리
            <br>
            <div id="subCategory"></div>
          </div>




          <?php

           ?>

      </div>
    </div>

  </body>
</html>
