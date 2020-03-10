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
    	<!--CSS適用-->
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

        //$_SESSION["EMAIL"]が存在する場合
        if(isset($_SESSION["EMAIL"])) {

            //ヘッダー部分表示
            html_header();
            //予定データ表示
            html_yotei();
?>
          <!--ジャンプ操作一覧-->
            <div id="main" style="list-style: none;">
                <p class="menu">以下から選んでください</p>
            </div>
<?php
           html_menu();
            //$_SESSION["EMAIL"]が存在しない場合
        } else {
            // セッションを破棄
            $_SESSION = array();
            session_destroy();
            //セッションエラー画面表示
            err_session("セッションエラーが起きています。再度ログインしてください。");
        }
?>
        <br>
<?php
        //フッター部分表示
        html_footer();
?>
	</body>
</html>
