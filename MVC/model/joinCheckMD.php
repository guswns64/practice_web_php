<?php
  include_once "mysqlConnectMD.php";

  // 아이디 값이 들어왔을 경우
  if( isset($_POST["join_id"]) ){
    $joinID = $_POST["join_id"];
    checkOverlapID();
  }
  // 이메일 값이 들어왔을 경우
  else if( isset($_POST["join_email"]) ){
    $joinEmail = $_POST["join_email"];
    checkOverlapEmail();
  }

  // ID 중복여부 체크
  function checkOverlapID(){
    global $joinID;
    $mysql_query = "select id from account_info where id = '$joinID'";
    $mysql_result = mysqli_query($GLOBALS['mysql_connect'], $mysql_query);
    $query_num = mysqli_num_rows($mysql_result);
    if( $query_num == 1 ){
      echo json_encode(array('isCheckOverlap' => false, 'callbackMessage' => "중복되는 아이디입니다."));
      return;
    }
    else{
      echo json_encode(array('isCheckOverlap' => true, 'callbackMessage' => "사용할 수 있는 아이디입니다."));
      return;
    }
  }

  // 이메일 중복옂부 체크
  function checkOverlapEmail(){
    global $joinEmail;
    $mysql_query = "select email from account_info where email = '$joinEmail'";
    $mysql_result = mysqli_query($GLOBALS['mysql_connect'], $mysql_query);
    $query_num = mysqli_num_rows($mysql_result);
    if( $query_num == 1 ){
      echo json_encode(array('isCheckOverlap' => false, 'callbackMessage' => "중복되는 이메일입니다."));
      return;
    }
    else{
      echo json_encode(array('isCheckOverlap' => true, 'callbackMessage' => "사용할 수 있는 이메일입니다."));
      return;
    }
  }


 ?>
