/*--------------------------------------------------- 
関数の定義
---------------------------------------------------*/
// tdタグの生成
function create_td(params) {
  let newtd = document.createElement('td');
  newtd.innerHTML = params;
  newtr.appendChild(newtd);
}
// ３の倍数、もしくは３の数字がつくものは以下のtdタグを使用
function create_td3(params) {
  let newtd = document.createElement('td');
  newtd.classList.add('td__3')
  newtd.innerHTML = params;
  newtr.appendChild(newtd);
}

/*--------------------------------------------------- 
テーブルの生成
---------------------------------------------------*/
// table要素の取得
var table = document.getElementById('table_id');
// テーブルの作成
for (let num = 0; num < 10; num++) {
  var newtr = table.insertRow(table.rows.length);
  for (let i = 0; i < 10; i++) {
    let checkNum = num * 10 + i;
    // checkNumが0ではない、かつ３の倍数、もしくは３がつく場合はTrueを返す
    switch ((checkNum !== 0 && checkNum % 3 == 0) || String(checkNum).includes('3')) {
      case true:
        create_td3(checkNum);
        break;
      case false:
        create_td(checkNum);
        break;
      default:
        alert("Error:switch部分で正常に処理できませんでした");
        break;
    }
  }
}
