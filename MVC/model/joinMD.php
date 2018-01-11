<?php
  include_once "../../debugDir/debug.php";
  include_once "mysqlConnectMD.php";

  $user_name = $_POST["user_name"];
  $user_id = $_POST["user_id"];
  $user_pass = $_POST["user_pass"];
  $user_birth = $_POST["user_birth"];
  $user_sex = $_POST["user_sex"];
  $user_zipcode = $_POST["user_zipcode"];
  $user_address = $_POST["user_address"];
  $user_detail_address = $_POST["user_detail_address"];
  $user_contact_number = $_POST["user_contact_number"];
  $user_email = $_POST["user_email"];
  $user_phone_number = $_POST["user_phone_number"];

  insertDB($mysql_connect, $user_name, $user_id, $user_pass, $user_birth, $user_sex, $user_zipcode, $user_address, $user_detail_address, $user_contact_number, $user_email, $user_phone_number);

  function insertDB($mysql_connect, $user_name, $user_id, $user_pass, $user_birth, $user_sex, $user_zipcode, $user_address, $user_detail_address, $user_contact_number, $user_email, $user_phone_number){

    $mysql_query = "insert into account_info (name, id, pw, birth, sex, zipcode, address, detail_address, contact_number, email, phone_number) values ('$user_name','$user_id','$user_pass','$user_birth','$user_sex','$user_zipcode','$user_address','$user_detail_address','$user_contact_number','$user_email','$user_phone_number')";


    if(mysqli_query($mysql_connect, $mysql_query) == true){
      console("db입력 완료!");
    }
    else{
      console("db입력 실패!");
      mysqli_error($mysql_connect);
    }
    mysqli_close($mysql_connect);
  }

 ?>
