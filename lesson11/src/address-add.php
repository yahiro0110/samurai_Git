<?php
@session_start();
include_once('lib/parameters.php');
?>

<!DOCTYPE html>

<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/address-add.css">
  <script type="text/javascript" src="https://ajaxzip3.github.io/ajaxzip3.js" charset="utf-8"></script>
  <?php
  if ($key) {
    print '<title>住所' . $key . '</title>';
  } else {
    print '<title>住所登録</title>';
  }
  ?>
</head>

<body>
  <header>
    <div class="logo">
      <img src="./image/home.svg" alt="hello">
    </div>
    <h1 class="title">Address Book</h1>
    <div class="link_tag">
      <a href="address-view.php">住所一覧表示</a>
      <p><?php print $user . "さん"?></p>
    </div>
  </header>
  <?php
  if ($key) {
    print '<h1>住所' . $key . '</h1>';
  } else {
    print '<h1>住所登録</h1>';
  }
  ?>
  <form action="address-check.php" method="post" class="input_form">
    <?php
    print '<input type="hidden" name="id" value="' . $id . '">'
    ?>
    <div class="name_container">
      <p class="name">
        <label for="name">姓<abbr title="入力は必須"></abbr><br>
          <?php
          print '<input type="text" name="name1" placeholder="例）伊藤" value="' . $name1 . '">'
          ?>
        </label>
      </p>
      <p class="name">
        <label for="name">名<abbr title="入力は必須"></abbr><br>
          <?php
          print '<input type="text" name="name2" placeholder="例）博文" value="' . $name2 . '">'
          ?>
        </label>
      </p>
    </div>
    <div class="name_container">
      <p class="name">
        <label for="name">姓（ひらがな）<abbr title="入力は必須"></abbr><br>
          <?php
          print '<input type="text" name="name_kana1" placeholder="例）いとう" value="' . $name_kana1 . '">'
          ?>
        </label>
      </p>
      <p class="name">
        <label for="name">名（ひらがな）<abbr title="入力は必須"></abbr><br>
          <?php
          print '<input type="text" name="name_kana2" placeholder="例）ひろぶみ" value="' . $name_kana2 . '">'
          ?>
        </label>
      </p>
    </div>
    <div class="address_container">
      <p class="postal">
        <label for="postal">郵便番号<abbr title="入力は必須"></abbr><br>
          <?php
          print '<input type="text" name="postal" onKeyUp="AjaxZip3.zip2addr(this,\' \',\'address\',\'address\');" value="' . $postal . '" placeholder="例）1000014">'
          ?>
        </label>
      </p>
      <p class="address">
        <label for="address">都道府県・市区町村・番地<abbr title="入力は必須"></abbr><br>
          <?php
          print '<input type="text" name="address" value="' . $address . '" placeholder="例）東京都千代田区永田町２丁目３−１">'
          ?>
        </label>
      </p>
    </div>
    <p>
      <label for="phone">電話番号<br>
        <?php
        print '<input type="text" name="phone" value="' . $phone . '" placeholder="例）03-3581-0101">'
        ?>
      </label>
    </p>
    <p>
      <label for="cellphone">携帯番号<br>
        <?php
        print '<input type="text" name="cellphone" value="' . $cellphone . '" placeholder="例）03-3581-0101">'
        ?>
      </label>
    </p>
    <p class="mail">
      <label for="mail">メールアドレス<br>
        <?php
        print '<input type="text" name="mail" value="' . $mail . '" placeholder="例）example.com">'
        ?>
      </label>
    </p>
    <div>
      <?php
      if ($key) {
        print '<input type="submit" name="key" value="更新">';
      } else {
        print '<input type="submit" name="key" value="登録">';
      }
      ?>
    </div>
  </form>
</body>

</html>