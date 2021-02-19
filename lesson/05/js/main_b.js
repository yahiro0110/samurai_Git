const stalker = document.getElementById('mouse_stalker');

function getMouseXY (e) {
  let mX = e.pageX;
  let mY = e.pageY;
  // document.getElementById('mouse_stalker').innerText = "X座標：" + mX + " Y座標：" + mY;
  stalker.style.transform = `translate(${mX}px, ${mY}px)`
  
}

document.onmousemove = getMouseXY;
