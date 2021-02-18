<?php
/**
 * POST、もしくはSessionで受け取った値の処理をおこなう。
 * 取得出来ない場合は、""で返す。
 */
if (isset($_POST['id'])) {
  $id = preg_replace('/\A[\p{Cc}\p{Cf}\p{Z}]++|[\p{Cc}\p{Cf}\p{Z}]++\z/u', '', $_POST['id']);
  $id = htmlspecialchars($id, ENT_QUOTES, 'UTF-8');
} else {
  $id = "";
}

if (isset($_POST['name'])) {
  $name = preg_replace('/\A[\p{Cc}\p{Cf}\p{Z}]++|[\p{Cc}\p{Cf}\p{Z}]++\z/u', '', $_POST['name']);
  $name = htmlspecialchars($name, ENT_QUOTES, 'UTF-8');
} else {
  $name = "";
}

if (isset($_POST['name1'])) {
  $name1 = preg_replace('/\A[\p{Cc}\p{Cf}\p{Z}]++|[\p{Cc}\p{Cf}\p{Z}]++\z/u', '', $_POST['name1']);
  $name1 = htmlspecialchars($name1, ENT_QUOTES, 'UTF-8');
} else {
  $name1 = "";
}

if (isset($_POST['name2'])) {
  $name2 = preg_replace('/\A[\p{Cc}\p{Cf}\p{Z}]++|[\p{Cc}\p{Cf}\p{Z}]++\z/u', '', $_POST['name2']);
  $name2 = htmlspecialchars($name2, ENT_QUOTES, 'UTF-8');
} else {
  $name2 = "";
}

if (isset($_POST['name_kana1'])) {
  $name_kana1 = preg_replace('/\A[\p{Cc}\p{Cf}\p{Z}]++|[\p{Cc}\p{Cf}\p{Z}]++\z/u', '', $_POST['name_kana1']);
  $name_kana1 = htmlspecialchars($name_kana1, ENT_QUOTES, 'UTF-8');
} else {
  $name_kana1 = "";
}

if (isset($_POST['name_kana2'])) {
  $name_kana2 = preg_replace('/\A[\p{Cc}\p{Cf}\p{Z}]++|[\p{Cc}\p{Cf}\p{Z}]++\z/u', '', $_POST['name_kana2']);
  $name_kana2 = htmlspecialchars($name_kana2, ENT_QUOTES, 'UTF-8');
} else {
  $name_kana2 = "";
}

if (isset($_POST['postal'])) {
  $postal = preg_replace('/\A[\p{Cc}\p{Cf}\p{Z}]++|[\p{Cc}\p{Cf}\p{Z}]++\z/u', '', $_POST['postal']);
  $postal = htmlspecialchars($postal, ENT_QUOTES, 'UTF-8');
} else {
  $postal = "";
}

if (isset($_POST['address'])) {
  $address = preg_replace('/\A[\p{Cc}\p{Cf}\p{Z}]++|[\p{Cc}\p{Cf}\p{Z}]++\z/u', '', $_POST['address']);
  $address = htmlspecialchars($address, ENT_QUOTES, 'UTF-8');
} else {
  $address = "";
}

if (isset($_POST['phone'])) {
  $phone = preg_replace('/\A[\p{Cc}\p{Cf}\p{Z}]++|[\p{Cc}\p{Cf}\p{Z}]++\z/u', '', $_POST['phone']);
  $phone = htmlspecialchars($phone, ENT_QUOTES, 'UTF-8');
} else {
  $phone = "";
}

if (isset($_POST['cellphone'])) {
  $cellphone = preg_replace('/\A[\p{Cc}\p{Cf}\p{Z}]++|[\p{Cc}\p{Cf}\p{Z}]++\z/u', '', $_POST['cellphone']);
  $cellphone = htmlspecialchars($cellphone, ENT_QUOTES, 'UTF-8');
} else {
  $cellphone = "";
}

if (isset($_POST['mail'])) {
  $mail = preg_replace('/\A[\p{Cc}\p{Cf}\p{Z}]++|[\p{Cc}\p{Cf}\p{Z}]++\z/u', '', $_POST['mail']);
  $mail = htmlspecialchars($mail, ENT_QUOTES, 'UTF-8');
} else {
  $mail = "";
}

if (isset($_POST['key'])) {
  $key = $_POST['key'];
  $key = htmlspecialchars($key, ENT_QUOTES, 'UTF-8');
} else {
  $key = "";
}

if (isset($_POST['user'])) {
  $user = preg_replace('/\A[\p{Cc}\p{Cf}\p{Z}]++|[\p{Cc}\p{Cf}\p{Z}]++\z/u', '', $_POST['user']);
  $user = htmlspecialchars($user, ENT_QUOTES, 'UTF-8');
} elseif (isset($_SESSION['user'])) {
  $user = $_SESSION['user'];
  $user = htmlspecialchars($user, ENT_QUOTES, 'UTF-8');
} else {
  $user = "";
}

if (isset($_POST['pass'])) {
  $pass = password_hash($_POST['pass'], PASSWORD_DEFAULT);
} elseif (isset($_SESSION['pass'])) {
} else {
  $pass = "";
}

if (isset($_SESSION['account_id'])) {
  $account_id = $_SESSION['account_id'];
  $account_id = htmlspecialchars($account_id, ENT_QUOTES, 'UTF-8');
} else {
  // sessionが切れた場合はログイン画面に戻る
  header('Location:login.php');
}

?>