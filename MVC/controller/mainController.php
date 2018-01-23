<?php

  include_once "../../debugDir/debug.php";

  define("STATE_MAIN_HOME", 100);
  define("STATE_JOIN", 120);
  define("STATE_LOGIN", 140);
  define("STATE_DETAIL_PRODUCT", 200);
  define("STATE_MANAGEMENT", 300);
  define("STATE_PRODUCT_LIST", 305);
  define("STATE_INSERT_PRODUCT", 310);
  define("STATE_USER_LIST", 320);
  define("STATE_COMMENT_LIST", 330);

  $control_state = $_GET['control_state'];
  // 이동할 페이지
  $moveURL = "";

  startControll();

  function startControll(){
    if( issetState() == false ){
      console("mainController : state값이 존재하지 않습니다");
      return;
    }
    setPage();
    movePage();
  }

  // state 값 존재 여부 파악
  function issetState(){
    global $control_state;
    if( empty($control_state) || $control_state == null ){
      console("null variable - control_state");
      return false;
    }
    else{
      console("control_state is be exist!");
      console("control_state : ");
      console($control_state);
      return true;
    }
  }

  // 이동할 페이지 설정
  function setPage(){
    global $control_state, $moveURL;
    switch($control_state){
      case STATE_MAIN_HOME:
        console("메인 홈으로 이동합니다.");
        $moveURL = "Location:../view/mainView.php";
        break;

      case STATE_JOIN:
        console("회원가입 페이지로 이동합니다.");
        $moveURL = "Location:../view/joinView.php";
        break;

      case STATE_DETAIL_PRODUCT:
        console("상품 세부 정보 페이지로 이동합니다.");
        $moveURL = "Location:../view/productDetail.php?productID=" . $_GET['productID'];
        break;

      case STATE_MANAGEMENT:
        console("관리자 페이지로 이동합니다.");
        $moveURL = "Location:../view/manageDir/mainManageView.php";
        break;

      case STATE_PRODUCT_LIST:
        console("상품 목록 페이지로 이동합니다");
        $moveURL = "Location:../view/manageDir/manageProductList.php";
        break;

      case STATE_INSERT_PRODUCT:
        console("상품 등록 페이지로 이동합니다");
        $moveURL = "Location:../view/manageDir/manageInsertProduct.php";
        break;

      case STATE_USER_LIST:
        console("유저 목록 페이지로 이동합니다.");
        $moveURL = "Location:../view/manageDir/manageUserList.php";
        break;

      case STATE_COMMENT_LIST:
        console("댓글 목록 페이지로 이동합니다");
        $moveURL = "Location:../view/manageDir/manageCommentList.php";
        break;

    }
  }

  // 페이지 이동
  function movePage(){
    global $moveURL;
    if( empty($moveURL) == true || $moveURL == null ){
      echo "<script>alert('홈페이지 접속에 에러가 났습니다. 다시 시도해주세요')</script>";
      console("moveURL : ");
      console($moveURL);
      echo "<script>";
      echo "window.history.back();";
      echo "</script>";
    }
    else{
      Header($moveURL);
    }
  }








 ?>
