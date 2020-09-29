const stalker = document.getElementById('mouse_stalker');

var mX = 0; // マウスカーソルの座標
var mY = 0; // マウスカーソルの座標
var nX = 0; // ストーカーの座標
var nY = 0; // ストーカーの座標

function getMouseXY(e) {
  mX = e.pageX;
  mY = e.pageY;
}
document.onmousemove = getMouseXY;

setInterval(function(){
  if(mX > nX){
    nX += 3;
  } else {
    nX -= 3;
  }
  if(mY > nY){
    nY += 3;
  } else {
    nY -= 3;
  }
  stalker.style.left = nX + 'px';
  stalker.style.top = nY + 'px';
}, 200);