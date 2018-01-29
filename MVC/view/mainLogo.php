
<?php
  $currentPath = getcwd();
  $currentPath = str_replace("\\","/",$currentPath);
  $currentPathArr = explode("/", $currentPath);

  //상위 폴더로 올라가게 하는 경로
  $ascendPath = "";
  for($index = (count($currentPathArr)-1); $index >= 0; $index--){
    $currentPathIndex = $currentPathArr[$index];
    if($currentPathIndex == "MVC"){
      break;
    }
    else{
      $ascendPath = $ascendPath . "../";
    }
  }
  $homePath = "controller/mainController.php?control_state=100";
  $homePath = $ascendPath . $homePath;
 ?>

<div id="mainLogoWrap">
  <div id="mainLogo">
    <?php
      echo '<a href="'.$homePath.'">';
     ?>
      <h1>테스트 쇼핑몰</h1></a>
  </div>
</div>
