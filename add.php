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

		//$_SESSION["EMAIL"]が存在したら
		if(isset($_SESSION["EMAIL"])) {
			//ヘッダー部分表示
    		html_header();
?>
			<h2>予定を追加する</h2>
			<div id="center">
				<p><span class="green">※</span>は入力必須項目です。</p>
				<form method="post" action="add2.php">
					<table id="add">
						<tr>
							<td class="addLeft">日　時<span class="green"> ※</span></td>
							<td class="addRight">
								<select id="date1_year" name="date1_year">
<?php
									for($i = date("Y") ; $i <= date("Y") + 1; $i++) {
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
								</select>日

								<br class="addRight">
								<select id="time1_hour" name="time1_hour">
									<option value="">--</option>
<?php
									for($i = 0; $i <= 23; $i++) {
										if(isset($time1_hour)) {
											if($i == $time1_hour) {
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
											if($i == $time2_hour) {
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
									print '<input type="text" id="asobi" name="asobi" size="20" maxlength="20" value="'.$asobi.'"/>' . "\n";
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
									print '<textarea id="comment" name="comment" cols="50" rows="10">'.$comment.'</textarea>' . "\n";
								} else {
									print '<textarea id="comment" name="comment" cols="50" rows="10"></textarea>' . "\n";
								}
?>
								<br class="addRight">呼びかけ人よりメッセージがあれば、こちらに入力してください。
								<br class="addRight">（例）６歳の女の子です。
							</td>
						</tr>
					</table>

					<div class="submitbtnAddKakunin">
						<input type="submit" id="btnAddKakunin" name="btnAddKakunin" value="確認画面">
						<input type="reset" id="btnAddReset" name="btnAddReset" value="リセット"><br>
					</div>
				</form>
			</div>

			<!--メイン画面に戻る-->
<?php
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