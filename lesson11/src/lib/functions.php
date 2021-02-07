<?php
/*--SQLでデータを取得した際の操作--*/
function sqlSelect($mysqli, $query){
  $stmt = $mysqli->prepare($query);
  switch ($stmt) {
    case false:
      print "<p>次の操作に失敗しました...";
      print $query . "</p>";
      $error = "エラーNo." . $mysqli->errno . ":" . $mysqli->error;
      print $error;
      break;
    case true:
      $stmt->execute();
      $result = $stmt->get_result();
      $stmt->free_result();
      return queryGetRecord($result);
      break;
    default:
      print "例外が発生しました";
      break;
  }
}
/*--SQlでデータを取得した場合テーブルタグでHTMLに表示する--*/
function queryGetRecord($result){
  if ($result !== false) {
    $count = $result->num_rows;
    echo createHtmlTable($result, $count);
    return $count;
  }
}
/*--テーブルタグ生成--*/
function createHtmlTable($result, $count){
  $ffields = $result->fetch_fields();
  $html = '<table>';
  // カラム名
  $html .= '<tr class="panel panelhead is-show">';
  foreach ($ffields as $val) {
    switch ($val->name) {
      case 'id';
        $html .= "<th hidden>id</th>";
        break;
      case 'name1':
        $html .= '<th class="' . $val->name . '">姓</th>';
        break;
      case 'name2':
        $html .= '<th class="' . $val->name . '">名</th>';
        break;
      case 'name_kana1':
        $html .= '<th class="' . $val->name . '">姓（かな）</th>';
        break;
      case 'name_kana2':
        $html .= '<th class="' . $val->name . '">名（かな）</th>';
        break;
      case 'postal':
        $html .= '<th class="' . $val->name . '">郵便番号</th>';
        break;
      case 'address':
        $html .= '<th class="' . $val->name . '">住所</th>';
        break;
      case 'phone':
        $html .= '<th class="' . $val->name . '">電話番号</th>';
        break;
      case 'cellphone':
        $html .= '<th class="' . $val->name . '">携帯番号</th>';
        break;
      case 'mail':
        $html .= '<th class="' . $val->name . '">メールアドレス</th>';
        break;
      default:
        $html .= "<th>error</th>";
        break;
    }
  }
  $html .= '<th class="kousin">更新</th>';
  $html .= '<th class="sakujyo">削除</th>';
  $html .= "</tr>";
  // レコード
  foreach ($result as $row) {
    $html .= '<tr class="panel ' . nameCheck($row["name_kana1"]) . ' is-show">';
    foreach ($ffields as $val) {
      $value = $row[$val->name];
      switch ($val->name) {
        case 'id';
          $html .= '<form method="post" id="form_id' . $row['id'] . '"></form>';
          $html .= '<td hidden><input type="hidden" name="' . $val->name . '" value="' . $value . '" form="form_id' . $row['id'] . '"></td>';
          break;
        case 'phone':
        case 'cellphone':
        case 'mail':
          if ($value) {
            $html .= '<td class="' . $val->name . '"><input type="hidden" name="' . $val->name . '" value="' . $value . '" form="form_id' . $row['id'] . '">' . $value . '</td>';
          } else {
            $html .= '<td class="' . $val->name . '">なし</td>';
          }
          break;
        default:
          $html .= '<td class="' . $val->name . '"><input type="hidden" name="' . $val->name . '" value="' . $value . '" form="form_id' . $row['id'] . '">' . $value . '</td>';
          break;
      }
    }
    $html .= '<td class="kousin"><input type="submit" name="key" form="form_id' . $row['id'] . '" value="更新" formaction="address_add.php"></td>';
    $html .= '<td class="sakujyo"><input type="submit" name="key" form="form_id' . $row['id'] . '" value="削除" formaction="address_check.php"></td>';
    $html .= "</tr>";
  }
  if ($count !== 0) {
    $html .= '<tr class="panel panelbottom"><td colspan="11">登録情報がありません</td></tr>';
  } else {
    $html .= '<tr class="panel panelbottom is-show"><td colspan="11">登録情報がありません</td></tr>';
  }
  $html .= "</table>";
  return $html;
}
/*--タブ表示時のグループ分け--*/
function nameCheck($name){
  if (preg_match('/^[あ-お]/u', $name)) {
    return "panel-1";
  } elseif (preg_match('/^[か-こ]/u', $name)) {
    return "panel-2";
  } elseif (preg_match('/^[さ-そ]/u', $name)) {
    return "panel-3";
  } elseif (preg_match('/^[た-と]/u', $name)) {
    return "panel-4";
  } elseif (preg_match('/^[な-の]/u', $name)) {
    return "panel-5";
  } elseif (preg_match('/^[は-ほ]/u', $name)) {
    return "panel-6";
  } elseif (preg_match('/^[ま-も]/u', $name)) {
    return "panel-7";
  } elseif (preg_match('/^[や-よ]/u', $name)) {
    return "panel-8";
  } elseif (preg_match('/^[ら-ろ]/u', $name)) {
    return "panel-9";
  } elseif (preg_match('/^[わ]/u', $name)) {
    return "panel-10";
  }
}
?>