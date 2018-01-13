<?php
  define("LOCAL_MODE", 12039);
  define("HOST_MODE", 18492);

  $mode = LOCAL_MODE;

  $currentPath = getcwd();
  switch($mode){
    case LOCAL_MODE:
      $currentPathArr = explode("\\", $currentPath);
      break;

    case HOST_MODE:
      $currentPathArr = explode("/", $currentPath);
      break;
  }

  $count = 0;
  for($index = (count($currentPathArr)-1); $index >= 0; $index--){
    $currentPathIndex = $currentPathArr[$index];
    $count++;
    if($currentPathIndex == "view"){
      break;
    }
  }

// 현재 임시 방편으로 if문을 이용하여 경로 설정함.
// 원래는 반복문 이용하여 더욱 유동적으로 작성해야함. 2018-01-13
  if( $count == 1 ){
    $homePath = "./mainView.php";
  }
  else if( $count == 2 ){
    $homePath = "../mainView.php";
  }
  else if( $count == 3 ){
    $homePath = "../../mainView.php";
  }
 ?>

<div id="mainLogoWrap">
  <div id="mainLogo">
    <?php
      echo '<a href="'.$homePath.'">';
     ?>
      <h1>기맴준의 쇼핑몰</h1></a>
  </div>
</div>
