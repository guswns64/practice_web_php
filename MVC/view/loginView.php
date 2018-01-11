<style>
  .centerContent{
    text-align: center;
  }
  #accountLabel{
    background-color: gray;
    width:230px;
    height:80px;
    padding-top: 20px;
    padding-left: 20px;
    padding-right: 20px;
  }
  #loginPanel{
    margin: 0 0 0 0;
    padding: 0 0 0 0;
  }
  #loginInputText{
    margin: auto;
    float: left;
  }
  #loginBtn{
    margin-top: 3px;
    margin-left: 2px;
    height:42px;
  }
  #joinDiv{
    margin-top: 2px;
  }
  #joinBtn{
    text-decoration: none;
    margin-left: 120px;
  }
  #userPanel{
    display: none;
    margin-top: -5px;
    padding: 0 0 0 0;
  }
  .border{
    border: 1px solid red;
  }
  .userInfoDesign{
    display: inline-block;
    width: 100px;
    border: 1px solid black;
  }
  .userInfoDesign2{
      display: inline-block;
      border: 1px solid black;
      font-size: 14px;
      text-decoration: none;
  }
</style>

<?php
if(!isset($_SESSION)){
  @session_start();
}
?>

<script src="http://code.jquery.com/jquery-latest.js"></script>
<script src="../../js/jquery.cookie.js"></script>
<script type="text/javascript">


  $(document).ready(function() {
    checkIsLogin();

    var state_num;

    $("#loginBtn").click(function(){
      var id_str = $('input[name="id"]').val();
      var pass_str = $('input[name="password"]').val();

      $.ajax({
          url: '../model/loginMD.php',
          type: 'POST',
          dataType: 'json',
          data: {
            "login_id": id_str,
            "login_pw": pass_str,
          },
          success: function(data) {
            var callbackMessage = data.callbackMessage;
            var isLoginSuccess = data.isLoginSuccess;
            // 로그인 성공
            if(isLoginSuccess == true){
              $.cookie("isLogin", true);
              alert(callbackMessage);
            }
            else{
              alert(callbackMessage);
              return;
            }
            moveController(100);
          },
          error: function(){
            alert("연결을 실패했습니다. 다시 시도해주세요.");
          }
      });
    });

/*
    $("#joinBtn").click(function(){
      console.log("회원가입 페이지를 눌렀습니다");
      state_num = 120;
      // moveController();
    });
*/

    $("#logoutBtn").click(function(){
      console.log("로그아웃 버튼을 눌렀습니다");
      $.cookie("isLogin", null);
      <?php
        if( isset($_SESSION["userID"] )){
          session_unset($_SESSION["userID"]);
        }
       ?>
      moveController(100);
    });
  });

  // move controller
  function moveController(stateNum){
    var form = document.createElement("form");
    var objs;

    objs = document.createElement("input");
    objs.setAttribute("type", "hidden");
    form.setAttribute("method", "post");
    form.setAttribute("action", "../controller/mainController.php?control_state=" + stateNum);
    form.appendChild(objs);

    document.body.appendChild(form);
    form.submit();
  }


  function checkIsLogin(){
    var isLogin = $.cookie("isLogin");
    console.log("isLogin : " + isLogin);

    if( isLogin == "true" ){
      console.log("로그인 상태입니다.");
      $("#loginPanel").hide();
      $("#userPanel").show();
    }
    else{
      console.log("로그인 상태가 아닙니다.");
      $("#loginPanel").show();
      $("#userPanel").hide();
    }
  }

</script>

<div id="accountLabel">
  <div id="loginPanel">
    <form action="#" method="get">
      <div id="loginInputText">
        <input type="text" name="id" value=""><br>
        <input type="password" name="password" value="">
      </div>
      <div>
        <button id="loginBtn" type="button">Login</button>
      </div>
    </form>
    <div id="joinDiv">
      <input type="hidden" name="control_state" value=120>
      <a href="./joinView.php?control_state=120" id="joinBtn">회원가입</a>
    </div>
  </div>
  <div id="userPanel" class="border">
    <div class="border centerContent">
      <script type="text/javascript">
      <?php
        if( isset($_SESSION["userID"]) ){
          $userID = $_SESSION["userID"];
        }
        else{
          $userID = "고객";
        }
        echo "document.write('" . $userID . "');";
       ?>
      </script>님 환영합니다.
    </div>
    <div class="border centerContent">
      <div class="userInfoDesign">
        적립금 :
      </div>
      <div class="userInfoDesign">
        10000원
      </div>
    </div>
    <div class="border centerContent">
      <div class="userInfoDesign2">
        <a href="#">마이페이지</a>
      </div>
      <div class="userInfoDesign2">
        <a href="#">내정보수정</a>
      </div>
      <div class="userInfoDesign2">
        <a href="#" id="logoutBtn">로그아웃</a>
      </div>
    </div>
  </div>

</div>
