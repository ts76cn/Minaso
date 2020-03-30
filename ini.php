<?php
// ページのエンコーディング
$page_enc = "UTF-8";

// DB保存時のエンコーディング
$db_enc = "UTF-8";

// アプリケーション名
$appli_name = "遊び約束連絡帳　みんなで遊ぼう！【仙台版】";

// 主宰者名
$syusaisya = "管理人まつはし";

//メール送信元
$companyname = "「みんなで遊ぼう！」$syusaisya";

// メール送信元アドレス
$companymail = "ts76cn@gmail.com";

// メール題名
$registation_mail_subject = "みんなで遊ぼう！登録メール";

//----------------------------------------------------
// データベース関連
//----------------------------------------------------
// データベースの種類
define("_DB_TYPE", "mysql");
// データベースホスト名
define("_DB_HOST", "localhost");
// データベース名
define("_DB_NAME", "dbminaso");
// データベース接続ユーザー名
define("_DB_USER", "minaso_user");
// データベース接続パスワード
define("_DB_PASS", "password");

// データソースネーム
define("_DSN", _DB_TYPE . ":host=" . _DB_HOST . ";dbname=" . _DB_NAME. ";charset=utf8");
// テーブル名
$yotei_table = "minaso_yotei";


//----------------------------------------------------
// セッション名
//----------------------------------------------------

// 会員用セッション名
define("_MEMBER_SESSNAME", "PHPSESSION_MEMBER");

// 管理者用セッション名
define("_SYSTEM_SESSNAME", "PHPSESSION_SYSTEM");

// 会員用認証情報 保管変数名
define("_MEMBER_AUTHINFO", "userinfo");

// 管理者用認証情報 保管変数名
define("_SYSTEM_AUTHINFO", "systeminfo");


//----------------------------------------------------
// 会員・管理者　処理分岐用
//----------------------------------------------------

// 会員用フラッグ
define("_MEMBER_FLG", false);

// 管理者フラッグ
define("_SYSTEM_FLG", true);

//----------------------------------------------------
// 文字列の長さ最大値チェック用
//----------------------------------------------------
// 場所の文字列の最大文字数
define("_PLACE_LEN_MAX", 100);

// 場所の文字列の最大文字数
define("_PLACE2_LEN_MAX", 100);

// 遊びの文字列の最大文字数
define("_ASOBI_LEN_MAX", 100);

// 呼びかけ人名の文字列の最大文字数
define("_SEWANIN_LEN_MAX", 100);

// コメントの文字列の最大文字数
define("_COMMENT_LEN_MAX", 2000);

//----------------------------------------------------
// ログインパスワード関連
//----------------------------------------------------

$fileNEW = 'signup_mail.php'; // 新規メンバー登録
$fileLOGIN = 'login.php'; // アカウント認証
$fileLOGOUT = 'index.php'; // ログアウト
$fileMAIN = 'main.php'; // メイン画面
$fileADD = 'add.php'; // 予定を追加
$fileEDIT = 'edit.php'; // 予定を変更
$fileDEL = 'del.php'; // 予定を削除
$fileJOIN = 'join.php'; // 参加を表明
$fileCANCEL = 'cancel.php'; // 参加を取り消す
$fileHELP = 'help.php'; // ヘルプ

$myself = $_SERVER["PHP_SELF"];

//参加表明のデッドライン日。2の場合は、土曜日が当日の場合、金曜日になった瞬間に参加表明ができなくなる
$deadlineDay = 2;
?>