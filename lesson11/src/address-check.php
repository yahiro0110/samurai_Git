<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>操作確認</title>
  <link rel="stylesheet" href="css/address_check.css">
</head>

<body>
  <h1>確認</h1>
  <div class="table_style">
    <?php
    include_once('lib/post_parameters.php');
    // 必須入力データの確認
    if ($name1 == '' || $name2 == '' || $name_kana1 == '' || $name_kana2 == '' || $postal == '' || $address == '') {
      print '<h3 class="error_msg">エラー：未入力の項目があります！！</h3>';
    } else{
      print '<h3>以下の内容で'. $key .'してよろしいですか？</h3>';
    }
    print '<table>';
    if ($name1 == '') {
      print '<tr><th>姓</th><td class="error">姓が入力されていません</td></tr>';
    } else {
      print '<tr><th>姓</th><td>' . $name1 . '</td></tr>';
    }
    if ($name2 == '') {
      print '<tr><th>名</th><td class="error">名が入力されていません</td></tr>';
    } else {
      print '<tr><th>名前</th><td>' . $name2 . '</td></tr>';
    }
    if ($name_kana1 == '') {
      print '<tr><th>姓（かな）</th><td class="error">姓（かな）が入力されていません</td></tr>';
    } else {
      print '<tr><th>姓（かな）</th><td>' . $name_kana1 . '</td></tr>';
    }
    if ($name_kana2 == '') {
      print '<tr><th>名（かな）</th><td class="error">名（かな）が入力されていません</td></tr>';
    } else {
      print '<tr><th>名（かな）</th><td>' . $name_kana2 . '</td></tr>';
    }
    if ($postal == '') {
      print '<tr><th>郵便番号</th><td class="error">郵便番号が入力されていません</td></tr>';
    } else {
      print '<tr><th>郵便番号</th><td>' . $postal . '</td></tr>';
    }
    if ($address == '') {
      print '<tr><th>住所</th><td class="error">住所が入力されていません</td></tr>';
    } else {
      print '<tr><th>住所</th><td>' . $address . '</td></tr>';
    }
    if ($phone == '') {
      print '<tr><th>電話番号</th><td>なし</td></tr>';
    } else {
      print '<tr><th>電話番号</th><td>' . $phone . '</td></tr>';
    }
    if ($cellphone == '') {
      print '<tr><th>携帯番号</th><td>なし</td></tr>';
    } else {
      print '<tr><th>携帯番号</th><td>' . $cellphone . '</td></tr>';
    }
    if ($mail == '') {
      print '<tr><th>メールアドレス</th><td>なし</td></tr>';
    } else {
      print '<tr><th>携帯番号</th><td>' . $mail . '</td></tr>';
    }
    print '</table>';
    // ボタンの生成
    if ($name1 == '' || $name2 == '' || $name_kana1 == '' || $name_kana2 == '' || $postal == '' || $address == '') {
      print '<form>';
      print '<br><input type="button" onclick="history.back()" value="戻る">';
      print '</form>';
    } else {
      print '<form method="post" action="sql_done.php">';
      print '<input type="hidden" name="id" value="' . $id . '">';
      print '<input type="hidden" name="name1" value="' . $name1 . '">';
      print '<input type="hidden" name="name2" value="' . $name2 . '">';
      print '<input type="hidden" name="name_kana1" value="' . $name_kana1 . '">';
      print '<input type="hidden" name="name_kana2" value="' . $name_kana2 . '">';
      print '<input type="hidden" name="postal" value="' . $postal . '">';
      print '<input type="hidden" name="address" value="' . $address . '">';
      print '<input type="hidden" name="phone" value="' . $phone . '">';
      print '<input type="hidden" name="cellphone" value="' . $cellphone . '">';
      print '<input type="hidden" name="mail" value="' . $mail . '">';
      print '<input type="hidden" name="key" value="' . $key . '">';
      print '</br>';
      print '<input type="button" onclick="history.back()" value="キャンセル">';
      print '<input type="submit" value="実行">';
    }
    ?>
  </div>
</body>

</html>