<!DOCTYPE html>
<html>
  <head lang="en">
    <meta charset="utf-8">
    <link rel = "stylesheet" type = "text/css" href = "../../css/mainLogo.css">
    <link rel = "stylesheet" type = "text/css" href = "../../css/productCategori.css">
    <link rel = "stylesheet" type = "text/css" href = "../../css/joinView.css">
    <title>회원가입 완료</title>

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script src="//d1p7wdleee1q2z.cloudfront.net/post/search.min.js"></script>
    <script type="text/javascript">
      $(document).ready(function() {

        $("#homeBtn").click(function(){
          var url = "./mainView.php";
          $(location).attr('href',url);

        });
      });
    </script>
  </head>
  <body>
    <?php
      include_once "mainLogo.php";
     ?>
    <nav>
      <div align="center">
        <?php
          include_once "category.php";
         ?>
     </div>
    </nav>

    <div id="wrap">



      <script type="text/javascript">
      </script>


      <div style="margin: 100px;" class = "contentCenter">
        <h2>회원가입이 완료되었습니다.</h2>
        <h2>
          <?php
              function consoleLog($data_val){
                echo ("<script>console.log('".$data_val."');</script>");
              }

              if(isset($_POST['joinName'])){
                $joinName = $_POST['joinName'];
                consoleLog("이름은 : ");
                consoleLog($joinName);
              }

          ?>
          id는 <?php echo '"' . $joinName . '"'; ?>입니다.
        </h2>
      </div>




        <div class="contentCenter">
          <input id="homeBtn" type="button" value="홈페이지">
        </div>
      </form>


    </div>

  </body>
</html>
