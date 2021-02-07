<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/address_view.css">
  <title>住所一覧表示</title>
</head>

<body class="address_view-body">

  <header>
    <div class="link_tag">
      <a href="address_add.php">住所登録</a>
    </div>
  </header>
  <h1>検索</h1>
  <form method="POST">
    <div class="kensaku">
      <p>
        <label>姓名
          <input type="text" placeholder="例）伊藤" name="name" class="namae">
        </label>
      </p>
      <p>
        <label>住所
          <input type="text" placeholder="例）東京都" name="address" class="jyusyo">
          <input type="submit" name="key" value="検索">
        </label>
      </p>
    </div>
  </form>
  <h1>住所一覧表示</h1>
  <p id="record_col"></p>
  <div class="tab-panel">
    <!--タブ-->
    <ul class="tab-group" id="tab_id">
      <li class="tab tab-0 is-active">全</li>
      <li class="tab tab-1">あ</li>
      <li class="tab tab-2">か</li>
      <li class="tab tab-3">さ</li>
      <li class="tab tab-4">た</li>
      <li class="tab tab-5">な</li>
      <li class="tab tab-6">は</li>
      <li class="tab tab-7">ま</li>
      <li class="tab tab-8">や</li>
      <li class="tab tab-9">ら</li>
      <li class="tab tab-10">わ</li>
    </ul>
    <!--タブを切り替えて表示するコンテンツ-->
    <div class="panel-group" id="panel_id">
      <div class="table-panel">
        <?php
        include_once('lib/functions.php');
        include_once('lib/post_parameters.php');
        include_once('db_access.php');
        // データの取得
        switch ($key) {
          case '検索':
            $flag = false;
            $query = 'SELECT * FROM t_address WHERE';
            if ($name !== "") {
              $query .= ' name1 like "%' . $name . '%" OR name2 like "%' . $name . '%" OR name_kana1 like "%' . $name . '%" OR name_kana2 like "%' . $name . '%"';
              $flag = true;
            }
            if ($address !== "") {
              $query .= ' address like "%' . $address . '%"';
              $flag = true;
            }
            if ($flag !== true) {
              $query = str_replace(' WHERE', '', $query);
            }
            $count = sqlSelect($mysqli, $query);
            echo <<<EOM
              <script type="text/javascript">
                const record = document.getElementById('record_col');
                record.innerHTML = {$count} +"件の登録情報を検索しました";
              </script>
            EOM;
            break;
          default:
            $query = 'SELECT * FROM t_address';
            sqlSelect($mysqli, $query);
            break;
        }
        // データベースから切断
        $mysqli->close();
        ?>
      </div>
    </div>
  </div>
  <script src="js/tab_switch.js"></script>
</body>

</html>