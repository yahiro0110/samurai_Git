<body>
  <?php
  include_once('lib/post_parameters.php');
  include_once('db_access.php');
  // SQLの操作
  switch ($key) {
    case '登録':
      $query = 'INSERT INTO t_address (
        name1, name2, name_kana1, name_kana2, postal, address, phone, cellphone, mail
      ) VALUES (
        ?, ?, ?, ?, ?, ?, ?, ?, ?
      )';
      $stmt = $mysqli->prepare($query);
      $stmt->bind_param('sssssssss', $name1, $name2, $name_kana1, $name_kana2, $postal, $address, $phone, $cellphone, $mail);
      $stmt->execute();
      print "<h3>登録しました</h3>";
      break;
    case '更新':
      $query = 'UPDATE t_address 
              SET name1 = ?, name2 = ?, name_kana1 = ?, name_kana2 = ?, postal = ?, 
              address = ?, phone = ?, cellphone = ?, mail = ? 
              WHERE id=?';
      $stmt = $mysqli->prepare($query);
      $stmt->bind_param('sssssssssi', $name1, $name2, $name_kana1, $name_kana2, $postal, $address, $phone, $cellphone, $mail, $id);
      $stmt->execute();
      print "<h3>更新しました</h3>";
      break;
    case '削除':
      $query = 'DELETE FROM t_address WHERE id=?';
      $stmt = $mysqli->prepare($query);
      $stmt->bind_param('i', $id);
      $stmt->execute();
      print "<h3>削除しました</h3>";
      break;
    default:
      print '<h3>例外が発生しました！$keyが正しく受け取られていません！</h3>';
      break;
  }
  // データベースから切断
  // echo $stmt->errorInfo();
  $mysqli->close();
  // 処理結果の表示
  ?>

  <a href="address_view.php">表示画面に戻る</a>

</body>