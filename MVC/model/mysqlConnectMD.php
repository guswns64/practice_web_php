<?php

  $local_mode = "localMode";
  $host_mode = "hostMode";

  $mode = $local_mode;

  switch($mode){
    case $local_mode:
      $mysql_hostname = 'localhost';
      $mysql_username = 'root';
      $mysql_password = '123456';
      $mysql_db = 'c197shopping_db';
      break;

    case $host_mode:
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
