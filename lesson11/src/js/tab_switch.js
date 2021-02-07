document.addEventListener('DOMContentLoaded', function(){
  // タブに対してクリックイベントを適用
  const tabs = document.getElementsByClassName('tab');
  for(let i = 0; i < tabs.length; i++) {
    tabs[i].addEventListener('click', tabSwitch);
  }
  // タブをクリックすると実行する関数
  function tabSwitch(){
    // タブのclassの値を変更
    document.getElementsByClassName('is-active')[0].classList.remove('is-active');
    this.classList.add('is-active');
    // コンテンツのclassの値を変更
    const panels = document.getElementsByClassName('is-show');
    while(panels.length){
      panels[0].classList.remove('is-show');
    }
    const array_tabs = Array.prototype.slice.call(tabs);
    const index = array_tabs.indexOf(this);
    const show_panels = tabCheck(index);
    for(let i = 0; i < show_panels.length; i++){
      show_panels[i].classList.add('is-show');
    }
    const panelhead = document.getElementsByClassName('panelhead');
    panelhead[0].classList.add('is-show');
    const panelbottom = document.getElementsByClassName('panelbottom');
    panelbottom[0].classList.add('is-show');
    const panelactive = document.getElementsByClassName('is-show');
    if (panelactive.length > 2) {
      panelbottom[0].classList.remove('is-show');
    }
  };
  // 表示するパネルを調査（全部、もしくは一部か）
  function tabCheck(index){
    switch(index){
      case 0:
        return document.getElementsByClassName('panel');
      default:
        return document.getElementsByClassName('panel-' + index);
    }
  }
});