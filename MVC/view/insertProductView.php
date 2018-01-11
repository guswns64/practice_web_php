<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel = "stylesheet" type = "text/css" href = "../../css/insertProductView.css?ver=1.2">
    <script type="text/javascript" src="../../api/smarteditor2-master/dist/js/service/HuskyEZCreator.js?ver=1.1" charset="utf-8"></script>
    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <script src="../../js/insertProduct.js?ver=1.6"></script>
    <script type="text/javascript">
      $(document).ready(function() {
        // $("#testBtn").click(function(){
        //   var productContentHTML = getHTML();
        //   console.log("productContentHTML");
        //   console.log(productContentHTML);
        //   $('<input>').attr({
        //       type: 'hidden',
        //       name: 'productContentHTML',
        //       value: productContentHTML
        //   }).appendTo("#insertForm");
        //   $("#insertForm").submit();
        // });

        $("#testBtn").click(insertSubmit);
      });



    </script>
  </head>
  <body>
    <div id="wrap">

      <div id="subject">
        상품 등록
      </div>

      <form id="insertForm" action="../model/insertProductMD.php" method="post" enctype="multipart/form-data">
        상품 이름 : <input type="text" id="productName" value="예) 반바지">
        <br><br class="lineHeight">
        상품 가격 : <input type="number" id="productPrice" value="10000">원
        <br><br class="lineHeight">
        상품 종류 : <select id="productKind">
                     <option value="top">top</option>
                     <option value="bottom">bottom</option>
                     <option value="shoes">shoes</option>
                   </select>
        <br><br class="lineHeight">
        <div class="thumbnailArea">
          메인 섬네일 이미지 (한개만 선택가능) : <input type="file" id="mainThumbnailImg" />
          <div id="mainThumbnailImgsWrap" style="padding-top:10px;">
             <img src="../../gif/no_images.gif" style="width:200px; height:200px">
          </div>
        </div>
        <br><br class="lineHeight">
        <div class="thumbnailArea">
          상품 섬네일 이미지 (5개까지 선택가능) : <input type="file" id="thumbnailImgs" multiple>
          <div id="thumbnailImgsWrap" style="padding-top:10px;">
             <img src="../../gif/no_images.gif" style="width:200px; height:200px">
             <img src="../../gif/no_images.gif" style="width:200px; height:200px">
             <img src="../../gif/no_images.gif" style="width:200px; height:200px">
             <img src="../../gif/no_images.gif" style="width:200px; height:200px">
             <img src="../../gif/no_images.gif" style="width:200px; height:200px">
          </div>
        </div>
        <!-- https://codepen.io/gab5a430/pen/jPNXeX 이미지 업로드 미리보기 기능 -->
        <div>
          <h2 style="text-align:left;">상품 세부 내용</h2>
        </div>
        <div id="editorDIV">
          <?php
            include_once "../../api/smarteditor2-master/dist/SmartEditor2.php";
           ?>
        </div>
        <div>
          <button id="submitBtn" type="button" style="width:200px; height:40px">등록합니다</button>
        </div>

      </form>

    </div>



  </body>
</html>
