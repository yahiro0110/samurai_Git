/*---------------------------------------------------------------- 
　クラスの定義 
----------------------------------------------------------------*/
class StudentInfo {
  constructor(name, kokugo, suugaku, rika, syakai, eigo) {
    this.name = name;
    this.kyoka = [kokugo, suugaku, rika, syakai, eigo];
    this.total = kokugo + suugaku + rika + syakai + eigo;
    this.rank = 0;
  }
  // HMTLの表作成用
  setStudentCell() {
    let newTr = table.insertRow(table.rows.length);
    for (let index = 0; index < this.kyoka.length + 3; index++) {
      let newTd = document.createElement('td');
      switch (index) {
        case 0:
          newTd.innerHTML = this.name;
          break;
        case this.kyoka.length + 1:
          newTd.innerHTML = this.total;
          break;
        case this.kyoka.length + 2:
          newTd.innerHTML = this.rank;
          break;
        default:
          newTd.innerHTML = this.kyoka[index - 1];
          break;
      }
      newTr.appendChild(newTd);
    }
  }
}
/*---------------------------------------------------------------- 
　表の作成
----------------------------------------------------------------*/
var table = document.getElementById('table_Id');
let title = ["生徒", "国語", "数学", "理科", "社会", "英語", "合計値", "ランク"];
let student = [
  new StudentInfo("Aさん", 80, 70, 70, 50, 60),
  new StudentInfo("Bさん", 60, 70, 40, 80, 60),
  new StudentInfo("Cさん", 60, 70, 70, 60, 60),
  new StudentInfo("Dさん", 80, 40, 40, 70, 70),
  new StudentInfo("Eさん", 70, 70, 70, 60, 70)
];
/*--- 表のタイトル部分を作成 ---*/
let newTr = table.insertRow(table.rows.length);
for (let index = 0; index < title.length; index++) {
  let newTh = document.createElement('th');
  newTh.innerHTML = title[index];
  newTr.appendChild(newTh);
}
/*--- 内部処理で生徒の順位付け ---*/
// 高い総合点順に配列の順番を並び替え
student.sort(function(a, b){
  if(a.total < b.total) return 1;
  if(a.total > b.total) return -1;
});
// rankプロパティに順位を代入
let num = 1;
for (let index = 0; index < student.length; index++) {
  switch (index) {
    case 0:
      student[index].rank = num;
      break;
    default:
      // 総合点が同じ場合、順位を調整
      if (student[index].total == student[index-1].total) num -= 1;
      student[index].rank = num;
      break;
  }
  num += 1;
}
// 生徒名で配列の順番を並び替え
student.sort(function(a, b){
  if(a.name < b.name) return -1;
  if(a.name > b.name) return 1;
});
/*--- 表で生徒の情報を作成 ---*/
for (let index = 0; index < student.length; index++) {
  student[index].setStudentCell();
}

