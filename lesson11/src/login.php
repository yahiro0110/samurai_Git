<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/login.css">
  <title>ログイン</title>
</head>

<body>
  <header>
    <div class="logo">
      <img src="./image/home.svg">
    </div>
    <h1 class="title">Address Book</h1>
    <div class="link_tag">
      <p>ようこそ</p>
    </div>
  </header>
  <div class="login-form">
    <!--エラー表示-->
    <?php
    @session_start();
    if (isset($_SESSION['login_error'])) {
      print '<div class="error_message">' . $_SESSION['login_error'] . '</div>';
      unset($_SESSION['login_error']);
    }
    if (isset($_SESSION['regist_error'])) {
      print '<div class="error_message">' . $_SESSION['regist_error'] . '</div>';
      unset($_SESSION['regist_error']);
    }
    ?>
    <!--タブ-->
    <ul class="tab-group" id="tab_id">
      <li class="tab tab-0 is-active">ログイン</li>
      <li class="tab tab-1">新規登録</li>
    </ul>
    <!--入力フォーム-->
    <div class="panel-group" id="contents_id">
      <div class="panels panel-0 is-show">
        <div id="error_message-login"></div>
        <form action="sql-done.php" method="post" name="account">
          <p>
            <label for="user">アカウント名</label><br>
            <input type="text" name="user">
          </p>
          <p>
            <label for="pass">パスワード</label><br>
            <div class="input_pass">
              <input type="password" name="pass" class="pass">
              <input type="checkbox" class="pass_check">
              <span class="iconEye"></span>
              <span class="iconEye-view"></span>
            </div>
          </p>
          <input type="submit" name="key" value="ログイン">
        </form>
      </div>
      <div class="panels panel-1">
        <div id="error_message-regist"></div>
        <form action="sql-done.php" method="post" name="new_account">
          <p>
            <label for="user">アカウント名</label><br>
            <input type="text" name="user">
          </p>
          <p>
            <label for="pass">パスワード</label><br>
            <div class="input_pass">
              <input type="password" name="pass" class="pass">
              <input type="checkbox" class="pass_check">
              <span class="iconEye"></span>
              <span class="iconEye-view"></span>
            </div>
          </p>
          <p>
            <label for="pass_confirm">パスワード（確認）</label><br>
            <div class="input_pass">
              <input type="password" name="pass_confirm" class="pass">
              <input type="checkbox" class="pass_check">
              <span class="iconEye"></span>
              <span class="iconEye-view"></span>
            </div>
          </p>
          <input type="submit" name="key" value="新規登録">
        </form>
      </div>
    </div>
  </div>
  <script src="js/tab-switch-login.js"></script>
  <script src="js/pass-check.js"></script>
</body>

</html>