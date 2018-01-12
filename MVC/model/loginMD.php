<?php
  // include_once "../../debugDir/debug.php";
  include_once "mysqlConnectMD.php";

  $login_id = $_POST["login_id"];
  $login_pw = $_POST["login_pw"];
  $db_ID;
  $db_PW;
  $isLogin = false;
  $isAdmin = false;
  $callback_message = "";
  startCheckLogin();

  // 로그인 시도 시작
  function startCheckLogin(){
    global $isLogin, $isAdmin, $callback_message;

    if(isInputText() == false){
      $callback_message = "아이디, 비밀번호 값을 넣어주세요.";
      echo json_encode(array('isLoginSuccess' => $isLogin, 'isAdmin' => $isAdmin, 'callbackMessage' => $callback_message));
      return;
    }
    if(isExistID() == false){
      $callback_message = "아이디, 비밀번호 값을 넣어주세요.";
      echo json_encode(array('isLoginSuccess' => $isLogin, 'isAdmin' => $isAdmin, 'callbackMessage' => $callback_message));
      return;
    }
    if(isConfirmPass() == false){
      $callback_message = "아이디 또는 비밀번호가 틀렸습니다.";
      echo json_encode(array('isLoginSuccess' => $isLogin, 'isAdmin' => $isAdmin, 'callbackMessage' => $callback_message));
      return;
    }
    else{
      $callback_message = "로그인 성공.";
      $isLogin = true;
      setLoginSession();
      echo json_encode(array('isLoginSuccess' => $isLogin, 'isAdmin' => $isAdmin, 'callbackMessage' => $callback_message));
    }
  }

  // ID 값과 PW 값 입력 여부 확인
  function isInputText(){
    global $login_id, $login_pw;

    if( $login_id == null || $login_id == "" || $login_pw == null || $login_pw == ""){
      // 입력이 되어있지 않습니다.
      return false;
    }
    else{
      return true;
    }
  }

  // ID가 존재하는지 확인
  function isExistID(){
    global $login_id, $isAdmin, $db_ID, $db_PW;

    $mysql_query = "select id, pw, isAdmin from account_info where id = '$login_id'";
    $mysql_result = mysqli_query($GLOBALS['mysql_connect'], $mysql_query);
    $query_num = mysqli_num_rows($mysql_result);
    if($query_num == 1){
      $row = mysqli_fetch_assoc($mysql_result);
      $db_ID = $row["id"];
      $db_PW = $row["pw"];
      $isAdmin = $row["isAdmin"];
      return true;
    }
    else{
      return false;
    }
  }

  // 비밀번호 체크
  function isConfirmPass(){
    global $login_pw, $db_PW;
    if($login_pw == $db_PW){
      return true;
    }
    else{
      return false;
    }
  }

  // 로그인 관련 세션 세팅
  function setLoginSession(){
    global $login_id, $isAdmin;
    if(!isset($_SESSION)) session_start();
    $_SESSION["userID"] = $login_id;
    $_SESSION["isAdmin"] = $isAdmin;
  }

?>
