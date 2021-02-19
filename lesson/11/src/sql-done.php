<body>
  <?php
  @session_start();
  include_once('lib/parameters.php');
  include_once('lib/functions.php');
  include_once('db-access.php');
  /*--SQLの操作--*/
  switch ($key) {
    case '登録':
      $query = 'INSERT INTO t_address (
        name1, name2, name_kana1, name_kana2, postal, address, phone, cellphone, mail, account_id
      ) VALUES (
        ?, ?, ?, ?, ?, ?, ?, ?, ?, ?
      )';
      $stmt = $mysqli->prepare($query);
      $stmt->bind_param('sssssssssi', $name1, $name2, $name_kana1, $name_kana2, $postal, $address, $phone, $cellphone, $mail, $account_id);
      $stmt->execute();
      header('Location:address-view.php', true, 307);
      exit();
      break;
    case '更新':
      $query = 'UPDATE t_address 
              SET name1 = ?, name2 = ?, name_kana1 = ?, name_kana2 = ?, postal = ?, 
              address = ?, phone = ?, cellphone = ?, mail = ? 
              WHERE id=?';
      $stmt = $mysqli->prepare($query);
      $stmt->bind_param('sssssssssi', $name1, $name2, $name_kana1, $name_kana2, $postal, $address, $phone, $cellphone, $mail, $id);
      $stmt->execute();
      header('Location:address-view.php', true, 307);
      exit();
      break;
    case '削除':
      $query = 'DELETE FROM t_address WHERE id=?';
      $stmt = $mysqli->prepare($query);
      $stmt->bind_param('i', $id);
      $stmt->execute();
      header('Location:address-view.php', true, 307);
      exit();
      break;
    case '新規登録':
      $query = 'INSERT INTO t_account (
        user, pass
      ) VALUES (
        ?, ?
      )';
      $stmt = $mysqli->prepare($query);
      $stmt->bind_param('ss', $user, $pass);
      $stmt->execute();
      if ($stmt->errno == 1062) {
        $_SESSION['regist_error'] = "すでに登録されています";
        header('Location:login.php');
        exit();
      } else {
        $_SESSION['account_id'] = $stmt->insert_id;
        $_SESSION['user'] = $user;
        header('Location:address-view.php', true, 307);
        exit();
      }
      break;
    case 'ログイン':
      $query = 'SELECT *  FROM t_account WHERE user=?';
      $stmt = $mysqli->prepare($query);
      $stmt->bind_param('s', $user);
      $account_id = sqlAccount($stmt);
      if ($account_id == "false") {
        $_SESSION['login_error'] = "アカウント名<br>もしくはパスワードが間違ってます";
        header('Location:login.php');
        exit();
      } else {
        $_SESSION['account_id'] = $account_id;
        $_SESSION['user'] = $user;
        header('Location:address-view.php', true, 307);
        exit();
      }
      break;
    default:
      print '<h3>例外が発生しました！$keyが正しく受け取られていません！</h3>';
      print '<a href="address-view.php">表示画面に戻る</a>';
      break;
  }
  /*--データベースから切断--*/
  // echo $stmt->errorInfo();
  $mysqli->close();
  ?>

</body>