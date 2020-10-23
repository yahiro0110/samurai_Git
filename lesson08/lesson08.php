<!DOCTYPE html>
<html>
	<head>
		<title>郵便番号検索</title>
		<meta charset="utf-8">
	</head>
	<body>
		<?php
			$postnum=$_GET["post"];
			echo "郵便番号は${postnum}です";
			if (($fp = fopen("KEN_ALL.CSV","r")) === FALSE) {
				die("CSVファイル読み込みエラー");
			}
			while (($array = fgetcsv($fp)) !== FALSE) {
				if ($array[2]==$postnum) {
					$str = "<p>" . mb_convert_encoding($array[6] . $array[7] . $array[8] , 'UTF-8', 'SJIS') . "</p>";
					echo "$str";
				}
			}
			fclose($fp);
		?> 
	</body>
</html>