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
			//エラー処理用変数
			$err=0;
			$mes="";
			//エラーチェック
			if($id==""){$err++;$mes.="idが正確でありません。".$syusaisya."まで連絡ください。<br>";}
			if($err!=0) {
				err_msg($mes);
				exit;
			} else {
				// データベースから一致するidのレコードを読みとる
				$sql = "select * from "."$yotei_table"." where id = "."$id";
				$stmt = db_executeSQL($pdo, $sql, NULL);
				$count = $stmt->rowCount();
				if($count > 0){
					while($res = $stmt->fetch(PDO::FETCH_ASSOC)) {
						if($res) {
							$start_day = explode("-", $res["date1"]);
							$date1_year = $start_day[0];
							$date1_month = $start_day[1];
							$date1_day = $start_day[2];
							//$the_time = mktime(0,0,0,$date1_month,$date1_day,$date1_year);
							//$youbi = date("l", $the_time);
							// 曜日を日本語になおす関数のよびだし
							//$youbi2 = youbi_henkan($youbi);
							// 月のケタをなおす
							if($date1_month == "01") {
								$date1_month = "1";
							} else if($date1_month == "02") {
								$date1_month = "2";
							} else if($date1_month == "03") {
								$date1_month = "3";
							} else if($date1_month == "04") {
								$date1_month = "4";
							} else if($date1_month == "05") {
								$date1_month = "5";
							} else if($date1_month == "06") {
								$date1_month = "6";
							} else if($date1_month == "07") {
								$date1_month = "7";
							} else if($date1_month == "08") {
								$date1_month = "8";
							} else if($date1_month == "09") {
								$date1_month = "9";
							}
							// 日のケタをなおす
							if($date1_day == "01") {
								$date1_day = "1";
							} else if($date1_day == "02") {
								$date1_day = "2";
							} else if($date1_day == "03") {
								$date1_day = "3";
							} else if($date1_day == "04") {
								$date1_day = "4";
							} else if($date1_day == "05") {
								$date1_day = "5";
							} else if($date1_day == "06") {
								$date1_day = "6";
							} else if($date1_day == "07") {
								$date1_day = "7";
							} else if($date1_day == "08") {
								$date1_day = "8";
							} else if($date1_day == "09") {
								$date1_day = "9";
							}
							// 現在の日付のデータが、それぞれ$date1_year,$date1_month,$date1_dayに入る
							//$start_day2 = "$date1_month".'／'."$date1_day";
							//$start_day2 .= $youbi2;
							// 日付の完成スタイルは「4／5（火）」のようになる
							$start_time = $res["time1"];
							$end_time = $res["time2"];
							$start_hour = explode("時", $start_time);
							$time1_hour = $start_hour[0];
							$start_minute = explode("分", $start_hour[1]);
							$time1_minute = $start_minute[0];
							// $time1_hour と $time1_minute が開始時刻の数値になる
							$end_hour = explode("時", $end_time);
							$time2_hour = $end_hour[0];
							$end_minute = explode("分", $end_hour[1]);
							$time2_minute = $end_minute[0];
							// $time2_hour と $time2_minute が終了時刻の数値になる
							$place = $res["place"];
							$asobi = $res["asobi"];
							$sewanin = $res["sewanin"];
							$comment = $res["comment"];
							$sankasya = $res["sankasya"];
							//$flag = $res["flag"];
							//EUC-JPからUTF-8に変換
							//mb_convert_variables("UTF-8", "EUC-JP", &$start_time, &$end_time, &$place, &$asobi, &$sewanin, &$comment, &$sankasya, &$flag);
							mb_convert_variables($page_enc, $db_enc, $start_time);
							mb_convert_variables($page_enc, $db_enc, $end_time);
							mb_convert_variables($page_enc, $db_enc, $place);
							mb_convert_variables($page_enc, $db_enc, $asobi);
							mb_convert_variables($page_enc, $db_enc, $sewanin);
							mb_convert_variables($page_enc, $db_enc, $comment);
							mb_convert_variables($page_enc, $db_enc, $sankasya);
						}
					}
				}
				//ヘッダー部分表示
				html_header();
?>
				<h2>予定を変更する</h2>
				<div id="center">
					<p>変更したい部分を修正してから、変更を確定するボタンをクリックしてください。</p>
					<form method="post" action="edit3.php">
						<table id="add">
							<tr>
								<td class="addLeft">日　時<span class="green"> ※</span></td>
								<td class="addRight">
									<select id="date1_year" name="date1_year">
<?php
										for($i =$date1_year; $i <= $date1_year + 1; $i++) {
											if($date1_year) {
												if($i == $date1_year) {
													print '<option value="' . $i . '" selected>' . $i . '</option>' . "\n";
												} else {
													print '<option value="' . $i .'">' . $i . '</option>' . "\n";
												}
											} else {
												if($i == date("Y")) {
													print '<option value="' . $i . '" selected>' . $i . '</option>' . "\n";
												} else {
													print '<option value="' . $i .'">' . $i . '</option>' . "\n";
												}
											}
										}
?>
									</select>年
									<select id="date1_month" name="date1_month">
<?php
										for($i=1; $i<=12; $i++) {
											if($date1_month) {
												if($i == $date1_month) {
													print '<option value="' . $i . '" selected>' . $i . '</option>' . "\n";
												} else {
													print '<option value="' . $i .'">' . $i . '</option>' . "\n";
												}
											} else {
												if($i == date("n")) {
													print '<option value="' . $i .'" selected>' . $i . '</option>' . "\n";
												} else {
													print '<option value="' . $i .'">' . $i . '</option>' . "\n";
												}
											}
										}
?>
									</select>月
									<select id="date1_day" name="date1_day">
<?php
										for($i = 1; $i <= 31; $i++) {
											if($date1_day) {
												if($i == $date1_day) {
													print '<option value="' . $i . '" selected>' . $i . '</option>' . "\n";
												} else {
													print '<option value="' . $i .'">' . $i . '</option>' . "\n";
												}
											} else {
												if($i == date("j")) {
													print '<option value="' . $i .'" selected>' . $i . '</option>' . "\n";
												} else {
													print '<option value="' . $i .'">' . $i . '</option>' . "\n";
												}
											}
										}
?>
									</select>日<br class="addRight" />
									<select id="time1_hour" name="time1_hour">
										<option value="">--</option>
<?php
										for($i = 0; $i <= 23; $i++) {
											if(isset($time1_hour)) {
												if($i == (int)$time1_hour) {
													print '<option value="' . $i . '" selected>' . $i . '</option>' . "\n";
												} else {
													print '<option value="' . $i .'">' . $i . '</option>' . "\n";
												}
											} else {
												print '<option value="' . $i .'">' . $i . '</option>' . "\n";
											}
										}
?>
									</select>時
									<select id="time1_minute" name="time1_minute">
<?php
										if(!$time1_minute) {
											print '<option value="">--</option>' . "\n";
											print '<option value="00" selected>00</option>' . "\n";
											print '<option value="15">15</option>' . "\n";
											print '<option value="30">30</option>' . "\n";
											print '<option value="45">45</option>' . "\n";
										} else {
											if($time1_minute == "15") {
												print '<option value="">--</option>' . "\n";
												print '<option value="00">00</option>' . "\n";
												print '<option value="15" selected>15</option>' . "\n";
												print '<option value="30">30</option>' . "\n";
												print '<option value="45">45</option>' . "\n";
											} else if($time1_minute == "30") {
												print '<option value="">--</option>' . "\n";
												print '<option value="00">00</option>' . "\n";
												print '<option value="15">15</option>' . "\n";
												print '<option value="30" selected>30</option>' . "\n";
												print '<option value="45">45</option>' . "\n";
											} else if($time1_minute == "45") {
												print '<option value="">--</option>' . "\n";
												print '<option value="00">00</option>' . "\n";
												print '<option value="15">15</option>' . "\n";
												print '<option value="30">30</option>' . "\n";
												print '<option value="45" selected>45</option>' . "\n";
											} else {
												print '<option value="">--</option>' . "\n";
												print '<option value="00" selected>00</option>' . "\n";
												print '<option value="15">15</option>' . "\n";
												print '<option value="30">30</option>' . "\n";
												print '<option value="45">45</option>' . "\n";
											}
										}
?>
									</select>分 〜
									<select id="time2_hour" name="time2_hour">
										<option value="">--</option>
<?php
										for($i = 0; $i <= 23; $i++) {
											if(isset($time2_hour)) {
												if($i == (int)$time2_hour) {
													print '<option value="' . $i . '" selected>' . $i . '</option>' . "\n";
												} else {
													print '<option value="' . $i .'">' . $i . '</option>' . "\n";
												}
											} else {
												print '<option value="' . $i .'">' . $i . '</option>' . "\n";
											}
										}
?>
									</select>時
									<select id="time2_minute" name="time2_minute">
<?php
										if(!$time2_minute) {
											print '<option value="">--</option>' . "\n";
											print '<option value="00" selected>00</option>' . "\n";
											print '<option value="15">15</option>' . "\n";
											print '<option value="30">30</option>' . "\n";
											print '<option value="45">45</option>' . "\n";
										} else {
											if($time2_minute == "15") {
												print '<option value="">--</option>' . "\n";
												print '<option value="00">00</option>' . "\n";
												print '<option value="15" selected>15</option>' . "\n";
												print '<option value="30">30</option>' . "\n";
												print '<option value="45">45</option>' . "\n";
											} else if($time2_minute == "30") {
												print '<option value="">--</option>' . "\n";
												print '<option value="00">00</option>' . "\n";
												print '<option value="15">15</option>' . "\n";
												print '<option value="30" selected>30</option>' . "\n";
												print '<option value="45">45</option>' . "\n";
											} else if($time2_minute == "45") {
												print '<option value="">--</option>' . "\n";
												print '<option value="00">00</option>' . "\n";
												print '<option value="15">15</option>' . "\n";
												print '<option value="30">30</option>' . "\n";
												print '<option value="45" selected>45</option>' . "\n";
											} else {
												print '<option value="">--</option>' . "\n";
												print '<option value="00" selected>00</option>' . "\n";
												print '<option value="15">15</option>' . "\n";
												print '<option value="30">30</option>' . "\n";
												print '<option value="45">45</option>' . "\n";
											}
										}
?>
									</select>分
								</td>
							</tr>
							<tr>
								<td class="addLeft">場　所<span class="green"> ※</span></td>
								<td class="addRight">
									<select id="place" name="place">
<?php
										if($place) {
											if($place == "古城児童館") {
												print '<option value="">▼選択してください</option>' . "\n";
												print '<option value="古城児童館" selected>古城児童館</option>' . "\n";
											} else {
												print '<option value="" selected>▼選択してください</option>' . "\n";
												print '<option value="古城児童館">古城児童館</option>' . "\n";
											}
										} else {
											print '<option value="" selected>▼選択してください</option>' . "\n";
											print '<option value="古城児童館">古城児童館</option>' . "\n";
										}
?>
									</select>
									<br class="addRight">
									上記以外の場所は入力
<?php
									if($place) {
										if($place != "古城児童館") {
											print '<input type="text" id="place2" name="place2" size="20" maxlength="20" value="'.$place.'" />' . "\n";
										} else {
											print '<input type="text" id="place2" name="place2" size="20" maxlength="20" value="" />' . "\n";
										}
									} else {
										print '<input type="text" id="place2" name="place2" size="20" maxlength="20" value="" />' . "\n";
									}
?>
								</td>
							</tr>
							<tr>
								<td class="addLeft">予定の遊び内容<span class="green"> ※</span></td>
								<td class="addRight">
<?php
									if($asobi) {
										print '<input type="text" id="asobi" name="asobi" size="20" maxlength="20" value="'.$asobi.'" />' . "\n";
									} else {
										print '<input type="text" id="asobi" name="asobi" size="20" maxlength="20" value="" />' . "\n";
									}
?>
								</td>
							</tr>
							<tr>
								<td class="addLeft">呼びかけ人の名前<span class="green"> ※</span></td>
								<td class="addRight">
<?php
									if($sewanin) {
										print '<input type="text" id="sewanin" name="sewanin" size="20" maxlength="20" value="'.$sewanin.'"/>' . "\n";
									} else {
										print '<input type="text" id="sewanin" name="sewanin" size="20" maxlength="20" value="" />' . "\n";
									}
?>
									<br class="addRight">呼びかけ人は自動的に参加予定者に追加されます。
								</td>
							</tr>
							<tr>
								<td class="addLeft">コメント</td>
								<td class="addRight">
<?php
									if($comment) {
										//<br>を\nに変換する
										$comment = str_replace("&lt;br&gt;", "\n", $comment);
										$comment = str_replace("<br>", "\n", $comment);
										print '<textarea id="comment" name="comment" cols="50" rows="10">'.$comment.'</textarea>' . "\n";
									} else {
										print '<textarea id="comment" name="comment" cols="50" rows="10"></textarea>' . "\n";
									}
?>
									<br class="addRight">
									呼びかけ人よりメッセージがあれば、こちらに入力してください。
									<br class="addRight">
									（例）初めての参加です。よろしくお願いします！
								</td>
							</tr>
						</table>
						<div class="submitEdit2">
							<input type="submit" id="btnAdd" name="btnAdd" value="変更を確定する">
							<input type="hidden" name="sankasya" value="<?=$sankasya?>">
							<input type="hidden" name="id" value="<?=$id?>">
							<input type="button" id="btnEdit" name="btnEdit" value="一つ前に戻る" onClick="history.back()">
						</div>
					</form>
				</div>
<?php
				//フッター部分表示
				html_footer();
				exit();
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