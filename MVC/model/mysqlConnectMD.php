<?php

  define("LOCAL_MODE", 12039);
  define("HOST_MODE", 18492);

  $mode = LOCAL_MODE;

  switch($mode){
    case LOCAL_MODE:
      $mysql_hostname = 'localhost';
      $mysql_username = 'root';
      $mysql_password = '1234';
      $mysql_db = 'shopping_db';
      break;

    case HOST_MODE:
      $mysql_hostname = 'localhost';
      $mysql_username = 'c197guswns64';
      $mysql_password = 'qwerwert';
      $mysql_db = 'c197shopping_db';
      break;
  }

  $mysql_port = '3306';
  $mysql_charset = 'utf8';

  $mysql_connect = mysqli_connect($mysql_hostname, $mysql_username, $mysql_password, $mysql_db);
  mysqli_query($mysql_connect, "set names utf8");

 ?>
