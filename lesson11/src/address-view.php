<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/address_view.css">
  <link rel="stylesheet" href="css/toastr.min.css">
  <title>住所一覧表示</title>
</head>

<body class="address_view-body">
  
  <header>
    <h1 class="title">Address Book</h1>
    <div class="link_tag">
      <a href="address-add.php">住所登録</a>
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
        include_once('lib/post-parameters.php');
        include_once('db-access.php');
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
  <script src="js/tab-switch-view.js"></script>
  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/toastr.min.js"></script>
  <script type="text/javascript">
    $(document).ready(function () {
      toastr.options.timeOut = 3000; // 3秒
      toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": false,
        "progressBar": false,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
      }
      <?php
        switch($key) {
          case "":
            break;
          case "登録":
            print 'Command: toastr.info("'.$key.'しました");';
            break;
          case "検索":
            print 'Command: toastr.success("'.$count.'件の情報を検索しました");';
            break;
          case "更新":
            print 'Command: toastr.success("'.$key.'しました");';
            break;
          case "削除":
            print 'Command: toastr.error("'.$key.'しました");';
            break;
          default:
            print 'Command: toastr.waring("予期せぬ$keyを受け取りました");';
            break;
        }
      ?>
    });
  </script>
</body>

</html>