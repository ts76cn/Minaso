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
			if($cancel==""){$err++;$mes.="キャンセルする人の名前を選択してください。<br>";}
			if($cancel==$sewanin){$err++;$mes.="呼びかけ人は参加取り消しできません！<br>呼びかけ人を変更する場合は、「予定を変更する」から変更してください。";}
			if($id==""){$err++;$mes.="idが正確でありません。".$syusaisya."まで連絡ください。<br>";}
			if($err!=0) {
				err_msg($mes);
				exit;
			} else {
				// cancel.php より送られてきた変数をチェックする
				// $cancel,$id
				// $id にマッチするレコードの呼び出し
				$sql = "select * from "."$yotei_table"." where id = "."$id";
				$stmt = db_executeSQL($pdo, $sql, NULL);
				$count = $stmt->rowCount();
				if($count > 0){
					while($res = $stmt->fetch(PDO::FETCH_ASSOC)) {
						$sankasya = $res["sankasya"];
					}
					//EUC-JPからUTF-8に変換
					mb_convert_variables($page_enc, $db_enc, $sankasya);
					// 参加予定者を配列にする
					$sankasya_array = explode("<br>",$sankasya);
					// 新しい空の配列を作成
					$sankasya_array2 = array();
					// 一度の操作で同じ名前の人を複数削除しないようにフラグを立てる
					$same_name_flag=0;
					foreach($sankasya_array as $value) {
						if(($value != $cancel) || ($same_name_flag==1)) {
							array_push($sankasya_array2,$value);
						} else {
							$same_name_flag=1;
						}
					}
					$sankasya = implode("<br>",$sankasya_array2);
				}
				//UTF-8からEUCに変換
				mb_convert_variables($db_enc, $page_enc, $sankasya);
				// データベースに保存
				$sql = "update "."$yotei_table"." set sankasya = '"."$sankasya"."' where id = "."$id";
				$stmt = db_executeSQL($pdo, $sql, NULL);

				//ヘッダー部分表示
				html_header();
?>

				<div id="main">
					<h2 class="welcome">参加を取り消しました。</h2>
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
			err_session("【！】セッションエラーです。　再度ログインしてください。");
		}
?>
	</body>
</html>