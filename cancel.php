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

		//$_SESSION["EMAIL"]が存在したら
		if(isset($_SESSION["EMAIL"])) {
			//ヘッダー部分表示
    		html_header();
?>
			<h2>参加を取り消す</h2>
			<div id="center">
				<p>
					キャンセルしたい予定の参加予定者の中からあなたの名前を選択してから、「参加取り消し」ボタンをクリックしてください。<br>
					くれぐれも自分以外の人をキャンセルしないように注意してください。
				</p>
<?php
				//予定データ表示
				html_cancel();
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
			err_session("セッションエラーが起きています。再度ログインしてください。");
		}
?>
	</body>
</html>