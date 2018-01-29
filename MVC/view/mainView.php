<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no">
    <link rel = "stylesheet" type = "text/css" href = "../../css/mainView.css?ver=1.00006">
    <link rel = "stylesheet" type = "text/css" href = "../../css/loginView.css?ver=1.00001">
    <link rel = "stylesheet" type = "text/css" href = "../../css/mainLogo.css?ver=1.0002">
    <link rel = "stylesheet" type = "text/css" href = "../../css/productCategory.css?ver=1.00003">
    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <script src="../../js/productCategory.js"></script>
    <script src="../../js/jquery.cookie.js"></script>
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
    <div id="leftContent">
      leftContent
      Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh. Donec sodales sagittis magna. Sed consequat, leo eget bibendum sodales, augue velit cursus nunc,
    </div>
    <div id="centerContent">
      <table width="300">
        <?php
          include_once "../model/getProductListMD.php";
          $productInfoArr = getProductListData();
          if( $productInfoArr == null ){
            $maxColumn = 3;
            $currentColumn = 0;

            for($index = 0; $index < 3; $index++){
              $currentColumn++;
              if($currentColumn == 1) echo "<tr>";
                echo "<td class='productName'>";
                echo "<a href='#'>";
                  echo '<img src="../../gif/loading7.gif" width="200" height="250">';
                echo "</a>";
                echo "<a href='#'>없음</a>";
              echo "</td>";
              if ($currentColumn == $maxColumn) {
                echo "</tr>";
                $currentColumn = 0;
              }
            }

          }
          else{
            $productInfo;

            $maxColumn = 3;
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
          }

        ?>
      </table>
    </div>
    <div id="rightContent">
      <?php
        include_once "./loginView.php";
       ?>
       rightContent
       Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh. Donec sodales sagittis magna. Sed consequat, leo eget bibendum sodales, augue velit cursus nunc,
    </div>
  </div>


</body>
</html>
