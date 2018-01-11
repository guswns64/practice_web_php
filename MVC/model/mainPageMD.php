<?php
  include_once "../../debugDir/debug.php";
  include_once "mysqlConnectMD.php";

  function getGoodListData(){
    $mysql_query = "select * from product_info";
    $mysql_result = mysqli_query($GLOBALS['mysql_connect'], $mysql_query);

    $productArr = Array();
    while($row = mysqli_fetch_assoc($mysql_result)){

      $productId = $row["id"];
      $productName = $row["name"];
      $thumbnail_img;
      $thumbnail_dir_path = "../../img/" . $productId . "/thumbnail_imgs";
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
      $thumbnail_img_path = "../../img/".$productId."/thumbnail_imgs/".$thumbnail_img;

      $productObj["id"] = $productId;
      $productObj["name"] = $productName;
      $productObj["thumbnail_img_path"] = $thumbnail_img_path;
      array_push($productArr, $productObj);

      closedir($dir_handle);

    }
    return $productArr;
  }



?>
