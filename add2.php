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

		//$_SESSION["EMAIL"]が存在したら
		if(isset($_SESSION["EMAIL"])) {
			//エラー処理用変数
			$err=0;
			$mes="";
			//エラーチェック
			if($date1_year=="" || $date1_month=="" || $date1_day==""){$err++;$mes.="日時が正確でありません。<br>";}
			if(!checkdate($date1_month, $date1_day, $date1_year)){$err++;$mes.="日時が正確でありません。<br>";}
			if($time1_hour=="" || $time1_minute==""){$err++;$mes.="開始時刻が選択されていません。<br>";}
			if($time2_hour=="" || $time2_minute==""){$err++;$mes.="終了時刻が選択されていません。<br>";}
			if($place=="" && $place2==""){$err++;$mes.="場所が入力されていません。<br>";}
			if($asobi==""){$err++;$mes.="予定の遊び内容が入力されていません。<br>";}
			if($sewanin==""){$err++;$mes.="呼びかけ人名が入力されていません。<br>";}
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
			// 場所データ $placeを作成
			if($place==""){
				if($place2==""){
					$place = "場所未定";
				} else {
					$place = $place2;
				}
			}

			// timstamp データを作成
			// #2 Deprecated: mktime(): The is_dst parameter is deprecated in
			$timestamp_b = mktime($time1_hour,$time1_minute,0,$date1_month,$date1_day,$date1_year);
			$timestamp = date("Y-m-d H:i:s", $timestamp_b);
			//$timestamp .= +09;
			// 曜日を変数に保存
			$youbi = date("l", $timestamp_b);
			$youbi_j = youbi_henkan($youbi);

			//ヘッダー部分表示
    		html_header();
?>

			<h2>予定を追加する　確認画面</h2>

			<div id="center">
				<p>
					下記内容でよければ、「予定を追加」ボタンをクリックしてください。<br>
					修正する場合は、「戻る」ボタンをクリックしてください。
				</p>

				<table id="add">
					<tr>
						<td class="addLeft">日　時</td>
						<td class="addRight">
<?php
							print "$date1_year".'年'."$date1_month".'月'."$date1_day".'日'."$youbi_j";
							print "$time1".' 〜 '."$time2";
?>
						</td>
					</tr>
					<tr>
						<td class="addLeft">場　所</td>
						<td class="addRight">
<?php
							print "$place";
?>
						</td>
					</tr>
					<tr>
						<td class="addLeft">予定の遊び内容</td>
						<td class="addRight">
<?php
							print "$asobi";
?>
						</td>
					</tr>
					<tr>
						<td class="addLeft">呼びかけ人の名前</td>
						<td class="addRight">
<?php
							print "$sewanin";
?>
						</td>
					</tr>
					<tr>
						<td class="addLeft">コメント</td>
						<td class="addRight">
<?php
							print "$comment";
?>
						</td>
					</tr>
				</table>

				<div class="submit">
					<form id="btnAdd" method="post" action="add3.php">
						<input type="hidden" id="date1" name="date1" value="<?=$date1?>">
						<input type="hidden" id="time1" name="time1" value="<?=$time1?>">
						<input type="hidden" id="time2" name="time2" value="<?=$time2?>">
						<input type="hidden" id="place" name="place" value="<?=$place?>">
						<input type="hidden" id="asobi" name="asobi" value="<?=$asobi?>">
						<input type="hidden" id="sewanin" name="sewanin" value="<?=$sewanin?>">
						<input type="hidden" id="comment" name="comment" value="<?=$comment?>">
						<input type="hidden" id="sankasya" name="sankasya" value="<?=$sewanin?>">
						<input type="hidden" id="flag" name="flag" value="0">
						<input type="hidden" id="timestamp" name="timestamp" value="<?=$timestamp?>">
						<input type="submit" id="btnAdd" name="btnAdd" value="予定を追加">
					</form>

					<form id="btnEdit" method="post" action="add.php">
						<input type="hidden" id="date1_year" name="date1_year" value="<?=$date1_year?>" />
						<input type="hidden" id="date1_month" name="date1_month" value="<?=$date1_month?>" />
						<input type="hidden" id="date1_day" name="date1_day" value="<?=$date1_day?>" />
						<input type="hidden" id="time1_hour" name="time1_hour" value="<?=$time1_hour?>" />
						<input type="hidden" id="time1_minute" name="time1_minute" value="<?=$time1_minute?>" />
						<input type="hidden" id="time2_hour" name="time2_hour" value="<?=$time2_hour?>" />
						<input type="hidden" id="time2_minute" name="time2_minute" value="<?=$time2_minute?>" />
						<input type="hidden" id="place" name="place" value="<?=$place?>" />
						<input type="hidden" id="asobi" name="asobi" value="<?=$asobi?>" />
						<input type="hidden" id="sewanin" name="sewanin" value="<?=$sewanin?>" />
						<input type="hidden" id="comment" name="comment" value="<?=$comment?>" />
						<input type="hidden" id="sankasya" name="sankasya" value="<?=$sewanin?>" />
						<input type="hidden" id="flag" name="flag" value="0" />
						<input type="hidden" id="timestamp" name="timestamp" value="<?=$timestamp?>" />
						<input type="submit" id="btnEdit" name="btnEdit" value="戻る" />
					</form>
				</div>
			</div>

<?php
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
			err_session("【！】セッションエラーです。　再度ログインしてください。");
		}
?>
	</body>
</html>