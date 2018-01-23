<?php
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
