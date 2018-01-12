<!DOCTYPE html>
<html>
  <head lang="en">
    <meta charset="utf-8">
    <link rel = "stylesheet" type = "text/css" href = "../../css/mainLogo.css?ver=1.0002">
    <link rel = "stylesheet" type = "text/css" href = "../../css/productCategori.css">
    <link rel = "stylesheet" type = "text/css" href = "../../css/joinView.css?ver=1.0002">
    <title>회원가입</title>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script src="//d1p7wdleee1q2z.cloudfront.net/post/search.min.js"></script>
    <script src="../../js/joinView.js?ver=1.1"></script>
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

      <div id="provision">
        <ol>
          <li><span class="textDeco">1. 약관 동의 및 회원정보 입력</span>
            <br>약관 동의 및 회원정보를 입력해주세요.</li>
          <li><span class="textDeco">2. 회원가입 완료</span>
            <br>회원가입이 완료되었습니다.</li>
        </ol>
      </div>

      <h3>약관 동의</h3>
      <div class="contentCenter">
        <textarea id="provisionContent" readonly="readonly">
        <?php include_once "./provisionContent.php" ?></textarea>
      </div>
      <!-- 약관동의 버튼 -->
      <div class="contentCenter">
        <input type="radio" name="chk_provision" value="accept">약관에 동의합니다.
        <input type="radio" name="chk_provision" value="reject" checked="checked">약관에 동의하지않습니다.
      </div>

        <h3><span style="color:blue;">[필수]</span>개인정보 수집*이용</h3>
        <div class="contentCenter">
          <table class="provisionTable">
            <tr>
              <th>목적</th>
              <th>항목</th>
              <th>보유기간</th>
              <th>동의여부</th>
            </tr>
            <tr>
              <td>회원제 서비스 이용 / 본인확인</td>
              <td>이름, 아이디, 비밀번호, 생일, 성별, 이메일, 주소, 연락처, 휴대폰</td>
              <td>회원탈퇴 후 5일까지</td>
              <td rowspan="9">
                <div class="provisionTableRadioBtn">
                  <input type="radio" name="chk_provision_table" value="accept">동의함.
                  <input type="radio" name="chk_provision_table" value="reject" checked="checked">동의안함.
                </div>
            </td>
            </tr>
            <tr>
              <td>불량회원 부정이용 방지</td>
              <td>아이디, 비밀번호</td>
              <td>이용해지일로부터 1년</td>
            </tr>
            <tr>
              <td>본인확인 및 고객문의, 응대</td>
              <td>이름,아이디,휴대폰 번호</td>
              <td>회원탈퇴 후 5일까지</td>
            </tr>
            <tr>
              <td>CJ 대한통운</td>
              <td>상품 배송 업무 및 배송위치 / 도착정보 등의 서비스 제공</td>
              <td>회원탈퇴 후 5일까지</td>
            </tr>
            <tr>
              <td>㈜코리아센터닷컴</td>
              <td>고객정보DB시스템 위탁운영(전산아웃소싱)</td>
              <td>회원탈퇴 후 5일까지</td>
            </tr>
            <tr>
              <td>서울신용평가정보㈜</td>
              <td>본인인증</td>
              <td>회원탈퇴 후 5일까지</td>
            </tr>
            <tr>
              <td>LG유플러스</td>
              <td>결제관련,휴대폰 번호</td>
              <td>회원탈퇴 후 5일까지</td>
            </tr>
            <tr>
              <td>다날</td>
              <td>결제관련</td>
              <td>회원탈퇴 후 5일까지</td>
            </tr>
            <tr>
              <td>이니시스</td>
              <td>결제관련</td>
              <td>회원탈퇴 후 5일까지</td>
            </tr>
          </table>
        </div>

      <form class="" action="#" method="post">

        <h3><span style="color:blue;">[선택]</span>개인정보 수집*이용</h3>
        <div class="contentCenter">
          <table class="provisionTable">
            <tr>
              <th>목적</th>
              <th>항목</th>
              <th>보유기간</th>
              <th>동의여부</th>
            </tr>
            <tr>
              <td>마케팅 활용(이벤트, 맞춤형 광고)</td>
              <td>휴대폰, 이메일, 쿠키정보</td>
              <td>회원탈퇴 후 5일까지</td>
              <td>
                <div class="provisionTableRadioBtn">
                  <input type="radio" name="chk_provision_table_choice" value="accept">동의함.
                  <input type="radio" name="chk_provision_table_choice" value="reject" checked="checked">동의안함.
                </div>
              </td>
            </tr>
          </table>
        </div>

        <h3><span style="color:blue;">[선택]</span>광고성 정보 수신</h3>
        <div class="contentCenter">
          <table class="provisionTable">
            <tr>
              <th>광고성 정보 수신 동의</th>
              <td>
                <div class="provisionTableRadioBtn">
                  <input type="radio" name="chk_provision_table_choice_advertisement" value="accept">동의함.
                  <input type="radio" name="chk_provision_table_choice_advertisement" value="reject" checked="checked">동의안함.
                </div>
              </td>
            </tr>
          </table>
        </div>

        <h3>회원정보입력</h3>
        <div>
          <table id="joinTable">
            <tr>
              <td><span style="color:red">* </span>이름</td>
              <td><input id="joinName" type="text" name="" value=""></td>
            </tr>
            <tr>
              <td><span style="color:red">* </span>아이디</td>
              <td><input id="joinID" type="text" name="" value="">
                <button type="button" id="joinIDBtn">중복확인</button>
            </td>
            </tr>
            <tr>
              <td><span style="color:red">* </span>비밀번호</td>
              <td><input id="joinPassword" type="password" name="" value="">
              <span style="font-size:12px; color:red;"> * 영문 대소문자/숫자/특수문자를 혼용하여 2종류 10~16자 또는 3종류 8~16자</span></td>
            </tr>
            <tr>
              <td><span style="color:red">* </span>비밀번호 확인</td>
              <td><input id="joinRePassword" type="password" name="" value=""></td>
            </tr>
            <tr>
              <td><span style="color:red">* </span>생일/성별</td>
              <td id="birth_sex">
                <script type="text/javascript">
                  var inputHTML = "<select id='joinBirthYear' name='joinBirthYear'>";
                  var currentYear = new Date().getFullYear();
                  var oldYear = currentYear - 100;
                  for(var index = oldYear; index <= currentYear; index++){
                    if(index === (1990)){
                      inputHTML += "<option selected value='"+index+"'>"+index+"</option>";
                    }
                    else{
                      inputHTML += "<option value='"+index+"'>"+index+"</option>";
                    }
                  }
                  inputHTML += "</select>";
                  $("#birth_sex").append(inputHTML);
                  inputHTML = "년";
                  $("#birth_sex").append(inputHTML);
                </script>
                <select id="joinBirthMonth">
                  <option value='undefined'>선택</option>
                  <option value='01'>1</option>
                  <option value='02'>2</option>
                  <option value='03'>3</option>
                  <option value='04'>4</option>
                  <option value='05'>5</option>
                  <option value='06'>6</option>
                  <option value='07'>7</option>
                  <option value='08'>8</option>
                  <option value='09'>9</option>
                  <option value='10'>10</option>
                  <option value='11'>11</option>
                  <option value='12'>12</option>
                </select>월
                <script type="text/javascript">
                  var optionValue;
                  var inputHTML = "<select id='joinBirthDay'>";
                      inputHTML += "<option value='undefined'>선택</option>";
                  for(var index = 1; index <= 31; index++){
                    if(String(index).length == 1){
                      optionValue = "0" + index;
                    }
                    else{
                    optionValue = index;
                    }
                      inputHTML += "<option value='"+optionValue+"'>"+index+"</option>";
                  }
                  inputHTML += "</select>";
                  $("#birth_sex").append(inputHTML);
                  inputHTML = "일";
                  $("#birth_sex").append(inputHTML);
                </script>
                <input type="radio" id="join_sex" name="join_sex" value="man" class="marginLeft">남성
                <input type="radio" id="join_sex" name="join_sex" value="woman">여성
              </td>
            </tr>
            <tr>
              <td><span style="color:red">* </span>우편번호</td>
              <td>
                <input id="joinZipCode" type="text" name="joinZipCode" class="zipCodeText postcodify_postcode5" readonly="readonly">
                <button type="button" id="zipCodeBtn">우편번호 찾기</button>
              </td>
            </tr>
            <tr>
              <td><span style="color:red">* </span>집주소</td>
              <td><input id="joinAddress"type="text" name="joinAddress" class="postcodify_address" style="width:400px;"></td>
            </tr>
            <tr>
              <td><span style="color:red">* </span>상세주소</td>
              <td><input id="joinDetailAddress" type="text" name="joinDetailAddress" class="postcodify_details" style="width:400px;"></td>
            </tr>
            <tr>
              <td><span style="color:red">* </span>연락처</td>
              <td>
                <select id='joinContactNumber-first' name='joinContactNumber-first' style="display:inline-block; height:22px;">
                  <option value="02">서울 (02)</option>
                  <option value="031">경기 (031)</option>
                  <option value="032">인천 (032)</option>
                  <option value="033">강원 (033)</option>
                  <option value="041">충남 (041)</option>
                  <option value="042">대전 (042)</option>
                  <option value="043">충북 (043)</option>
                  <option value="044">세종 (044)</option>
                  <option value="051">부산 (051)</option>
                  <option value="052">울산 (052)</option>
                  <option value="053">대구 (053)</option>
                  <option value="054">경북 (054)</option>
                  <option value="055">경남 (055)</option>
                  <option value="061">전남 (061)</option>
                  <option value="062">광주 (062)</option>
                  <option value="063">전북 (063)</option>
                  <option value="064">제주 (064)</option>
                  <option value="0502">KT (0502)</option>
                  <option value="0503">온세텔레콤(0503)</option>
                  <option value="0504">온세텔레콤(0504)</option>
                  <option value="0505">Dacom (0505)</option>
                  <option value="070">인터넷전화 (070)</option>
                  <option value="080">착신 과금 서비스 (080)</option>
                </select>
                -
                <input id="joinContactNumber-middle" type="number" name="joinContactNumber-middle" maxlength="3" class="inputNumber">
                -
                <input id="joinContactNumber-last" type="number" name="joinContactNumber-last" maxlength="3" class="inputNumber">
              </td>

            </tr>
            <tr>
              <td><span style="color:red">* </span>이메일</td>
              <td>
                <input id="joinEmail1" type="text" name="joinEmail" style="width:150px;">
                @
                <select id='joinEmail2' name='joinEmail2' style="display:inline-block; height:22px;">
                  <option value="naver.com">naver.com</option>
                  <option value="hotmail.com">hotmail.com</option>
                  <option value="hanmail.net">hanmail.net</option>
                  <option value="yahoo.co.kr">yahoo.co.kr</option>
                  <option value="paran.com">paran.com</option>
                  <option value="nate.com">nate.com</option>
                  <option value="empal.com">empal.c532om</option>
                  <option value="dreamwiz.com">dreamwiz.com</option>
                  <option value="hanafos.com">hanafos.com</option>
                  <option value="korea.com">korea.com</option>
                  <option value="chol.com">chol.com</option>
                  <option value="gmail.com">gmail.com</option>
                  <option value="lycos.co.kr">lycos.co.kr</option>
                  <option value="netian.com">netian.com</option>
                  <option value="hanmir.com">hanmir.com</option>
                  <option value="sayclub.com">sayclub.com</option>
                  <option value="direct">직접입력</option>
                </select>
                <input id="joinEmail3" type="text" name="joinEmail3" style="width:150px;">
                <button type="button" id="joinEmailBtn">중복확인</button>
              </td>

            </tr>
            <tr>
              <td><span style="color:red">* </span>휴대폰</td>
              <td>
                <select id='joinPhoneNumber-first' name='joinPhoneNumber-first' style="display:inline-block; height:22px;">
                  <option value="010">010</option>
                  <option value="011">011</option>
                  <option value="012">012</option>
                  <option value="016">016</option>
                  <option value="017">017</option>
                  <option value="018">018</option>
                  <option value="019">019</option>
                </select>
                -
                <input id="joinPhoneNumber-middle" type="number" name="joinPhoneNumber-middle" maxlength="3" class="inputNumber">
                -
                <input id="joinPhoneNumber-last" type="number" name="joinPhoneNumber-last" maxlength="3" class="inputNumber">
              </td>
            </tr>
            <tr>
              <td>뉴스메일</td>
              <td><input type="radio" name="chk_newMail_accept" value="accept">받습니다.
              <input type="radio" name="chk_newMail_accept" value="reject" checked="checked" class="marginLeft">받지않습니다.</td>
            </tr>
            <tr>
              <td>SMS안내</td>
              <td><input type="radio" name="chk_sms_accept" value="accept" >받습니다.
              <input type="radio" name="chk_sms_accept" value="reject" checked="checked" class="marginLeft">받지않습니다.</td>
            </tr>

          </table>
        </div>

        <div class="contentCenter">
          <input id="joinBtn" type="button" name="joinBtn" value="회원가입">
        </div>

        <div class="">
          <img id="loadingImg" src="../../gif/loading7.gif" alt="HTML5 Icon" width="100" height="100">
          <div id="overlay">
          </div>
        </div>



      </form>


    </div>

  </body>
</html>
