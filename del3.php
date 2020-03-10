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
        <!--ジャンプメニュー読み込み-->
        <script src="yotei.js"></script>
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
			//エラー処理用変数
			$err=0;
			$mes="";
			//エラーチェック
			if($id==""){$err++;$mes.="idが正確でありません。".$syusaisya."まで連絡ください。<br>";}
			if($err!=0) {
				err_msg($mes);
				exit;
			} else {
				// データベースに保存
				$sql = "update "."$yotei_table"." set flag = 3"." where id = "."$id";
				$stmt = db_executeSQL($pdo, $sql, NULL);

				//ヘッダー部分表示
				html_header();
?>
				<div id="main">
					<h2 class="welcome">予定を削除しました。</h2>
				</div>

<?php
				//予定データ表示
				html_yotei();
?>
				<!--ジャンプ操作一覧-->
				<div id="main" style="list-style: none;">
					<p class="menu">以下から選んでください</p>
<?php
					html_menu();
					//フッター部分表示
					html_footer();
					exit();
?>
				</div>
<?php
			}
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