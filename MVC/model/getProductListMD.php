<?php
  include_once "../../debugDir/debug.php";
  include_once "mysqlConnectMD.php";

  function getProductListData(){
    $mysql_query = "select * from product_info";
    $mysql_result = mysqli_query($GLOBALS['mysql_connect'], $mysql_query);

    $destinationAscendPath = getDestinationPath("MVC");
    $destinationAscendPath = "../" . $destinationAscendPath;

    $productArr = Array();
    while($row = mysqli_fetch_assoc($mysql_result)){

      $productId = $row["id"];
      $productName = $row["name"];
      $productKind = $row["kind"];
      $productPrice = $row["price"];
      $thumbnail_img;
      $thumbnail_dir_path = $destinationAscendPath . "img/" . $productId . "/thumbnail_imgs";
      $thumbnail_img_path;

      $dir_handle = opendir($thumbnail_dir_path);
      while( ($file = readdir($dir_handle)) !== false){
        if($file == "." || $file == ".."){
          continue;
        }
        else{
          $fileNameArr = explode(".", $file);
          $fileName = $fileNameArr[0];
          if($fileName == "main_thumbnail"){
            $thumbnail_img = $file;
            break;
          }
        }
      }
      // $thumbnail_img_path = "../../img/".$productId."/thumbnail/".$thumbnail_img;
      $thumbnail_img_path = $thumbnail_dir_path . "/" .$thumbnail_img;

      $productObj["id"] = $productId;
      $productObj["name"] = $productName;
      $productObj["kind"] = $productKind;
      $productObj["price"] = $productPrice;
      $productObj["thumbnail_img_path"] = $thumbnail_img_path;
      array_push($productArr, $productObj);

      closedir($dir_handle);

    }
    return $productArr;
  }

  // 상위에 있는 목표 경로로 접근시 그에 걸맞는 "../" 정보를 반환해주는 함수이다.
  function getDestinationPath($destinationFolder){
    $currentPath = getcwd();
    $currentPath = str_replace("\\","/",$currentPath);
    $currentPathArr = explode("/", $currentPath);

    //상위 폴더로 올라가게 하는 경로, "../" 값을 계산하여 넣는다.
    $ascendPath = "";
    for($index = (count($currentPathArr)-1); $index >= 0; $index--){
      $currentPathIndex = $currentPathArr[$index];
      if($currentPathIndex == $destinationFolder){
        break;
      }
      else{
        $ascendPath = $ascendPath . "../";
      }
    }

    return $ascendPath;
  }



?>
