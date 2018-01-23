
// 임시로 이미지 파일들을 받을 배열
var files = [];

var isSelectedMainThumbnail = false;
var isSelectedThumbnail = false;

// 메인 섬네일 이미지 파일
var mainThumbnailImg = [];
// 섬네일 이미지 파일을 받을 배열
var thumbnailImgFiles = [];


$(document).ready(function(){
  $("#submitBtn").click(insertSubmit);

  $("#mainThumbnailImg").on("change", handleMainImgFileSelect);
  $("#thumbnailImgs").on("change", handleImgFileSelect);

  $("#uploadButton").click(function(){
    submitAction();
  });

});

// 메인 썸네일 이미지를 선택했을 때
function handleMainImgFileSelect(e){

  isSelectedMainThumbnail = true;


  var files = e.target.files;
  var filesArr = Array.prototype.slice.call(files);
  console.log("files : " + files);

  $("#mainThumbnailImgsWrap").empty();
  mainThumbnailImg = [];

  var index = 0;
  filesArr.forEach(function(f){
    if( !f.type.match("image.*") ) {
      alert("이미지만 등록가능합니다.");
      return;
    }

    mainThumbnailImg.push(f);

    var reader = new FileReader();
    reader.onload = function(e){
      var html = "<a href='#'><img src='" + e.target.result + "' id='mainThumbnail' style='width:200px;height:200px'></a>";
      $("#mainThumbnailImgsWrap").append(html);
      // $("#thumbnailImgFilesWrap").append("index : " + index);
      index++;
    }
    reader.readAsDataURL(f);
  })
}

// 썸네일 이미지를 선택했을 때
function handleImgFileSelect(e){
  console.log("어 왜 안되냐?");

  isSelectedThumbnail = true;

  $("#thumbnailImgsWrap").empty();

  thumbnailImgFiles = [];

  var files = e.target.files;
  var filesArr = Array.prototype.slice.call(files);

  var index = 0;
  filesArr.forEach(function(f){
    if( !f.type.match("image.*") ) {
      alert("이미지만 등록가능합니다.");
      return;
    }

    thumbnailImgFiles.push(f);

    var reader = new FileReader();
    reader.onload = function(e){
      var html = "<a href='#'><img src='" + e.target.result + "' id='img_id_"+index+"' style='width:200px;height:200px'></a>";
      $("#thumbnailImgsWrap").append(html);
      // $("#thumbnailImgFilesWrap").append("index : " + index);
      index++;
    }
    reader.readAsDataURL(f);
  })
}

// 섬네일 이미지를 제거할 때, 현재 미사용 2017-12-19
function deleteImageAction(index){
  console.log("delete image index : " + index);
  thumbnailImgFiles.splice(index, 1);
  var img_id = "#img_id_" + index;
  $(img_id).remove();
}

// 업로드
function submitAction(){
  var data = new FormData();

  for( var i=0; i<thumbnailImgFiles.length; i++){
    var name="thumbnail_" + i;
    data.append(name, thumbnailImgFiles[i]);
  }
  data.append("thumbnailImg_count", thumbnailImgFiles.length);

  var xhr = new XMLHttpRequest();
  xhr.open("POST", "img_upload_test.php");
  xhr.onload = function(e){
    if(this.status == 200){
      console.log("result : " + e.currentTarget.responseText);
    }
  }

  xhr.send(data);
}

// 제품 등록 메소드
function insertSubmit(){
  var productName = $("#productName").val();
  var productPrice = $("#productPrice").val();
  var productKind = $("#productKind").val();
  var thumbnailImgs = $("#thumbnailImgs").val();
  var thumbnailImg_count = thumbnailImgFiles.length;
  var productDetailContent = getHTML();

  console.log("productName : " + productName);
  console.log("productPrice : " + productPrice);
  console.log("productKind : " + productKind);
  console.log("thumbnailImgs : " + thumbnailImgs);
  console.log("thumbnailImg_count : " + thumbnailImg_count);
  console.log("productDetailContent : " + productDetailContent);

  var formData = new FormData();
  formData.append("productName", productName);
  formData.append("productPrice", productPrice);
  formData.append("productKind", productKind);
  formData.append("mainThumbnailImg", mainThumbnailImg[0]);
  for( var i=0; i<thumbnailImgFiles.length; i++){
    var name="subThumbnailImgs_" + i;
    formData.append(name, thumbnailImgFiles[i]);
  }
  formData.append("thumbnailImg_count", thumbnailImgFiles.length);
  formData.append("productDetailContent", productDetailContent);

  $.ajax({
      url: '../../model/insertProductMD.php',
      type: 'POST',
      data: formData,
      processData: false,
      contentType: false,
      success: function(data) {
        alert("상품을 등록하였습니다");
        var form = document.createElement("form");
        var objs = document.createElement("input");
        objs.setAttribute("type", "hidden");
        form.setAttribute("method", "post");
        form.setAttribute("action", "../../controller/mainController.php?control_state=100");
        form.appendChild(objs);
        document.body.appendChild(form);
        form.submit();
      },
      error: function(){
        alert("통신 실패");
      }
  });
}
