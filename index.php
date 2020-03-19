<?php
	// セッション生成
	session_start();
	// セッションを破棄
	$_SESSION = array();
	session_destroy();
	// 初期設定を読み込む
	require_once("ini.php");
	// 関数ライブラリを読み込む
	require_once("lib.php");
?>

<!DOCTYPE html>
<html lang = "ja">
	<head>
    	<meta name = "Content-Style-Type" content = "text/css" charset="<?=$page_enc?>">
		<!--CSSを適用-->
    	<link rel = "stylesheet" type = "text/css" href = "./css/minaso.css">
		<title>みんなで遊ぼう！</title>
		<!--ファビコンを適用-->
        <link rel="icon" href="./img/favicon.ico">
	</head>

	<body>
		<div id="container">
<?php
			// データベースへ接続する
			$pdo = db_connect();

	        //ログイン前header表示
			html_header2();
			// 「はじめに」表示
			html_help();
?>
			<h5>メンバー登録済みの方は、以下を入力して「連絡帳へGo!」をクリックしてください<br>※ポートフォリオ公開用に、以下のアドレス・パスワードの入力をお願いします。</h5>
			<form method="post" action="<?=$fileLOGIN?>">
				<input type="email" name="email" size="40" placeholder="ts76cn@gmail.com" value="<?php if( !empty($_POST['name']) ){ echo $_POST['name']; } ?>"><br>
				<input type="password" name="password" placeholder="pass" maxlength="8" value="<?php if( !empty($_POST['password']) ){ echo $_POST['password']; } ?>"><br>
				<input id="submit_button" type="submit" name="submit" value="連絡帳へGo!">
			</form><br>
			<p class="header">初めての方もお気軽にご参加ください<br>★★★見学大歓迎！★★★</p>
		</div>
		<div id="new_member">
			<a href="<?=$fileNEW?>">●新規メンバー登録●</a>
		</div><br>
<?php
		//フッター部分表示
		html_footer();
?>
	</body>
</html>