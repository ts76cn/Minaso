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
			if($date1==""){$err++;$mes.="date1が正確でありません。".$syusaisya."まで連絡ください。<br>";}
			if($time1==""){$err++;$mes.="time1が正確でありません。".$syusaisya."まで連絡ください。<br>";}
			if($time2==""){$err++;$mes.="time2が正確でありません。".$syusaisya."まで連絡ください。<br>";}
			if($place==""){$err++;$mes.="placeが正確でありません。".$syusaisya."まで連絡ください。<br>";}
			if($asobi==""){$err++;$mes.="asobiが正確でありません。".$syusaisya."まで連絡ください。<br>";}
			if($sewanin==""){$err++;$mes.="sewaninが正確でありません。".$syusaisya."まで連絡ください。<br>";}
			if($flag==""){$err++;$mes.="flagが正確でありません。".$syusaisya."まで連絡ください。<br>";}
			if($timestamp==""){$err++;$mes.="timestampが正確でありません。".$syusaisya."まで連絡ください。<br>";}
			if($err!=0) {
				err_msg($mes);
				exit;
			} else {
				$comment = str_replace("&lt;br&gt;", "<br>", $comment);
				//UTF-8からEUCに変換
				mb_convert_variables($db_enc, $page_enc, $date1);
				mb_convert_variables($db_enc, $page_enc, $time1);
				mb_convert_variables($db_enc, $page_enc, $time2);
				mb_convert_variables($db_enc, $page_enc, $place);
				mb_convert_variables($db_enc, $page_enc, $asobi);
				mb_convert_variables($db_enc, $page_enc, $sewanin);
				mb_convert_variables($db_enc, $page_enc, $comment);
				mb_convert_variables($db_enc, $page_enc, $sankasya);
				// データベースに保存
				$sql = "insert into "."$yotei_table"." (date1,time1,time2,place,asobi,sewanin,comment,sankasya,flag,timestamp) values ('$date1','$time1','$time2','$place','$asobi','$sewanin','$comment','$sankasya','$flag','$timestamp')";
				$stmt = db_executeSQL($pdo, $sql, NULL);

				//ヘッダー部分表示
    			html_header();
?>
				<div id="main">
					<h2 class="welcome">予定を追加しました。</h2>
				</div>
<?php
				//予定データ表示
    			html_yotei();
?>
				<!--ジャンプ操作一覧-->
				<div id="main" style="list-style: none;">
					<p class="menu">以下から選んでください</p>
				</div>
<?php
    			html_menu();
				//フッター部分表示
				html_footer();
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