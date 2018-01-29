<?php
  include_once "mysqlConnectMD.php";

  // 카테고리 데이터 얻기
  function getCategoryObj(){
    $categoryArr = getMainCategoryList();
    return $categoryArr;
  }

  // 카테고리 데이터 출력
  function printCategoryObj(){
    echo "메인과 서브---배열 구조 바꿈S<br>";
    $categoryArr = getMainCategoryList();

    for($index = 0; $index < count($categoryArr); $index++){
      $categoryObj = $categoryArr[$index];

      $mainCategory = $categoryObj[0];
      $subCategoryArr = $categoryObj[1];
      echo "--------------------------------------------------";
      echo "<br>";
      echo "mainCategory info";
      echo "<br>";
      echo "main key : " . $mainCategory["key"];
      echo "<br>";
      echo "main order_num : " . $mainCategory["order_num"];
      echo "<br>";
      echo "main value : " . $mainCategory["value"];
      echo "<br>";

      for($subIndex = 0; $subIndex < count($subCategoryArr); $subIndex++){
        $subCategoryObj = $subCategoryArr[$subIndex];
        echo "subCategory info";
        echo "<br>";
        echo "sub key : " . $subCategoryObj["key"];
        echo "<br>";
        echo "sub value : " . $subCategoryObj["value"];
        echo "<br>";
      }

      echo "--------------------------------------------------";
      echo "<br>";
    }
  }

  // 메인 카테고리 가져오기
  function getMainCategoryList(){
    $mysql_query = "SELECT * from product_category ORDER BY order_num ASC";

    $mysql_result = mysqli_query($GLOBALS['mysql_connect'], $mysql_query);

    // 각각의 메인 카테리와 그에 따른 서브 카테고리를 저장하고 있는 변수
    $categoryObjArr = Array();

    while($row = mysqli_fetch_assoc($mysql_result)){

      $mainCategoryObj["key"] = $row["main_category"];
      $mainCategoryObj["order_num"] = $row["order_num"];
      $mainCategoryObj["value"] = $row["value"];

      $subCategoryArr = getSubCategoryList($row["main_category"]);

      // 카테고리 첫번째 요소에 메인 카테고리를 넣는다
      // 변수 두번째 요소에 메인 카테고리에 연결된 서브 카테고리를 넣는다.
      $categoryObj = Array();
      $categoryObj[0] = $mainCategoryObj;
      $categoryObj[1] = $subCategoryArr;

      array_push($categoryObjArr, $categoryObj);

    }
    return $categoryObjArr;
  }

  // 메인에 따른 서브 카테고리 가져오기
  function getSubCategoryList($main_primary){
    $mysql_query = "select * from product_sub_category WHERE main_category = '$main_primary'";

    $mysql_result = mysqli_query($GLOBALS['mysql_connect'], $mysql_query);
    $subCategoryArr = Array();
    while($row = mysqli_fetch_assoc($mysql_result)){

      $category_primary = $row["sub_category"];
      $category_value = $row["value"];

      $sub_categoryObj["key"] = $category_primary;
      $sub_categoryObj["value"] = $category_value;
      array_push($subCategoryArr, $sub_categoryObj);

    }

    return $subCategoryArr;

  }

?>
