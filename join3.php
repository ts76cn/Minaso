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
		<!--ファビコンを適用-->
        <link rel="icon" href="./img/favicon.ico">
	</head>

	<body>
<?php
		// データの入力チェック
		check_input();
		// データベースへ接続する
		$pdo = db_connect();

		//$_SESSION["EMAIL"]が存在したら
		if(isset($_SESSION["EMAIL"])) {
			//check_input();
			//エラー処理用変数
			$err=0;
			$mes="";
			//エラーチェック
			if($sankasya2==""){$err++;$mes.="参加予定者の名前を入力してください。<br>";}
			if($sankasya==""){$err++;$mes.="sankasyaが正確でありません。".$syusaisya."まで連絡ください。<br>";}
			if($id==""){$err++;$mes.="idが正確でありません。".$syusaisya."まで連絡ください。<br>";}
			if($err!=0) {
				err_msg($mes);
				exit;
			} else {
				//&lt;br&gt; を<br>に置換
				$sankasya = str_replace("&lt;br&gt;", "<br>", $sankasya);
				$sankasya .= '<br>'."$sankasya2";
				//UTF-8からEUCに変換
				mb_convert_variables($db_enc, $page_enc, $sankasya);
				// データベースに保存
				$sql = "update "."$yotei_table"." set sankasya = '"."$sankasya"."' where id = "."$id";
				$stmt = db_executeSQL($pdo, $sql, NULL);

				//ヘッダー部分表示
				html_header();
?>
				<div id="main">
					<h2 class="welcome">参加を表明しました。</h2>
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
			err_session("【！】セッションエラーです。　再度ログインしてください。");
		}
?>
	</body>
</html>