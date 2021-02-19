/*--------------------------------------------------
ログイン画面でのタブ切り替え処理
--------------------------------------------------*/
document.addEventListener('DOMContentLoaded', function() {
  /*--タブに対してクリックイベントを適用--*/
  const tabs = document.getElementsByClassName('tab');
  for(let i = 0; i < tabs.length; i++) {
    tabs[i].addEventListener('click', tabSwitch);
  }
  /*--タブをクリックすると実行する関数--*/
  function tabSwitch(){
    // タブのclassの値を変更
    document.getElementsByClassName('is-active')[0].classList.remove('is-active');
    this.classList.add('is-active');
    // コンテンツのclassの値を変更
    const contents = document.getElementsByClassName('is-show');
    contents[0].classList.remove('is-show');
    const arrayTabs = Array.prototype.slice.call(tabs);
    const index = arrayTabs.indexOf(this);
    const show_content = document.getElementsByClassName('panel-' + index);
    show_content[0].classList.add('is-show');
  }
});