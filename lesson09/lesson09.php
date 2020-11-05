<!DOCTYPE html>
<html>
	<head>
		<title>郵便番号検索SQLver</title>
		<meta charset="utf-8">
	</head>
	<body>
		<?php
			$postnum=$_GET["post"];
			// DBに接続
			$link = mysqli_connect(
				'yamashita.naviiiva.work',
				'naviiiva_user',
				'!Samurai1234',
				'yamashita'
			);
			// 郵便番号検索
			if (mysqli_connect_errno()) {
				die("データベースに接続できません：" . mysqli_connect_error() . "<br>");
			} else {
				echo "データベースの接続に成功しました。<br>";
				$query = "select postal7,pref,city,address from KEN_ALL where postal7 = ${postnum};";
				if ($result = mysqli_query($link, $query)) {
					echo "SELECTに成功しました。<br>";
					foreach($result as $row) {
						var_dump($row);
					}
				}
			}
			// DBを切断
			mysqli_close($link);
		?>
	</body>
</html>