<?php
// セッション生成
session_start();
//クロスサイトリクエストフォージェリ（CSRF）対策
$_SESSION['token'] = base64_encode(openssl_random_pseudo_bytes(32));
$token = $_SESSION['token'];
//クリックジャッキング対策
header('X-FRAME-OPTIONS: SAMEORIGIN');
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
        //エラーメッセージの初期化
        $errors = array();
        // データベースへ接続する
        $pdo = db_connect();

        //ログイン前header表示
        html_header2();
?>
        <br>
<?php
        //送信ボタンクリックした後の処理
        if (isset($_POST['submit'])) {
            //メールアドレス空欄の場合
            if (empty($_POST['mail'])) {
                $errors['mail'] = 'メールアドレスが未入力です。';
            }else{
                //POSTされたデータを変数に入れる
                $mail = isset($_POST['mail']) ? $_POST['mail'] : NULL;
                //メールアドレス構文チェック
                if(!preg_match("/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/", $mail)){
                    $errors['mail_check'] = "メールアドレスの形式が正しくありません。";
                }
                //DB確認
                $sql = "SELECT id FROM user WHERE mail=:mail";
                $stm = $pdo->prepare($sql);
                $stm->bindValue(':mail', $mail, PDO::PARAM_STR);
                $stm->execute();
                $result = $stm->fetch(PDO::FETCH_ASSOC);
                //user テーブルに同じメールアドレスがある場合、エラー表示
                if(isset($result["id"])){
                    $errors['user_check'] = "このメールアドレスはすでに利用されています。";
                }
            }
            //エラーがない場合、pre_userテーブルにインサート
            if (count($errors) === 0){
                $urltoken = hash('sha256',uniqid(rand(),1));
                $url = "http://localhost/minaso/signup.php?urltoken=".$urltoken;
                //ここでデータベースに登録する
                try{
                    $sql = "INSERT INTO pre_user (urltoken, mail, date, flag) VALUES (:urltoken, :mail, now(), '0')";
                    $stm = $pdo->prepare($sql);
                    $stm->bindValue(':urltoken', $urltoken, PDO::PARAM_STR);
                    $stm->bindValue(':mail', $mail, PDO::PARAM_STR);
                    $stm->execute();
                    $pdo = null;
                    $message = "メールをお送りしました。24時間以内にメールに記載されたURLからご登録ください。";
                }catch (PDOException $e){
                    print('Error:'.$e->getMessage());
                    die();
                }
                //登録ユーザと管理者へメールを送信
                $mailTo = $mail;
    $body = <<< EOM
    この度はご登録いただきありがとうございます。
    24時間以内に下記のURLからご登録下さい。
    {$url}
EOM;
                //メッセージを入力
                mb_language('ja');
                mb_internal_encoding('UTF-8');
                //Fromヘッダーを作成
                $header = 'From: ' . mb_encode_mimeheader($companyname). ' <' . $companymail. '>';
                if(mb_send_mail($mailTo, $registation_mail_subject, $body, $header, '-f'. $companymail)){
                    //セッション変数を全て解除
                    $_SESSION = array();
                    //クッキーの削除
                    if (isset($_COOKIE["PHPSESSID"])) {
                        setcookie("PHPSESSID", '', time() - 1800, '/');
                    }
                    //セッションを破棄する
                    session_destroy();
                }
            }
        }
?>
        <h2>登録画面</h2>
        <?php if (isset($_POST['submit']) && count($errors) === 0): ?>
            <!-- 仮登録完了画面 -->
            <p><?=$message?></p>
        <?php else: ?>
        <!-- 仮登録画面 -->
        <?php if(count($errors) > 0): ?>
<?php
        foreach($errors as $value){
            echo "<p class='error'>".$value."</p>";
        }
?>
        <?php endif; ?>
            <h4>メールアドレスを入力してください。</h4>
            <form method="post" action="<?php echo $_SERVER['SCRIPT_NAME']?>" >
                <p style="display:inline;"><input type="text" name="mail" size="30" placeholder="入力例：minaso@gmail.com" value="<?php if( !empty($_POST['mail']) ){ echo $_POST['mail']; } ?>"></p>
                <input type="hidden" name="token" value="<?=$token?>">
                <input id="submit_button" type="submit" name="submit" value="送信">
            </form>
        <?php endif; ?><br>
            <!-- ログイン画面へ -->
            <a href="<?=$fileLOGOUT?>">ログイン画面に戻る</a>
<?php
        //フッター部分表示
        html_footer();
?>
  	</body>
</html>