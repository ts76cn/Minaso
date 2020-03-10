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
			if ((!$place) && ($place2)) {
				$place = $place2;
			}
			//エラーチェック
			if($date1_year=="" || $date1_month=="" || $date1_day==""){$err++;$mes.="date1が正確でありません。".$syusaisya."まで連絡ください。<br>";}
			if($time1_hour=="" || $time1_minute==""){$err++;$mes.="time1が正確でありません。".$syusaisya."まで連絡ください。<br>>";}
			if($time2_hour=="" || $time2_minute==""){$err++;$mes.="time2が正確でありません。".$syusaisya."まで連絡ください。<br>";}
			if($place==""){$err++;$mes.="placeが正確でありません。".$syusaisya."まで連絡ください。<br>";}
			if($asobi==""){$err++;$mes.="asobiが正確でありません。".$syusaisya."まで連絡ください。<br>";}
			if($sewanin==""){$err++;$mes.="sewaninが正確でありません。".$syusaisya."まで連絡ください。<br>";}
			if($id==""){$err++;$mes.="idが正確でありません。".$syusaisya."まで連絡ください。<br>";}
			if($err!=0) {
				err_msg($mes);
				exit;
			} else {
				// 日付データ$date1 を作成
				$date_array = array($date1_year, $date1_month, $date1_day);
				$date1 = implode("-", $date_array);
				// 時間データ $time1を作成
				$time1 = "$time1_hour".'時'."$time1_minute".'分';
				// 時間データ $time2を作成
				$time2 = "$time2_hour".'時'."$time2_minute".'分';
				// timstamp データを作成
				// #2 Deprecated: mktime(): The is_dst parameter is deprecated in
				$timestamp_b = mktime($time1_hour,$time1_minute,0,$date1_month,$date1_day,$date1_year);
				$timestamp = date("Y-m-d H:i:s", $timestamp_b);
				//$timestamp .= +09;
				// &lt;br&gt; を<br>に変換
				$sankasya = str_replace('&lt;br&gt;', "<br>", $sankasya);
				$sanka = explode('<br>', $sankasya);
				//参加者名の先頭の人を呼びかけ人名にする
				$sanka[0] = $sewanin;
				$sankasyaStr = implode('<br>', $sanka);
				//UTF-8からEUCに変換
				mb_convert_variables($db_enc, $page_enc, $time1);
				mb_convert_variables($db_enc, $page_enc, $time2);
				mb_convert_variables($db_enc, $page_enc, $place);
				mb_convert_variables($db_enc, $page_enc, $asobi);
				mb_convert_variables($db_enc, $page_enc, $sewanin);
				mb_convert_variables($db_enc, $page_enc, $comment);
				mb_convert_variables($db_enc, $page_enc, $sankasyaStr);
				// データベースに保存
				$sql = "update "."$yotei_table"." set date1 = '"."$date1"."' , time1 = '"."$time1"."' , time2 = '"."$time2"."' ,place = '"."$place"."' , asobi = '"."$asobi"."' , sewanin = '"."$sewanin"."' , comment = '"."$comment"."' , sankasya = '"."$sankasyaStr"."' , timestamp = '"."$timestamp"."' where id = "."$id";
				$stmt = db_executeSQL($pdo, $sql, NULL);

				//ヘッダー部分表示
				html_header();
?>
				<div id="main">
					<h2 class="welcome">予定を変更しました。</h2>
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