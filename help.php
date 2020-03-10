<?php
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
	</head>

	<body>
<?php
		//ヘッダー部分表示
		html_header();
?>
		<h2>はじめに</h2>
		<p><strong><?=$appli_name?></strong>は、障害の有無に関わらず、地域の子供たちが一緒に遊ぶ事を目的とした掲示板式コミュニティです。
			個々の性格や運動面での制約など相互に理解を深めて、長い人生で友人関係を深めていくきっかけとなりましたら幸いです。
			お子様が遊ばれる際は、必ず大人の方が同伴されるようにご理解ご協力をよろしくお願いします。
			<strong>PHP</strong>というプログラミング言語と<strong>MySQL</strong>というデータベースを組み合わせて <a href="http://digmat.com/" target="_blank">DIGMAT.com</a>が開発したものです。<br>
			プログラムの著作権はDIGMAT.comに帰属します。動作不具合やご要望、その他お問い合わせは、<a href="http://digmat.com/" target="_blank">DIGMAT.com</a>へお問い合わせください。<br><br>
			ブラウザの設定でクッキーを有効にしてください。ページ間の移動ができない場合があります。
		</p>
<?php
		// ログイン画面に戻る
		html_logout() ;
		//フッター部分表示
		html_footer();
?>
	</body>
</html>