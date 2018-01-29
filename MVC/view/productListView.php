<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no">
    <link rel = "stylesheet" type = "text/css" href = "../../css/productListView.css?ver=1.00000">
    <link rel = "stylesheet" type = "text/css" href = "../../css/loginView.css?ver=1.00001">
    <link rel = "stylesheet" type = "text/css" href = "../../css/mainLogo.css?ver=1.0002">
    <link rel = "stylesheet" type = "text/css" href = "../../css/productCategory.css?ver=1.00003">
    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <script src="../../js/jquery.cookie.js"></script>
    <script src="../../js/productCategory.js"></script>
</head>
<body>
  <?php
    include_once "mainLogo.php";
   ?>
  <nav>
    <div align="center">
      <?php
        include_once "category.php";
       ?>
    </div>
  </nav>
  <div id="wrap">
    <div id="centerContent">
      <table>
        <?php
          include_once "../model/getProductListMD.php";
          $getKindData = $_GET["productKind"];
          if( isset( $_GET["isSubKind"]) ){
            $isSubKind = $_GET["isSubKind"];
          }
          else{
            $isSubKind = false;
          }
          if( $isSubKind == true ){
            $productInfoArr = getProductListData($getKindData, true);
          }
          else{
            $productInfoArr = getProductListData($getKindData);
          }
          $productInfo;

          $maxColumn = 5;
          $currentColumn = 0;

          for($index = 0; $index < count($productInfoArr); $index++){
            $productInfo = $productInfoArr[$index];

            $currentColumn++;
            if($currentColumn == 1) echo "<tr>";
              echo "<td class='productName'>";
              echo "<a href='../controller/mainController.php?control_state=200&productID=" . $productInfo["id"] . "'>";
                echo '<img src='.$productInfo["thumbnail_img_path"].' width="200" height="250">';
              echo "</a>";
              echo "<a href='../controller/mainController.php?control_state=200&productID=" . $productInfo["id"] . "'>" . $productInfo["name"] . "</a>";
            echo "</td>";
            if ($currentColumn == $maxColumn) {
              echo "</tr>";
              $currentColumn = 0;
            }
          }
        ?>
      </table>
    </div>
  </div>


</body>
</html>
