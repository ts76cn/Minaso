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
		<!--ファビコンを適用-->
        <link rel="icon" href="./img/favicon.ico">
	</head>

	<body>
<?php
		// データの入力チェック
		check_input();
		// データベースへ接続する
		$pdo = db_connect();

		///$_SESSION["EMAIL"]が存在したら
		if(isset($_SESSION["EMAIL"])) {

			//ヘッダー部分表示
			html_header();
?>

			<h2>予定を変更する</h2>
			<div id="center">
				<p>変更したい予定を下記から選んで、「この予定を変更」ボタンをクリックしてください。</p>
<?php
				//予定データ表示
				html_edit();
?>
			</div><br>
<?php
			//メイン画面に戻る
			print "<form action=\"\">
				<a href=\"$fileMAIN\">メイン画面に戻る</a>　
			</form>";

			//フッター部分表示
			html_footer();
			exit();
		//$_SESSION["EMAIL"]が存在しなかったら
		} else {
			// セッションを破棄
			$_SESSION = array();
			session_destroy();
			//セッションエラー画面表示
			err_session("【！】セッションエラーです。　再度ログインしてください。");
		}
?>
	</body>
</html>