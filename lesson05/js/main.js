const stalker = document.getElementById('mouse_stalker');
// マウスカーソルの座標
let mX = 0;
let mY = 0;
// ストーカーの座標
let X = 0;
let Y = 0;
/*---------------------------------------------------- 
関数の定義 
----------------------------------------------------*/
// マウスカーソルの座標取得
function getMouseXY(e) {
  mX = e.pageX;
  mY = e.pageY;
}
// ストーカーの座標設定
function setMouseStalker () {
  if (mX > X) {
    X += 3;
  } else {
    X -= 3;
  }
  if (mY > Y) {
    Y += 3;
  } else {
    Y -= 3;
  }
  stalker.style.left =`${X}px`;
  stalker.style.top =`${Y}px`;
}
/*---------------------------------------------------- 
マウスストーカー作成
----------------------------------------------------*/
document.onmousemove = getMouseXY;
setInterval(setMouseStalker, 200);