<!DOCTYPE html>

<?php
  include_once "../../debugDir/debug.php";
  include_once "mysqlConnectMD.php";

  // 상품 고유 ID
  $productID = 0;

  // 섬네일 이미지, 컨텐츠 이미지가 들어갈 디렉토리 경로
  $product_thumbnail_dir_path;
  $product_contentImgs_dir_path;

  $contentHTML = $_POST["productDetailContent"];

  getProductID();
  createProductDirectory();
  uploadThumbnailImg();
  uploadContentImg();
  changeImgPathProductContent();
  insertIntoDB();

  // 상품 고유 ID 얻기
  function getProductID(){
    global $mysql_connect, $mysql_query, $productID;
    $mysql_query = "SELECT id from product_info ORDER BY id desc LIMIT 1";
    $mysql_result = mysqli_query($mysql_connect, $mysql_query);
    $row = mysqli_fetch_assoc($mysql_result);
    $row_id = $row["id"]; // 고유한 ID값에서 가장 큰 값을 가져오고
    $productID = $row_id + 1; // ID값에 1을 더한 값이 이번에 만들 상품 ID값이다.
    $productID = sprintf("%010d", $productID); // 그리고 ID 값에 10자리 수에 맞춰서 앞에 0을 붙인다.
    mysqli_free_result($mysql_result);
  }

  // 상품과 관련된 디렉토리 생성
  function createProductDirectory(){
    global $productID, $product_thumbnail_dir_path, $product_contentImgs_dir_path;
    $product_id_dir_path = "../../img/" . $productID;
    $product_thumbnail_dir_path = $product_id_dir_path . "/thumbnail_imgs";
    $product_contentImgs_dir_path = $product_id_dir_path . "/content_imgs";

    if( !is_dir($product_id_dir_path) ) mkdir($product_id_dir_path, 0755);
    if( !is_dir($product_thumbnail_dir_path) ) mkdir($product_thumbnail_dir_path, 0755);
    if( !is_dir($product_contentImgs_dir_path) ) mkdir($product_contentImgs_dir_path, 0755);
  }

  // 상품 관련 이미지 넣기
  function uploadThumbnailImg(){
    global $product_thumbnail_dir_path, $product_contentImgs_dir_path;

    $mainThumbnailImg = $_FILES["mainThumbnailImg"];
    $img_extension = getImgExtension( basename($mainThumbnailImg["name"]) );
    $target_mainThumbnail_file = $product_thumbnail_dir_path . "/main_thumbnail." . $img_extension;

    // 메인 섬네일 이미지 업로드
    if(move_uploaded_file($mainThumbnailImg["tmp_name"], $target_mainThumbnail_file)){
      console("The file " . basename( $mainThumbnailImg["name"] ) . "업로드 성공.");
      echo "이미지 업로드를 성공하였습니다.<br>";
    }

    // 서브 섬네일 이미지 업로드
    $thumbnail_count = $_POST["thumbnailImg_count"];
    for($index = 0; $index < $thumbnail_count; $index++){
      $image_id = "subThumbnailImgs_" . $index;
      $subThumbnailImg = $_FILES[$image_id];
      $target_subThumbnail_file = $product_thumbnail_dir_path."/sub_thumbnail_".$index.".".$img_extension;

      if(move_uploaded_file($subThumbnailImg["tmp_name"], $target_subThumbnail_file)){
        console("The file " . basename( $subThumbnailImg["name"] ) . "업로드 성공.");
        echo "이미지 업로드를 성공하였습니다.<br>";
      }
    }
  }

  // 이미지 확장자 가져오기
  function getImgExtension($targetImgName){
    $img_extension = substr(strrchr($targetImgName,"."),1);
    $img_extension = strtolower($img_extension);
    return $img_extension;
  }

  // 상품 세부 내용에 들어갈 이미지 업로드
  function uploadContentImg(){
    global $product_contentImgs_dir_path, $contentHTML;
    preg_match_all('/src=\"(.[^"]+)"/i', $contentHTML, $value);
    echo "<pre>";
    print_r($value[1]);
    echo "</pre>";

    for($index = 0; $index < count($value[1]); $index++){
      $imgSrc = $value[1][$index];
      $imgStrArr = explode("/", $imgSrc);
      $imgStrName = $imgStrArr[count($imgStrArr)-1];
      $imgOldFile = "../../api/smarteditor2-master/tmpImgUpload/" . $imgStrName;
      $imgNewFile = $product_contentImgs_dir_path . "/" . $imgStrName;
      fileMove($imgOldFile, $imgNewFile);
    }
  }

  // 파일 이동 메소드
  function fileMove($oldfile, $newfile){
    if(file_exists($oldfile)) {
      echo "fileExist! <br>";
    }
    else{
      echo "file not exist.<br>";
    }

    if(file_exists($oldfile)) {
        if(!copy($oldfile, $newfile)) {
              echo "파일 복사 실패<br>";
        } else if(file_exists($newfile)) {
              echo "파일 복사 성공<br>";
              if(unlink($oldfile)){
                echo "이전 파일 삭제<br>";
              }
        }
    }
    else{
      echo "파일이 존재하지 않습니다<br>";
      echo "oldfile : " . $oldfile . "<br>";
    }
  }

  // 상품 컨텐츠 내부의 이미지 경로 변경
  function changeImgPathProductContent(){
    global $product_contentImgs_dir_path, $contentHTML;
    preg_match_all('/src=\"(.[^"]+)"/i', $contentHTML, $value);

    for($index = 0; $index < count($value[1]); $index++){
      $imgSrc = $value[1][$index];
      $imgStrArr = explode("/", $imgSrc);
      $imgStrName = $imgStrArr[count($imgStrArr)-1];
      $change_img_path = $product_contentImgs_dir_path . "/" . $imgStrName;
      $contentHTML = str_replace($imgSrc, $change_img_path, $contentHTML);
    }
  }

  // 상품 DB 등록
  function insertIntoDB(){
    global $mysql_connect, $productID, $contentHTML;
    $productName = $_POST['productName'];
    $productPrice = $_POST['productPrice'];
    $productKind = $_POST['productKind'];
    $productSubKind = $_POST['productSubKind'];
    $mysql_query = "insert into product_info (id, name, price, kind, sub_kind, contentText) values ('$productID','$productName','$productPrice','$productKind','$productSubKind','$contentHTML')";
    // console("mysql_query : " . $mysql_query);
    if(mysqli_query($mysql_connect, $mysql_query) == true){
      console("db입력 완료!");
    }
    else{
      console("db입력 실패!");
    }
  }

  ?>
