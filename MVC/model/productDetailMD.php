<?php
  include_once "../../debugDir/debug.php";
  include_once "mysqlConnectMD.php";

  // 상품 세부 정보를 불러오기
  function getProductDetailInfo(){
    $productID = $_GET["productID"];

    $mysql_query = "select * from product_info where id = " . $productID;
    $mysql_result = mysqli_query($GLOBALS['mysql_connect'], $mysql_query);

    $row = mysqli_fetch_assoc($mysql_result);

    $productInfoObj["id"] = $row["id"];
    $productInfoObj["name"] = $row["name"];
    $productInfoObj["price"] = $row["price"];
    $productInfoObj["kind"] = $row["kind"];
    $productInfoObj["subThumbnailImgPathArr"] = getSubThumbnailImgs($row["id"]);
    $productInfoObj["detailContent"] = $row["contentText"];

    return $productInfoObj;
  }

  function getSubThumbnailImgs($productID){
    $subThumbnail_dir_path = "../../img/" . $productID . "/thumbnail_imgs";

    $product_sub_thumbnail_arr = Array();

    $dir_handle = opendir($subThumbnail_dir_path);
    while( ($file = readdir($dir_handle)) !== false){
      if($file == "." || $file == ".."){
        continue;
      }
      else{
        $fileNameArr = explode(".", $file);
        $fileName = $fileNameArr[0];
        $search_word = "sub_thumbnail_";
        $result = strpos($fileName, $search_word);
        if( strpos($fileName, $search_word) !== false ){
          $thumbnail_img = $file;
          $subThumbnail_path = "../../img/".$productID."/thumbnail_imgs/".$thumbnail_img;
          array_push($product_sub_thumbnail_arr, $subThumbnail_path);
        }
      }
    }

    return $product_sub_thumbnail_arr;
  }



?>
