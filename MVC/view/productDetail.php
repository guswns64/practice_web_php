<?php
  include_once "../model/productDetailMD.php";
  $productInfoObj = getProductDetailInfo();
 ?>

<!DOCTYPE html>
<html>
  <head lang="en">
    <meta charset="utf-8">
    <link rel = "stylesheet" type = "text/css" href = "../../css/mainLogo.css">
    <link rel = "stylesheet" type = "text/css" href = "../../css/productCategori.css">
    <link rel = "stylesheet" type = "text/css" href = "../../css/productDetail.css?ver=1.0006">
    <title>회원가입</title>

    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <script type="text/javascript">
      $(document).ready(function() {

        var firstImgSrc = $(".subThumbnail").first().attr("src");
        $("#bigThumbnail").attr("src", firstImgSrc);

        $(".subThumbnail").mouseenter(function(e){
          var target = e.target;
          var img_src = target.src;
          console.log("target : " + target);
          console.log("target src : " + img_src);
          console.log("mouseover");

          $("#bigThumbnail").attr("src", img_src);
        });

      });
    </script>
  </head>
  <body>
    <div align="center">
      <div id="mainLogo">
        <a href="./mainView.php" style="" >
          <h1>기맴준의 쇼핑몰</h1></a>
      </div>
    </div>
    <nav>
      <div align="center" style="margin-bottom: 20px">
        <?php
          include_once "category.php";
         ?>
     </div>
    </nav>

    <div id="wrap">
      <div id="thumbnailDIV">
        <div id="bigThumbnailDIV">
          <img id="bigThumbnail" src="#" alt="">
        </div>
        <div id="subThumbnailDIV">
          <?php
            $subThumbnailImg_path_arr = $productInfoObj["subThumbnailImgPathArr"];
            for($index = 0; $index < count($subThumbnailImg_path_arr); $index++){
              // 이미지 5개 넘으면 레이아웃 현재로써는 망가짐 2018-01-07
              if($index == 5){
                break;
              }
              $img_path = $subThumbnailImg_path_arr[$index];
              echo '<img class="subThumbnail" src="'.$img_path.'">';
            }
           ?>
        </div>

      </div>
      <div id="productInfoDIV">
        <div class="productInfo">
          <?php
            echo "<h1>" . $productInfoObj["name"] . "</h1>";
           ?>
        </div>
        <div class="division">
        </div>
        <div class="productInfo">
          상품 가격<br>
          <?php
            echo "<h2>" . $productInfoObj["price"] . "원</h2>";
           ?>
        </div>
        <div class="division">
        </div>
        <div class="productInfo">
          옵션 선택
        </div>
        <div class="division">
        </div>
        <div class="productInfo">
          총 상품 금액<br>
          <?php
            echo "<h2>" . $productInfoObj["price"] . "원</h2>";
           ?>
        </div>
        <div class="division">
        </div>
        <div class="productInfo">
          <button type="button" class="productBtn">구매하기</button>
          <button type="button" class="productBtn">장바구니</button>
        </div>
      </div>

      <div id="productDetailContent">
        <?php
          echo $productInfoObj["detailContent"];
         ?>
      </div>
    </div>
  </body>
</html>
