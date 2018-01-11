<?php

  $mysql_hostname = 'localhost';
  $mysql_username = 'root';
  $mysql_password = '1234';
  $mysql_db = 'shopping_db';
  $mysql_port = '3306';
  $mysql_charset = 'utf8';

  $mysql_connect = mysqli_connect($mysql_hostname, $mysql_username, $mysql_password, $mysql_db);
  mysqli_query($mysql_connect, "set names utf8");

  // echo "result : ";
  // print_r($mysql_result);
  //
  // $count = 0;
  // while($row = mysqli_fetch_assoc($mysql_result)){
  //
  //   console("쿼리 " . $count . "번");
  //   $count++;
  //   echo "<br>";
  //   print_r($row);
  //   console("id : " . $row["id"]);
  //   console("name : " . $row["name"]);
  //   console("price : " . $row["price"]);
  //   console("kind : " . $row["kind"]);
  //   console("thumbnail_path : " . $row["thumbnail_path"]);
  //   console("image_path : " . $row["image_path"]);
  //   console("-------------------------------------");
  // }
 ?>
