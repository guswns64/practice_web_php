


$(document).ready(function() {
  $(".menuLink").hover(mouseHoverFunc, mouseOutFunc);
});

function mouseHoverFunc(){
  var childHeight = $(this).children().eq(1).css("height");
  childHeight = parseInt(childHeight);
  var thisHeight = $(this).css("height");
  thisHeight = parseInt(thisHeight);
  var wholeHeight = childHeight + thisHeight;
  wholeHeight = parseInt(wholeHeight);
  $(this).css("height", wholeHeight);
}

function mouseOutFunc(){
  var childHeight = parseInt( $(this).children("a").css("height") );
  childHeight = childHeight + 2;
  $(this).css("height", childHeight);
}
