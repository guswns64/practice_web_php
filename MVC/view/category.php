<?php
  include_once "../model/getCategoryList.php";
  $categoryArr = getCategoryObj();
  echo '<nav id="categoriMenu">';
  echo '<ul>';
  for($index = 0; $index < count($categoryArr); $index++){
    $categoryObj = $categoryArr[$index];

    $mainCategory = $categoryObj[0];

    echo '<li class="menuLink">';
    echo '<a href="productListView.php?productKind='.$mainCategory["key"].'" class="link">'.$mainCategory["value"].'</a>';
    echo '<ul class="subMenu">';
    $subCategoryArr = $categoryObj[1];
    for($subIndex = 0; $subIndex < count($subCategoryArr); $subIndex++){
      $subCategoryObj = $subCategoryArr[$subIndex];

      echo '<li><a href="productListView.php?productKind='.$subCategoryObj["key"].'&isSubKind=true" class="subLink">'.$subCategoryObj["value"].'</a></li>';
    }
    echo '</ul>';

    echo '</li>';

  }
  echo '</ul>';
  echo '</nav>';

 ?>
