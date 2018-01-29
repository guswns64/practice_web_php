<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel = "stylesheet" type = "text/css" href = "../../../css/manageDir/manageList.css?ver=1.0005">
    <link rel = "stylesheet" type = "text/css" href = "../../../css/manageDir/insertProductView.css?ver=1.4">
    <link rel = "stylesheet" type = "text/css" href = "../../../css/mainLogo.css?ver=1.0002">
    <script type="text/javascript" src="../../../api/smarteditor2-master/dist/js/service/HuskyEZCreator.js?ver=1.1" charset="utf-8"></script>
    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <script src="../../../js/manage/insertProduct.js?ver=1.00001"></script>
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
       <?php
         // 메인 로고 세팅
         include_once "./manageList.php";
         include_once "../../model/getCategoryList.php";
         $categoryArr = getCategoryObj();
         ?>
       <!-- 관리 리스트에서 불러온 주요 컨텐츠를 표시하는 div -->
       <div id="manageContent">
         <div id="wrap">

           <div id="insertProductSubject">
             상품 등록
           </div>

           <form id="insertForm" action="../../model/insertProductMD.php" method="post" enctype="multipart/form-data">
             상품 이름 : <input type="text" id="productName" value="예) 반바지">
             <br><br class="lineHeight">
             상품 가격 : <input type="number" id="productPrice" value="10000">원
             <br><br class="lineHeight">
               상품 종류 : <select id="productKind">
                          </select>
              <div id="productSubKindDiv">
               세부 종류 : <select id="productSubKind">
                          </select>
              </div>
              <script type="text/javascript">
                var categoryObjArr = <?= json_encode($categoryArr) ?>;
                for(var index = 0; index < categoryObjArr.length; index++ ){
                  var categoryObj = categoryObjArr[index];
                  var categoryKey = categoryObj[0]["key"];
                  var categoryValue = categoryObj[0]["value"];
                  $("#productKind").append("<option value='"+categoryKey+"'>"+categoryValue+"</option>")
                }
              </script>

             <br><br class="lineHeight">
             <div class="thumbnailArea">
               메인 섬네일 이미지 (한개만 선택가능) : <input type="file" id="mainThumbnailImg" />
               <div id="mainThumbnailImgsWrap" style="padding-top:10px;">
                  <img src="../../../gif/no_images.gif" style="width:200px; height:200px">
               </div>
             </div>
             <br><br class="lineHeight">
             <div class="thumbnailArea">
               상품 섬네일 이미지 (5개까지 선택가능) : <input type="file" id="thumbnailImgs" multiple>
               <div id="thumbnailImgsWrap" style="padding-top:10px;">
                  <img src="../../../gif/no_images.gif" style="width:200px; height:200px">
                  <img src="../../../gif/no_images.gif" style="width:200px; height:200px">
                  <img src="../../../gif/no_images.gif" style="width:200px; height:200px">
                  <img src="../../../gif/no_images.gif" style="width:200px; height:200px">
                  <img src="../../../gif/no_images.gif" style="width:200px; height:200px">
               </div>
             </div>
             <!-- https://codepen.io/gab5a430/pen/jPNXeX 이미지 업로드 미리보기 기능 -->
             <div>
               <h2 style="text-align:left;">상품 세부 내용</h2>
             </div>
             <div id="editorDIV">
               <?php
                 include_once "../../../api/smarteditor2-master/dist/SmartEditor2.php";
                ?>
             </div>
             <div>
               <button id="submitBtn" type="button" style="width:200px; height:40px">등록합니다</button>
             </div>

           </form>

         </div>
       </div>
     </div>

  </body>
</html>
