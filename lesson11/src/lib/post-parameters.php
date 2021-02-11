<?php
// 受け取った入力データの格納
if (isset($_POST['id'])) {
  $id = $_POST['id'];
  $id = htmlspecialchars($id, ENT_QUOTES, 'UTF-8');
} else {
  $id = "";
}

if (isset($_POST['name'])) {
  $name = $_POST['name'];
  $name = htmlspecialchars($name, ENT_QUOTES, 'UTF-8');
} else {
  $name = "";
}

if (isset($_POST['name1'])) {
  $name1 = $_POST['name1'];
  $name1 = htmlspecialchars($name1, ENT_QUOTES, 'UTF-8');
} else {
  $name1 = "";
}

if (isset($_POST['name2'])) {
  $name2 = $_POST['name2'];
  $name2 = htmlspecialchars($name2, ENT_QUOTES, 'UTF-8');
} else {
  $name2 = "";
}

if (isset($_POST['name_kana1'])) {
  $name_kana1 = $_POST['name_kana1'];
  $name_kana1 = htmlspecialchars($name_kana1, ENT_QUOTES, 'UTF-8');
} else {
  $name_kana1 = "";
}

if (isset($_POST['name_kana2'])) {
  $name_kana2 = $_POST['name_kana2'];
  $name_kana2 = htmlspecialchars($name_kana2, ENT_QUOTES, 'UTF-8');
} else {
  $name_kana2 = "";
}

if (isset($_POST['postal'])) {
  $postal = $_POST['postal'];
  $postal = htmlspecialchars($postal, ENT_QUOTES, 'UTF-8');
} else {
  $postal = "";
}

if (isset($_POST['address'])) {
  $address = $_POST['address'];
  $address = htmlspecialchars($address, ENT_QUOTES, 'UTF-8');
} else {
  $address = "";
}

if (isset($_POST['phone'])) {
  $phone = $_POST['phone'];
  $phone = htmlspecialchars($phone, ENT_QUOTES, 'UTF-8');
} else {
  $phone = "";
}

if (isset($_POST['cellphone'])) {
  $cellphone = $_POST['cellphone'];
  $cellphone = htmlspecialchars($cellphone, ENT_QUOTES, 'UTF-8');
} else {
  $cellphone = "";
}

if (isset($_POST['mail'])) {
  $mail = $_POST['mail'];
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

?>