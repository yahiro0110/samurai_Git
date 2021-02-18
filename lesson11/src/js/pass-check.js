/*--------------------------------------------------
ログイン画面での入力チェック
--------------------------------------------------*/
document.addEventListener('DOMContentLoaded', function() {

  /*--パスワードの表示・非表示--*/
  const chk = document.querySelectorAll("input[type='checkbox']");
  const pass = document.getElementsByClassName("pass");
  const eyes = document.getElementsByClassName("iconEye");
  const eyes_view = document.getElementsByClassName("iconEye-view");

  for (let i = 0; i < chk.length; i++) {
    chk[i].addEventListener('change', function() {
      const array_chk = Array.prototype.slice.call(chk);
      const index = array_chk.indexOf(this);
      if (this.checked) {
        pass[index].setAttribute("type", "text");
        eyes[index].style.display = "none";
        eyes_view[index].style.display = "block";
      } else {
        pass[index].setAttribute("type", "password");
        eyes[index].style.display = "block";
        eyes_view[index].style.display = "none";
      }
    });
  }
  /*--入力チェック--*/
  const form = document.getElementsByTagName("form");
  // ログイン
  form[0].addEventListener("submit", function(event) {
    const error_message = document.getElementById("error_message-login");
    error_message.innerHTML = "";
    if (account.user.value == "") {
      error_message.innerHTML = "アカウント名を入力してください";
      error_message.style.display = "block";
      event.preventDefault();
    } else if (account.pass.value == "") {
      error_message.innerHTML = "パスワードを入力してください";
      error_message.style.display = "block";
      event.preventDefault();
    }
  });
  // 新規登録
  form[1].addEventListener("submit", function(event) {
    const error_message = document.getElementById("error_message-regist");
    error_message.innerHTML = "";
    if (new_account.user.value == "") {
      error_message.innerHTML = "アカウント名を入力してください";
      error_message.style.display = "block";
      event.preventDefault();
    } else if (new_account.pass.value == "") {
      error_message.innerHTML = "パスワードを入力してください";
      error_message.style.display = "block";
      event.preventDefault();
    } else if (new_account.pass.value !== new_account.pass_confirm.value) {
      error_message.innerHTML = "パスワードが一致していません";
      error_message.style.display = "block";
      event.preventDefault();
    }
  });
});


