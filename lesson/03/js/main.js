// HTMLのテーブルタグの要素を取得
var table = document.getElementById('table_id');
/*------------------------------------------ 
表の先頭行を作成する 
------------------------------------------*/
var newtr = table.insertRow(table.rows.length);
for (var i = 0; i <= 9; i++) {
  // 左端の空白セル用
  if(i==0){
    var newth = document.createElement('th');
    newth.innerHTML = " ";
    newtr.appendChild(newth);
    continue;
  }
  var newth = document.createElement('th');
  newth.innerHTML = i;
  newtr.appendChild(newth);
}
/*------------------------------------------ 
表内のデータを作成する
------------------------------------------*/
for (var i = 1; i <= 9; i++) {
  // trタグを作成し、テーブルタグの後ろに登録する
  var newtr = table.insertRow(table.rows.length);
  // thタグを作成し、trタグの後ろに登録する
  var newth = document.createElement('th');
  newth.innerHTML = i;
  newtr.appendChild(newth);
  // tdタグを作成し、trタグの後ろに登録する
  for (var j = 1; j <= 9; j++) {
    var newtd = newtr.insertCell(newtr.cells.length);
    newtd.appendChild(document.createTextNode(i * j));
  }
}