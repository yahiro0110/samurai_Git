<?php
  @session_start();
  include_once('lib/functions.php');
  include_once('lib/parameters.php');
  include_once('db-access.php');
?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/address-view.css">
  <link rel="stylesheet" href="css/toastr.min.css">
  <title>住所一覧表示</title>
</head>

<body class="address_view-body">

  <header>
    <div class="logo">
      <img src="./image/home.svg">
    </div>
    <h1 class="title">Address Book</h1>
    <div class="link_tag">
      <a href="address-add.php">住所登録</a>
      <a href="logout.php">ログアウト</a>
      <p><?php print $user . "さん"?></p>
    </div>
  </header>
  <h1>検索</h1>
  <form method="POST">
    <div class="search">
      <p>
        <label>姓名
          <input type="text" placeholder="例）伊藤" name="name" class="search_name">
        </label>
      </p>
      <p>
        <label>住所
          <input type="text" placeholder="例）東京都" name="address" class="search_address">
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
        /*--データの取得--*/
        switch ($key) {
          case '検索':
            $arr_var[] = $account_id;
            $query = 'SELECT * FROM (SELECT * FROM t_address WHERE account_id=?) AS t_account_id WHERE';
            // 氏名で検索
            if (!empty($name)) {
              array_push($arr_var, ...array_fill(0, 4, '%'.$name.'%'));
              $arr_column = array('name1', 'name2', 'name_kana1', 'name_kana2');
            }
            // 住所で検索
            if (!empty($address)) {
              $arr_var[] = '%'.$address.'%';
              $arr_column[] = 'address';
            }
            // SQL文の編集
            if (!empty($arr_column) && count($arr_column) > 0) {
              $arr_column[] = 'END';
              $query .= " " . implode(" like ? OR ", $arr_column);
              $query = str_replace(' OR END', '', $query);
              /* if (!empty($name)){
                $query = str_replace(' OR address', ' AND address', $query);
              } */
            } else {
              $query = str_replace('AS t_account_id WHERE', 'AS t_account_id', $query);
              $arr_column[] = 'nothing';
            }
            $stmt = $mysqli->prepare($query);
            $stmt->bind_param('i'.str_repeat('s', count($arr_column)-1), ...$arr_var);
            $count = sqlSelect($stmt);
            break;
          default:
            $query = 'SELECT * FROM t_address WHERE account_id=?';
            $stmt = $mysqli->prepare($query);
            $stmt->bind_param('i', $account_id);
            sqlSelect($stmt);
            break;
        }
        /*--データベースから切断--*/
        $mysqli->close();
        ?>
      </div>
    </div>
  </div>
  <script src="js/tab-switch-view.js"></script>
  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/toastr.min.js"></script>
  <script type="text/javascript">
    $(document).ready(function() {
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
      switch ($key) {
        case "":
          break;
        case "ログイン":
        case "新規登録":
            print 'Command: toastr.info("ログインしました");';
            break;
        case "検索":
          print 'Command: toastr.success("' . $count . '件の情報を検索しました");';
          break;
        case "登録":
        case "更新":
          print 'Command: toastr.success("' . $key . 'しました");';
          break;
        case "削除":
          print 'Command: toastr.error("' . $key . 'しました");';
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