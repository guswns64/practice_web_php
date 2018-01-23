<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel = "stylesheet" type = "text/css" href = "../../../css/mainLogo.css?ver=1.0002">
    <link rel = "stylesheet" type = "text/css" href = "../../../css/manageDir/manageList.css?ver=1.0005">
    <link rel = "stylesheet" type = "text/css" href = "../../../css/manageDir/manageProductList.css?ver=1.0002">
    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <script type="text/javascript">
      $(document).ready(function() {
        $("#productListTable tr.productListItem").click(function(){
          // console.log("target : " + e.target);
          console.log("해당 속성 ID 값 : " + $(this).attr("data-productID"))
        });

        $("#productListTable tr.productListItem").mouseover(function(e){
          // console.log("mouseOver");
        });
        $("#productListTable tr.productListItem").mouseout(function(e){
          // console.log("mouseOut");
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
      <?php include_once "./manageList.php"; ?>



      <!-- 관리 리스트에서 불러온 주요 컨텐츠를 표시하는 div -->
      <div id="manageContent">

        <table id="productListTable">
          <tr id="productListHead">
            <td id="productImgHeadTD">이미지</td>
            <td id="productNameHeadTD">이름</td>
            <td id="productKindHeadTD">종류</td>
            <td id="productPriceHeadTD">상품 가격</td>
          </tr>
          <?php
            include_once "../../model/getProductListMD.php";
            $productInfoArr = getProductListData();

            for($index = 0; $index < count($productInfoArr); $index++){
              $productInfo = $productInfoArr[$index];
              $productInfoID = $productInfo["id"];
              $productImgPath = $productInfo["thumbnail_img_path"];
              $productInfoName = $productInfo["name"];
              $productInfoKind = $productInfo["kind"];
              $productInfoPrice = $productInfo["price"];

              echo "<tr class='productListItem' data-productID='$productInfoID'>";
              echo "<td class='productImgTD'><img src='$productImgPath'></td>";
              echo "<td class='productNameTD'>$productInfoName</td>";
              echo "<td class='productKindTD'>$productInfoKind</td>";
              echo "<td class='productPriceTD'>$productInfoPrice</td>";
              echo "</tr>";
            }

            ?>
        </table>
      </div>
    </div>

  </body>
</html>
