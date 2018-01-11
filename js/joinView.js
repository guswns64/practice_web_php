$(document).ready(function() {

  $("#joinEmail3").hide();

  var isChkOverlapID = false;
  var isChkOverlapEmail = false;

  // ID값을 변경 시 중복확인 여부 초기화
  $("#joinID").change(function(){
    isChkOverlapID = false;
  });

  // ID 중복확인 버튼 Click
  $("#joinIDBtn").click(function(){
    // 아이디 입력 여부 확인
    var joinIDStr = $("#joinID").val();
    if(joinIDStr == "" || joinIDStr === 0){
      alert("ID를 입력해주세요");
      return;
    }

    $.ajax({
        url: '../model/joinCheckMD.php',
        type: 'POST',
        dataType: 'json',
        data: {
          "join_id": $("#joinID").val()
        },
        success: function(data) {
          var callbackMessage = data.callbackMessage;
          var isCheckOverlap = data.isCheckOverlap;
          // 로그인 성공
          if(isCheckOverlap == true){
            isChkOverlapID = true;
          }
          // 로그인 실패
          else{
            isChkOverlapID = false;
          }
          alert(callbackMessage);
        },
        error: function(){
          alert("연결을 실패했습니다. 다시 시도해주세요.");
        }
    });
  });
  // 우편번호 버튼 Click
  $("#zipCodeBtn").postcodifyPopUp();

  $("#joinEmail1").change(function(){
      isChkOverlapEmail = false;
  });
  $("#joinEmail2").change(function(){
    var emailSelectVal = $("#joinEmail2").val();
    if(emailSelectVal == "direct"){
      $("#joinEmail3").show();
      $("#joinEmail3").val("");
      isChkOverlapEmail = false;
    }
    else{
      $("#joinEmail3").hide();
    }
  });
  $("#joinEmail3").change(function(){
      isChkOverlapEmail = false;
  });
  // 이메일 중복확인 버튼 Click
  $("#joinEmailBtn").click(function(){
    // 이메일 입력 여부 확인
    if( checkIsEmptyEmailVal() == false ){
      return;
    }
    else{
      var email1 = $("#joinEmail1").val();
      var email2 = $("#joinEmail2").val();
      var email3 = $("#joinEmail3").val();
      var user_email;
      if(email2 == "direct"){
        user_email = email1 + "@" + email3;
      }
      else{
        user_email = email1 + "@" + email2;
      }
    }
    $.ajax({
        url: '../model/joinCheckMD.php',
        type: 'POST',
        dataType: 'json',
        data: {
          "join_email": user_email
        },
        success: function(data) {
          var callbackMessage = data.callbackMessage;
          var isCheckOverlap = data.isCheckOverlap;
          // 로그인 성공
          if(isCheckOverlap == true){
            isChkOverlapEmail = true;
          }
          // 로그인 실패
          else{
            isChkOverlapEmail = false;
          }
          alert(callbackMessage);
        },
        error: function(){
          alert("연결을 실패했습니다. 다시 시도해주세요.");
        }
    });
  });

  // 번호 입력칸 최대길이 제어
  $(".inputNumber").on("keydown", function(event){
    var eventTarget = event.currentTarget;
    if (eventTarget.value.length > eventTarget.maxLength){
     eventTarget.value = eventTarget.value.slice(0, eventTarget.maxLength);
     console.log("삭제합니다.");
    }
  });

  $("#joinBtn").click(function(){

    // 약관 동의 여부 확인
    var provisionValue = $(':radio[name="chk_provision"]:checked').val();
    if(provisionValue === "reject"){
      alert("약관에 동의해주세요.")
      return;
    }
    // 개인정보 수집*이용 동의 여부 확인
    var provisionTableValue = $(':radio[name="chk_provision_table"]:checked').val();
    if(provisionTableValue === "reject"){
      alert("개인정보 수집*이용에 동의해주세요.")
      return;
    }

    // 이름 입력 여부 확인
    var joinNameVal = $("#joinName").val();
    var joinNameVal = $("#joinName").val().length;
    if(joinNameVal == "" || joinNameVal.Length === 0){
      alert("이름을 입력해주세요");
      return;
    }

    // 아이디 입력 여부 확인
    var joinIDStr = $("#joinID").val();
    if(joinIDStr == "" || joinIDStr === 0){
      alert("ID를 입력해주세요");
      return;
    }
    // 아이디 중복 검사 여부 확인
    if(isChkOverlapID == false){
      alert("ID 중복 검사 버튼을 눌러주세요");
      return;
    }

    // 비밀번호 입력 여부 확인
    var inputText = $("#joinPassword").val();
    var inputTextLength = $("#joinPassword").val().length;
    if(inputText == "" || inputText.Length === 0){
      alert("password를 입력해주세요");
      return;
    }

    // 비밀번호 재입력 여부 확인
    var inputText = $("#joinRePassword").val();
    var inputTextLength = $("#joinRePassword").val().length;
    if(inputText == "" || inputText.Length === 0){
      alert("password 재입력부분을 확인해주세요");
      return;
    }

    // 비밀번호 재입력 동일 여부 확인
    var passwordText = $("#joinPassword").val();
    var rePasswordText = $("#joinRePassword").val();
    if(passwordText !== rePasswordText){
      alert("패스워드와 재입력패스워드가 서로 다릅니다.")
      return;
    }

    // 생년 월일 체크 여부 확인
    var birthMonth = $('#joinBirthMonth option:selected').val();
    var birthDay = $('#joinBirthDay option:selected').val();
    if(birthMonth === "undefined" || birthDay === "undefined"){
      alert("생년 월일을 선택해주세요");
      return;
    }

    // 성별 체크 여부 확인
    var radioValue = $(':radio[name="join_sex"]:checked').val();
    if(radioValue == "undefined" || radioValue == null){
      alert("성별을 선택해주세요");
      return;
    }

    // 우편번호 입력 여부 확인
    var inputText = $("#joinZipCode").val();
    var inputTextLength = $("#joinRePassword").val().length;
    if(inputText == "" || inputText.Length === 0){
      alert("우편번호를 입력해주세요");
      return;
    }
    // 집주소 입력 여부 확인
    var inputText = $("#joinAddress").val();
    var inputTextLength = $("#joinAddress").val().length;
    if(inputText == "" || inputText.Length === 0){
      alert("집주소를 입력해주세요");
      return;
    }

    // 상세주소 입력 여부 확인
    var inputText = $("#joinDetailAddress").val();
    var inputTextLength = $("#joinDetailAddress").val().length;
    if(inputText == "" || inputText.Length === 0){
      alert("상세주소를 입력해주세요.");
      return;
    }

    // 연락처 입력 여부 확인
    var contactNumber_middle = $("#joinContactNumber-middle").val();
    var contactNumber_middle_length = $("#joinContactNumber-middle").val().length;
    var contactNumber_last = $("#joinContactNumber-last").val();
    var contactNumber_last_length = $("#joinContactNumber-last").val().length;
    if(contactNumber_middle == "" || contactNumber_middle_length == 0 ||
      contactNumber_last == "" || contactNumber_last_length == 0){
      alert("연락처를 입력해주세요");
      return;
    }

    // 이메일 입력 여부 확인
    if( checkIsEmptyEmailVal() == false ){
      return;
    }



    // 이메일 중복 여부 확인
    if(isChkOverlapEmail == false){
      alert("이메일 중복 검사 버튼을 눌러주세요");
      return;
    }

    // 휴대폰 입력 여부 확인
    var phoneNumber_middle = $("#joinPhoneNumber-middle").val();
    var phoneNumber_middle_length = $("#joinPhoneNumber-middle").val().length;
    var phoneNumber_last = $("#joinPhoneNumber-last").val();
    var phoneNumber_last_length = $("#joinPhoneNumber-last").val().length;
    if(phoneNumber_middle == "" || phoneNumber_middle_length == 0 ||
      phoneNumber_last == "" || phoneNumber_last_length == 0){
      alert("휴대폰 번호를 입력해주세요");
      return;
    }


    var user_name = $("#joinName").val();
    var user_id = $("#joinID").val();
    var user_pass = $("#joinPassword").val();

    var user_birth_year = $("#joinBirthYear").val();
    var user_birth_month = $("#joinBirthMonth").val();
    var user_birth_day = $("#joinBirthDay").val();
    var user_birth = user_birth_year + "-" + user_birth_month + "-" + user_birth_day;

    var user_sex = $("#join_sex").val();
    var user_zipcode = $("#joinZipCode").val();
    var user_address = $("#joinAddress").val();
    var user_detail_address = $("#joinDetailAddress").val();

    var user_contact_first = String($("#joinContactNumber-first").val());
    var user_contact_middle = String($("#joinContactNumber-middle").val());
    var user_contact_last = String($("#joinContactNumber-last").val());
    var user_contact_number = user_contact_first + user_contact_middle + user_contact_last;

    var email1 = $("#joinEmail1").val();
    var email2 = $("#joinEmail2").val();
    var email3 = $("#joinEmail3").val();
    var user_email;
    if(email2 == "direct"){
      user_email = email1 + "@" + email3;
    }
    else{
      user_email = email1 + "@" + email2;
    }

    var user_phone_first = String($("#joinPhoneNumber-first").val());
    var user_phone_middle = String($("#joinPhoneNumber-middle").val());
    var user_phone_last = String($("#joinPhoneNumber-last").val());
    var user_phone_number = user_phone_first + user_phone_middle + user_phone_last;

    // 로딩 화면 추가
    $("#overlay").show();
    $("#loadingImg").show();

    $.ajax({
        url: '../model/joinMD.php',
        type: 'POST',
        data: {
          "user_name": user_name,
          "user_id": user_id,
          "user_pass": user_pass,
          "user_birth": user_birth,
          "user_sex": user_sex,
          "user_zipcode": user_zipcode,
          "user_address": user_address,
          "user_detail_address": user_detail_address,
          "user_contact_number": user_contact_number,
          "user_email": user_email,
          "user_phone_number": user_phone_number,
        },
        success: function(data) {
          var form = document.createElement("form");
          var objs;

          objs = document.createElement("input");
          objs.setAttribute("type", "hidden");
          objs.setAttribute("name", "joinName");
          objs.setAttribute("value", $("#joinID").val());

          form.setAttribute("method", "post");
          form.setAttribute("action", "./joinComplete.php?");
          form.appendChild(objs);
          document.body.appendChild(form);
          form.submit();
        },
        error: function(){
          alert("통신 실패");
        }
    });

  });

  // 이메일 입력 여부 확인
  // 이메일에 특정 값이 입력되어 있으면 true 리턴
  function checkIsEmptyEmailVal(){
    var emailValue = $("#joinEmail1").val();
    var emailValue_length = $("#joinEmail1").val().length;
    if(emailValue == "" || emailValue_length == 0){
      alert("이메일을 입력해주세요");
      return false;
    }

    var emailSelectVal = $("#joinEmail2").val();
    if(emailSelectVal == "direct"){
      emailValue = $("#joinEmail3").val();
      emailValue_length = $("#joinEmail3").val().length;
      if(emailValue == "" || emailValue_length == 0){
        alert("이메일을 입력해주세요");
        return false;
      }
    }
    return true;
  }

});
