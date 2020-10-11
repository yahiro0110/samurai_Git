/*----------------------------------------------------------------------------------------- 
関数の定義 
-----------------------------------------------------------------------------------------*/
// HTML要素の作成
function createHtmlElement(nodeName, elementName, className, colSpanNumber, innerHtmlText){
  let str = document.createElement(elementName);
  str.classList.add(className);
  str.colSpan = colSpanNumber;
  //str.setAttribute("colSpan", colSpanNumber);
  str.innerHTML = innerHtmlText;
  nodeName.appendChild(str);
}
// カレンダーの年月作成
function createHead(table, year, month){
  let table_title = year + "年 " + month + "月";
  createHtmlElement(table, "th", "head", 7, table_title);
}
// カレンダーの曜日タイトル作成
function createWeekTitle(table){
  let weekdays = ["日", "月", "火", "水", "木", "金", "土"];
  let weekdaysStr = table.insertRow(table.rows.length);
  for (let i = 0; i < 7; i++) {
    switch (i) {
      case 0:
        createHtmlElement(weekdaysStr, "th", "sunday", 1, weekdays[i]);
        break;
      case 6:
        createHtmlElement(weekdaysStr, "th", "saturday", 1, weekdays[i]);
        break;
      default:
        createHtmlElement(weekdaysStr, "th", "weekday", 1, weekdays[i]);
        break;
    }
  }
}
// カレンダーの日付作成
function createDayBody(table, year, month, firstDate, lastDate){
  // 空白部分の作成
  var daysStr = table.insertRow(table.rows.length);
  let startWeekDay = firstDate.getDay();
  for (let i = 0; i < startWeekDay; i++) {
    createHtmlElement(daysStr, "td", "nothing", 1, "&nbsp;");
  }
  // 日付作成
  for (let i = 1; i <= lastDate.getDate(); i++) {
    let date = new Date(year, month - 1, i);
    let weekType = date.getDay();
    let cellStr = date.getDate();
    switch (weekType) {
      case 0:
        var daysStr = table.insertRow(table.rows.length);
        createHtmlElement(daysStr, "td", "sunday", 1, cellStr);
        break;
      case 6:
        createHtmlElement(daysStr, "td", "saturday", 1, cellStr);
        break;
      default:
        createHtmlElement(daysStr, "td", "weekday", 1, cellStr);
        break;
    }
  }
}
// カレンダー本体の作成
function createCalender(Num){
  // 日付の取得
  let date = new Date();
  date.setMonth(date.getMonth() + Num);　// 次月、次々月を取得する
  let year = date.getFullYear();
  let month = date.getMonth() + 1;
  // 初日と月末の取得
  let firstDate = new Date(year, month - 1, 1);
  let lastDate = new Date(year, month, 0);
  // カレンダー用のテーブルを作成
  var calendar = document.getElementById("calendar_ID");
  var table = document.createElement("table");
  calendar.appendChild(table);
  // カレンダーの年月、曜日タイトル、日付を作成
  createHead(table, year, month);
  createWeekTitle(table);
  createDayBody(table, year, month, firstDate, lastDate);
}
/*----------------------------------------------------------------------------------------- 
カレンダー作成処理 
-----------------------------------------------------------------------------------------*/
for(let i = 0; i <= 2; i++) {
  createCalender(i);
}