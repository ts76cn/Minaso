<?php
// セッション生成
session_start();
// 初期設定を読み込む
require_once("ini.php");
// 関数ライブラリを読み込む
require_once("lib.php");
?>

<!DOCTYPE html>
<html lang="ja">
	<head>
    	<meta name="Content-Style-Type" content="text/css">
    	<!--CSSを適用-->
    	<link rel="stylesheet" type="text/css" href="./css/minaso.css">
		<title>みんなで遊ぼう！</title>
	</head>

	<body>
<?php
		// データの入力チェック
		check_input();
		// データベースへ接続する
		$pdo = db_connect();
?>
		<div id="container">
<?php
			//ヘッダー部分表示
			html_header2();

			//POSTのvalidate
			if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
				print "入力された値が不正です。<br><br>";
				//メールアドレス登録画面へ
				print "<a href=\"" . $fileLOGOUT . "\">戻る</a>";
				return false;
			}
			//DB内でPOSTされたメールアドレスを検索
			try {
				$pdo = new PDO(_DSN, _DB_USER, _DB_PASS);
				$stmt = $pdo->prepare('select * from user where mail = ?');
				$stmt->execute([$_POST['email']]);
				$row = $stmt->fetch(PDO::FETCH_ASSOC);
			} catch (\Exception $e) {
				echo $e->getMessage() . PHP_EOL;
			}
			//emailがDB内に存在しているか確認
			if (!isset($row['mail'])) {
				echo 'メールアドレス又はパスワードが間違っています<br><br>';
?>
				<!-- メールアドレス登録画面へ -->
				<a href="<?=$fileLOGOUT?>">戻る</a>
<?php
				return false;
			}
			//パスワード確認後sessionにメールアドレスを渡す
			if (password_verify($_POST['password'], $row['password'])) {
				session_regenerate_id(true); //session_idを新しく生成し、置き換える
				$_SESSION['EMAIL'] = $row['mail'];
			// ステータスコードを出力
				http_response_code( 301 ) ;
			// リダイレクト
				header( "Location: ./main.php" ) ;
				exit ;
			} else {
				echo 'メールアドレス又はパスワードが間違っています。<br><br>';
				// ログイン画面に戻る
				html_logout() ;
				return false;
			}
?>
		</div><br>
<?php
		//フッター部分表示
		html_footer();
?>
	</body>
</html>
