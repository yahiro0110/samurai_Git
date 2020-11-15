<!DOCTYPE html>
<html lang="ja">
  <head>
    <title>SQL実行</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style10.css">
  </head>
  <body>
    <form method="post">
      <p>SQL:</p>
      <textarea name="query" cols="100" rows="10"></textarea>
      <input type="submit" value="表示">
    </form>
    <?php
			/*--関数（SQlでデータを取得した場合テーブルタグでHTMLに表示する）--*/
      function queryGetRecord($result) {
        if ($result !== TRUE) {
          echo createHtmlTable($result);
          $result->free();
        }
      }
      function createHtmlTable($result) {
        $html = "<table>";
        // カラム名
        $ffields = $result->fetch_fields();
        $html .= "<tr>";
        foreach ($ffields as $val) {
          $html .= "<th>" . $val->name . "</th>";
        }
        $html .= "</tr>";
        // レコード
        foreach ($result as $row) {
          $html .= "<tr>";
          foreach ($ffields as $val) {
            $value = $row[$val->name];
            $html .= "<td>${value}</td>";
          }
          $html .= "</tr>";
        }
        $html .= "</table>";
        return $html;
			}
			/*--SQL処理--*/
      // MYSQLのアクセス情報
      $host = 'yamashita.naviiiva.work';
      $user_name = 'naviiiva_user';
      $password = '!Samurai1234';
      $database_name = 'yamashita';
      // データベースへの接続
      $mysqli = new mysqli($host, $user_name, $password, $database_name);
      // 接続エラーの確認
      if ($mysqli->connect_error) {
        die("<p>接続に失敗しました（" . $mysqli->connect_errno . "）". $mysqli->connect_error. "</p>");
      }
      // echo "<p>接続に成功しました..." . $host ."/" . $database_name . "</p>";
      // データの取得
      if (!empty($_POST["query"])) {
        $query = $_POST["query"];
        $result = $mysqli->query($query);
        // var_dump($result);
        switch ($result) {
          case FALSE:
            echo "<p>次の操作に失敗しました...";
            echo $query ."</p>";
            $error = "エラーNo." . $mysqli->errno . ":" . $mysqli->error;
            echo $error;
            break;
          case TRUE:
            echo "<p>次の操作に成功しました...";
            echo $query ."</p>";
            queryGetRecord($result);
            break;
          default:
            echo "例外処理";
            break;
        }
      }
      // データベースから切断
      $mysqli->close();
    ?>
  </body>
</html>