<?php
    // 初期設定を読み込む
    require_once("ini.php");

    // ログイン前header
    function html_header2() {
        global $appli_name;
        print "<h1>" . $appli_name . "</h1>";
print <<<_EOT_
        <img src = "./img/3d218719-s.png" alt = "3d218719-s" height = "100" border = "0" hspace = "20">    
        <img src = "./img/kurumaisu_man.png" alt = "kurumaisu_man.png" height = "100" border = "0" hspace = "20">
        <img src = "./img/sunaba_kodomo.png" alt = "sunaba_kodomo" height = "100" border = "0">
        <img src = "./img/mizudeppou_kids.png" alt = "mizudeppou_kids" height = "100" border = "0"><br>
_EOT_;

    }

    // ログイン後header
    function html_header() {
        global $appli_name, $fileLOGOUT;
        print "<h1>" . $appli_name . "</h1>";
        print "<a href=\"$fileLOGOUT\">ログアウト</a><br>";
print <<<_EOT_
        <img src = "./img/3d218719-s.png" alt = "3d218719-s" height = "100" border = "0" hspace = "20">    
        <img src = "./img/kurumaisu_man.png" alt = "kurumaisu_man.png" height = "100" border = "0" hspace = "20">
        <img src = "./img/sunaba_kodomo.png" alt = "sunaba_kodomo" height = "100" border = "0">
        <img src = "./img/mizudeppou_kids.png" alt = "mizudeppou_kids" height = "100" border = "0"><br>
_EOT_;
    }

    // 「はじめに」表示
    function html_help() {
        global $fileHELP;
        print "<form action=\"\">
            <a href=\"#\" onClick=\"MM_openBrWindow('$fileHELP','help','scrollbars=yes,resizable=yes,width=660,height=500')\">はじめに</a>　
        </form>";
    }

    // ログアウト表示
    function html_logout() {
        global $fileLOGOUT;
        print "<form action=\"\">
            <a href=\"$fileLOGOUT\">ログイン画面へ</a>
        </form>";
    }

    //予定データ表示
    function html_yotei(){

        //①予定データ抽出
        $link = mysqli_connect(_DB_HOST,_DB_USER,_DB_PASS,_DB_NAME);
        // 接続成功した場合
        if ($link) {
            // 文字化け防止
            mysqli_set_charset($link, 'utf8');
            $list_query = 'SELECT id,date1,time1,time2,place,asobi,sewanin,comment,sankasya FROM minaso_yotei where flag <> 3 ORDER BY date1 ASC';
            // クエリを実行
            $list_result = mysqli_query($link,$list_query);
            // 1行ずつ結果を配列で取得
            while($row = mysqli_fetch_array($list_result)){
                $asobi_data[] = $row;
            }
            // 結果セットを開放します
            mysqli_free_result($list_result);
            // 接続を閉じます
            mysqli_close($link);
            // 接続失敗した場合
        } else {
            print 'DB接続失敗';
        }

        //②予定の表示
        print "<h2>今日からの予定</h2>
        <table border=1>
            <tr>
                <th>日付</th>
                <th>時刻</th>
                <th>終了予定時刻</th>
                <th>場所</th>
                <th>予定遊び内容</th>
                <th>呼びかけ人</th>
                <th>コメント</th>
                <th>参加者</th>
            </tr>
            <!--ここからループ -->";

            foreach ($asobi_data as $value) {
                print "<tr>";
                print "<td>" . htmlspecialchars($value['date1'], ENT_QUOTES, 'UTF-8') . "</td>";
                print "<td>" . htmlspecialchars($value['time1'], ENT_QUOTES, 'UTF-8') . "</td>";
                print "<td>" . htmlspecialchars($value['time2'], ENT_QUOTES, 'UTF-8') . "</td>";
                print "<td>" . htmlspecialchars($value['place'], ENT_QUOTES, 'UTF-8') . "</td>";
                print "<td>" . htmlspecialchars($value['asobi'], ENT_QUOTES, 'UTF-8') . "</td>";
                print "<td>" . htmlspecialchars($value['sewanin'], ENT_QUOTES, 'UTF-8') . "</td>";
                print "<td>" . htmlspecialchars($value['comment'], ENT_QUOTES, 'UTF-8') . "</td>";
                print "<td>" . $value['sankasya'] . "</td>";
                print "</tr>";
            }
        print "</table>";
    }


    //変更データ表示
    function html_edit(){

        //①変更データ抽出
        $link = mysqli_connect(_DB_HOST,_DB_USER,_DB_PASS,_DB_NAME);
        // 接続成功した場合
        if ($link) {
            // 文字化け防止
            mysqli_set_charset($link, 'utf8');
            $list_query = 'SELECT id,date1,time1,time2,place,asobi,sewanin,comment,sankasya FROM minaso_yotei where flag <> 3 ORDER BY date1 ASC';
            // クエリを実行
            $list_result = mysqli_query($link,$list_query);
            // 1行ずつ結果を配列で取得
            while($row = mysqli_fetch_array($list_result)){
                $asobi_data[] = $row;
            }
            // 結果セットを開放します
            mysqli_free_result($list_result);
            // 接続を閉じます
            mysqli_close($link);
        // 接続失敗した場合
        } else {
            print 'DB接続失敗';
        }

        //②変更データ表示
        print "
        <table border=1>
            <tr>
                <th>日付</th>
                <th>時刻</th>
                <th>終了予定時刻</th>
                <th>場所</th>
                <th>予定遊び内容</th>
                <th>呼びかけ人</th>
                <th>コメント</th>
                <th>参加者</th>
                <th>選択ボタン</th>
            </tr>
            <!--ここからループ -->";

            foreach ($asobi_data as $value) {

                print "<tr>";
                print "<td>" . htmlspecialchars($value['date1'], ENT_QUOTES, 'UTF-8') . "</td>";
                print "<td>" . htmlspecialchars($value['time1'], ENT_QUOTES, 'UTF-8') . "</td>";
                print "<td>" . htmlspecialchars($value['time2'], ENT_QUOTES, 'UTF-8') . "</td>";
                print "<td>" . htmlspecialchars($value['place'], ENT_QUOTES, 'UTF-8') . "</td>";
                print "<td>" . htmlspecialchars($value['asobi'], ENT_QUOTES, 'UTF-8') . "</td>";
                print "<td>" . htmlspecialchars($value['sewanin'], ENT_QUOTES, 'UTF-8') . "</td>";
                print "<td>" . htmlspecialchars($value['comment'], ENT_QUOTES, 'UTF-8') . "</td>";
                print "<td>" . $value['sankasya'] . "</td>";
                $id = $value['id'];
                print "<td><form method=\"post\" action=\"edit2.php\">
                            <input type=\"submit\" name=\"submit\" value=\"この予定を変更\">
                            <input type=\"hidden\" name=\"id\" value=\"" . $id . "\">
                        </form>
                    </td>";
                print "</tr>";
            }
        print "</table>";
    }

    //削除データ表示
    function html_del(){

        //①削除データ抽出
        $link = mysqli_connect(_DB_HOST,_DB_USER,_DB_PASS,_DB_NAME);
        // 接続成功した場合
        if ($link) {
            // 文字化け防止
            mysqli_set_charset($link, 'utf8');
            $list_query = 'SELECT id,date1,time1,time2,place,asobi,sewanin,comment,sankasya FROM minaso_yotei where flag <> 3 ORDER BY date1 ASC';
            // クエリを実行
            $list_result = mysqli_query($link,$list_query);
            // 1行ずつ結果を配列で取得
            while($row = mysqli_fetch_array($list_result)){
                $asobi_data[] = $row;
            }
            // 結果セットを開放します
            mysqli_free_result($list_result);
            // 接続を閉じます
            mysqli_close($link);
        // 接続失敗した場合
        } else {
            print 'DB接続失敗';
        }

        //②削除データ表示
        print "
        <table border=1>
            <tr>
                <th>日付</th>
                <th>時刻</th>
                <th>終了予定時刻</th>
                <th>場所</th>
                <th>予定遊び内容</th>
                <th>呼びかけ人</th>
                <th>コメント</th>
                <th>参加者</th>
                <th>選択ボタン</th>
            </tr>
            <!--ここからループ -->";

            foreach ($asobi_data as $value) {

                print "<tr>";
                print "<td>" . htmlspecialchars($value['date1'], ENT_QUOTES, 'UTF-8') . "</td>";
                print "<td>" . htmlspecialchars($value['time1'], ENT_QUOTES, 'UTF-8') . "</td>";
                print "<td>" . htmlspecialchars($value['time2'], ENT_QUOTES, 'UTF-8') . "</td>";
                print "<td>" . htmlspecialchars($value['place'], ENT_QUOTES, 'UTF-8') . "</td>";
                print "<td>" . htmlspecialchars($value['asobi'], ENT_QUOTES, 'UTF-8') . "</td>";
                print "<td>" . htmlspecialchars($value['sewanin'], ENT_QUOTES, 'UTF-8') . "</td>";
                print "<td>" . htmlspecialchars($value['comment'], ENT_QUOTES, 'UTF-8') . "</td>";
                print "<td>" . $value['sankasya'] . "</td>";
                $id = $value['id'];
                print "<td><form method=\"post\" action=\"del2.php\">
                            <input type=\"submit\" name=\"submit\" value=\"この予定を削除\">
                            <input type=\"hidden\" name=\"id\" value=\"" . $id . "\">
                        </form>
                    </td>";
                print "</tr>";
            }
        print "</table>";
    }


    //参加表明データ表示
    function html_join(){

        //①参加表明データ抽出
        $link = mysqli_connect(_DB_HOST,_DB_USER,_DB_PASS,_DB_NAME);
        // 接続成功した場合
        if ($link) {
            // 文字化け防止
            mysqli_set_charset($link, 'utf8');
            $list_query = 'SELECT id,date1,time1,time2,place,asobi,sewanin,comment,sankasya FROM minaso_yotei where flag <> 3 ORDER BY date1 ASC';
            // クエリを実行
            $list_result = mysqli_query($link,$list_query);
            // 1行ずつ結果を配列で取得
            while($row = mysqli_fetch_array($list_result)){
                $asobi_data[] = $row;
            }
            // 結果セットを開放します
            mysqli_free_result($list_result);
            // 接続を閉じます
            mysqli_close($link);
        // 接続失敗した場合
        } else {
            print 'DB接続失敗';
        }

        //②参加表明データ表示
        print "
        <table border=1>
            <tr>
                <th>日付</th>
                <th>時刻</th>
                <th>終了予定時刻</th>
                <th>場所</th>
                <th>予定遊び内容</th>
                <th>呼びかけ人</th>
                <th>コメント</th>
                <th>参加者</th>
                <th>選択ボタン</th>
            </tr>
            <!--ここからループ -->";

            foreach ($asobi_data as $value) {

                print "<tr>";
                print "<td>" . htmlspecialchars($value['date1'], ENT_QUOTES, 'UTF-8') . "</td>";
                print "<td>" . htmlspecialchars($value['time1'], ENT_QUOTES, 'UTF-8') . "</td>";
                print "<td>" . htmlspecialchars($value['time2'], ENT_QUOTES, 'UTF-8') . "</td>";
                print "<td>" . htmlspecialchars($value['place'], ENT_QUOTES, 'UTF-8') . "</td>";
                print "<td>" . htmlspecialchars($value['asobi'], ENT_QUOTES, 'UTF-8') . "</td>";
                print "<td>" . htmlspecialchars($value['sewanin'], ENT_QUOTES, 'UTF-8') . "</td>";
                print "<td>" . htmlspecialchars($value['comment'], ENT_QUOTES, 'UTF-8') . "</td>";
                print "<td>" . $value['sankasya'] . "</td>";
                $id = $value['id'];
                print "<td><form method=\"post\" action=\"join2.php\">
                            <input type=\"submit\" name=\"submit\" value=\"この予定に参加\">
                            <input type=\"hidden\" name=\"id\" value=\"" . $id . "\">
                        </form>
                    </td>";
                print "</tr>";

            }
        print "</table>";
    }

    //参加取り消しデータ表示
    function html_cancel(){

        //①参加取り消しデータ抽出
        $link = mysqli_connect(_DB_HOST,_DB_USER,_DB_PASS,_DB_NAME);
        // 接続成功した場合
        if ($link) {
            // 文字化け防止
            mysqli_set_charset($link, 'utf8');
            $list_query = 'SELECT id,date1,time1,time2,place,asobi,sewanin,comment,sankasya FROM minaso_yotei where flag <> 3 ORDER BY date1 ASC';
            // クエリを実行
            $list_result = mysqli_query($link,$list_query);
            // 1行ずつ結果を配列で取得
            while($row = mysqli_fetch_array($list_result)){
                $asobi_data[] = $row;
            }
        // 接続失敗した場合
        } else {
            print 'DB接続失敗';
        }

        //②参加取り消しデータ表示
        print "
        <table border=1>
            <tr>
                <th>日付</th>
                <th>時刻</th>
                <th>終了予定時刻</th>
                <th>場所</th>
                <th>予定遊び内容</th>
                <th>呼びかけ人</th>
                <th>コメント</th>
                <th>参加者</th>
                <th></th>
            </tr>";

            // ここからループ
            foreach ($asobi_data as $value) {
                print '<form method="post" action="cancel2.php">';
                print "<tr>";
                    print "<td>" . htmlspecialchars($value['date1'], ENT_QUOTES, 'UTF-8') . "</td>";
                    print "<td>" . htmlspecialchars($value['time1'], ENT_QUOTES, 'UTF-8') . "</td>";
                    print "<td>" . htmlspecialchars($value['time2'], ENT_QUOTES, 'UTF-8') . "</td>";
                    print "<td>" . htmlspecialchars($value['place'], ENT_QUOTES, 'UTF-8') . "</td>";
                    print "<td>" . htmlspecialchars($value['asobi'], ENT_QUOTES, 'UTF-8') . "</td>";
                    print "<td>" . htmlspecialchars($value['sewanin'], ENT_QUOTES, 'UTF-8') . "</td>";
                    print "<td>" . htmlspecialchars($value['comment'], ENT_QUOTES, 'UTF-8') . "</td>";
                    $id = $value['id'];
                    $sewanin = htmlspecialchars($value['sewanin'], ENT_QUOTES, 'UTF-8');
                    print "<td>
                        <select name=\"cancel\">
                            <option selected value=\"\">選　択</option>";

                            $sankasya_string = $value['sankasya'];
                            $sankasya_array = explode("<br>",$sankasya_string);
                    
                            foreach($sankasya_array as $value) {
                                print '<option value="' . $value . '">' . $value . '</option>';

                                //上と同じ
                                //print "<option value=\"" . $value . "\">" . $value . "</option>";

                            }
                        print "</select>
                    </td>";

                    print '<td>

                            <input type="submit" name="submit" value="参加取り消し">
                            <input type="hidden" name="id" value= "'. $id .'">
                            <input type="hidden" id="sewanin" name="sewanin" value= "'. $sewanin .'" >

                    </td>';

        /*            
                    print "<td><form method=\"post\" action=\"cancel2.php\">
                            <input type=\"submit\" name=\"submit\" value=\"参加取り消し\">
                            <input type=\"hidden\" name=\"id\" value=\"\" . $id . \"\">
                            <input type=\"hidden\" id=\"sewanin\" name=\"sewanin\" value=\"\" . $sewanin . \"\">
                        </form>
                    </td>";
        */
                print "</tr>";
                print "</form>";
            }
        print "</table>";
    }


    //jumpMenu
    function html_menu() {
        global $fileMAIN, $fileADD, $fileEDIT, $fileDEL, $fileJOIN, $fileCANCEL;
        print "
        <select id=\"pageJump\" onChange=\"MM_jumpMenu('parent',this,0)\">
            <option selected>メニュー選択 </option>
            <option value=\"$fileADD\">予定を追加する </option>
            <option value=\"$fileEDIT\">予定を変更する </option>
            <option value=\"$fileDEL\">予定を削除する </option>
            <option value=\"$fileJOIN\">参加を表明する </option>
            <option value=\"$fileCANCEL\">参加を取り消す </option>
        </select>";
    }


    //共通footer
    function html_footer() {
        print "<div id=\"footer\"><br>
            「みんなで遊ぼう！」は、ボーダレスアートプログラムを応援しています。<br>
            ↓下の画像をクリックすると「Wonder Art Studio」のサイトが表示され、音声あり動画が再生されます。<br>
            <a href = \"http://artsforhope.info/was/\" target = \"newtab\"><img src = \"./img/top_masako.jpg\"><a>
            <p>2019-2020 copyrights DIGMAT all rights reserved.</p></div>";
    }


    //----------------------------------------------------
    // データベース関連
    //----------------------------------------------------
    /**
     * PDOインスタンスを作成し、DBに接続する。
     * 接続に必要なパラメータ(_DSN, _DB_USER, _DB_PASS)は、別途定数で定義。
     *
     * @param なし
     * @return PDOオブジェクト
     */
    function db_connect(){
        try {
            $pdo = new PDO(_DSN, _DB_USER, _DB_PASS);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        } catch(PDOException $Exception) {
            die('データベース接続エラー :' . $Exception->getMessage());
        }
        return $pdo;
    }

    /**
     * PDOを使って、SQLを実行
     * 接続に必要なパラメータ(_DSN, _DB_USER, _DB_PASS)は、別途定数で定義。
     *
     * @param SQLステートメント。
     * @param execute() にわたす[array input_parameters]パラメータのarray。パラメータマーカに PHP 変数をバインドする
     * @return 成功した場合は、PDOStatementオブジェクトを返す。例外発生時はfalseを返す。
     */
    function db_executeSQL($pdo, $sql, $array){
        try{
            //if(!$pdo = $this->db_connect())return false;
            $stmt = $pdo->prepare($sql);
            $stmt->execute($array);
            return $stmt;
        }catch(Exception $e){
            return false;
        }
    }

    //----------------------------------------------------
    // パスワード関連
    //----------------------------------------------------
    function get_hashed_password($password){
        // ******** PHP7.0より下位バージョンの対応 START ********
        $ver_php_current = phpversion(); // 現在のバージョン (7.0.22)
        $ver_php_require = '7.0';     // 必要最低バージョン
        $ver_operator    = '<';          // より下
        if (version_compare($ver_php_current, $ver_php_require, $ver_operator)) {
            global $admin_pass;
            // コストパラメーター
            // 04 から 31 までの範囲 大きくなれば堅牢になりますが、システムに負荷がかかります。
            $cost = 10;
            // ランダムな文字列を生成します。
            $salt = substr(str_shuffle('1234567890abcdefghijklmnopqrstuvwxyz'), 0, 16);
            // ソルトを生成します。
            $salt = sprintf("$2y$%02d$", $cost) . $salt;
            $hash = crypt($password, $salt);
            return $hash;
        }
        // ******** PHP7.0より下位バージョンの対応 END ********

        // コストパラメーター
        // 04 から 31 までの範囲 大きくなれば堅牢になりますが、システムに負荷がかかります。
        $cost = 10;
        // ランダムな文字列を生成します。
        $salt = strtr(base64_encode(random_bytes(16)), '+', '.');
        // ソルトを生成します。
        $salt = sprintf("$2y$%02d$", $cost) . $salt;
        $hash = crypt($password, $salt);
        return $hash;
    }

    // パスワードが一致したらtrueを返します
    function check_password($password, $hashed_password){
        // ******** PHP7.0より下位バージョンの対応 START ********
        $ver_php_current = phpversion(); // 現在のバージョン
        $ver_php_require = '7.0';     // 必要最低バージョン
        $ver_operator    = '<';          // より下
        if (version_compare($ver_php_current, $ver_php_require, $ver_operator)) {
            if ($hashed_password == crypt($password, $hashed_password)) {
                return true;
            } else {
                return false;
            }
        }
        // ******** PHP7.0より下位バージョンの対応 END ********

        // postで受け取ったパスワード文字列（$password）と、DBから取得したパスワード文字列（$hashed_password）
        if (hash_equals($hashed_password, crypt($password, $hashed_password))) {
            return true;
        }
    }


    // エラーメッセージ表示関数　戻るボタン（history.back()）
    function err_msg($msg) {
        global $title, $rootURL;
        html_header();
        print "<div id=\"container\">
            <div id=\"center\">
                <p>$msg</p>
                <p><a href=\"Javascript:history.back()\">［ 戻る ］</a></p>
            </div>
        </div>";
        html_footer();
        exit();
    }

    // ログインメッセージ表示関数　ログイン画面に戻る
    function err_session($msg) {
        global $fileLOGOUT, $appli_name;
        html_header2();
?>
        <div id="center">
            <p><?= $msg ?></p>
            <p><a href="<?= $fileLOGOUT ?>">ログイン画面に戻る</a></p>
        </div>
<?php
        html_footer();
        exit();
    }

    // XML宣言部分
    function xmlDeclaration() {
        global $page_enc;
        $ua = $_SERVER['HTTP_USER_AGENT'];
        // #1 Deprecated: Function ereg() 対応
        if (!(ereg("Windows",$ua) && ereg("MSIE",$ua)) || ereg("MSIE 7",$ua)) {
            echo '<?xml version="1.0" encoding="'.$page_enc.'"?>' . "\n";
        }
        if (!(preg_match('/Windows/',$ua) && preg_match('/MSIE/',$ua)) || preg_match('/MSIE 7/',$ua)) {
            echo '<?xml version="1.0" encoding="'.$page_enc.'"?>' . "\n";
        }
    }

    // 曜日変換ルーチン
    function youbi_henkan($youbi) {
        global $youbi;
        if($youbi == "Sunday") {
            $value = "（日）";
        } else if($youbi == "Monday") {
            $value = "（月）";
        } else if($youbi == "Tuesday") {
            $value = "（火）";
        } else if($youbi == "Wednesday") {
            $value = "（水）";
        } else if($youbi == "Thursday") {
            $value = "（木）";
        } else if($youbi == "Friday") {
            $value = "（金）";
        } else if($youbi == "Saturday") {
            $value = "（土）";
        }
        return "$value";
    }

    // 入力データのチェック
    function check_input() {
        global $_POST, $pass, $date1, $date1_year, $date1_month, $date1_day, $time1, $time1_hour, $time1_minute, $time2, $time2_hour, $time2_minute, $place, $place2, $asobi, $sewanin, $comment, $sankasya, $flag, $timestamp, $id, $sankasya2, $cancel;
        // DBに有害な文字列を変換、HTMLタグ変換
        if (isset($_POST['pass'])) {
            $pass = addslashes($_POST['pass']);
            $pass = htmlspecialchars($pass);
        }
        if (isset($_POST['date1_year'])) {
            $date1_year = addslashes($_POST['date1_year']);
            $date1_year = htmlspecialchars($date1_year);
        }
        if (isset($_POST['date1_month'])) {
            $date1_month = addslashes($_POST['date1_month']);
            $date1_month = htmlspecialchars($date1_month);
        }
        if (isset($_POST['date1_day'])) {
            $date1_day = addslashes($_POST['date1_day']);
            $date1_day = htmlspecialchars($date1_day);
        }
        if (isset($_POST['time1_hour'])) {
            $time1_hour = addslashes($_POST['time1_hour']);
            $time1_hour = htmlspecialchars($time1_hour);
        }
        if (isset($_POST['time1_minute'])) {
            $time1_minute = addslashes($_POST['time1_minute']);
            $time1_minute = htmlspecialchars($time1_minute);
        }
        if (isset($_POST['time2_hour'])) {
            $time2_hour = addslashes($_POST['time2_hour']);
            $time2_hour = htmlspecialchars($time2_hour);
        }
        if (isset($_POST['time2_minute'])) {
            $time2_minute = addslashes($_POST['time2_minute']);
            $time2_minute = htmlspecialchars($time2_minute);
        }
        if (isset($_POST['place'])) {
            $place = addslashes($_POST['place']);
            $place = htmlspecialchars($place);
            $placelen = strlen($_POST['place']);
            if ($placelen > _PLACE_LEN_MAX) {
                err_msg("場所の文字列が長すぎて適切ではありません。<br>");
                exit;
            }
        }
        if (isset($_POST['place2'])) {
            $place2 = addslashes($_POST['place2']);
            $place2 = htmlspecialchars($place2);
            $place2len = strlen($_POST['place2']);
            if ($place2len > _PLACE2_LEN_MAX) {
                err_msg("場所の文字列が長すぎて適切ではありません。<br>");
                exit;
            }
        }
        if (isset($_POST['asobi'])) {
            $asobi = addslashes($_POST['asobi']);
            $asobi = htmlspecialchars($asobi);
        }
        if (isset($_POST['sewanin'])) {
            $sewanin = addslashes($_POST['sewanin']);
            $sewanin = htmlspecialchars($sewanin);
            $sewaninlen = strlen($_POST['sewanin']);
            if ($sewaninlen > _SEWANIN_LEN_MAX) {
                err_msg("呼びかけ人名の文字列が長すぎて適切ではありません。<br>");
                exit;
            }
        }
        if (isset($_POST['comment'])) {
            $comment = addslashes($_POST['comment']);
            $comment = htmlspecialchars($comment);
            $comment = nl2br($comment);
            $comment = preg_replace("/[\r\n]/", "", $comment);
            $commentlen = strlen($_POST['comment']);
            if ($commentlen > _COMMENT_LEN_MAX) {
                err_msg("コメントの文字列が長すぎて適切ではありません。<br>");
                exit;
            }
        }
        if (isset($_POST['date1'])) {
            $date1 = addslashes($_POST['date1']);
            $date1 = htmlspecialchars($date1);
        }
        if (isset($_POST['time1'])) {
            $time1 = addslashes($_POST['time1']);
            $time1 = htmlspecialchars($time1);
        }
        if (isset($_POST['time2'])) {
            $time2 = addslashes($_POST['time2']);
            $time2 = htmlspecialchars($time2);
        }
        if (isset($_POST['sankasya'])) {
            $sankasya = addslashes($_POST['sankasya']);
            $sankasya = htmlspecialchars($sankasya);
        }
        if (isset($_POST['flag'])) {
            $flag = addslashes($_POST['flag']);
            $flag = htmlspecialchars($flag);
        }
        if (isset($_POST['timestamp'])) {
            $timestamp = addslashes($_POST['timestamp']);
            $timestamp = htmlspecialchars($timestamp);
        }
        if (isset($_POST['id'])) {
            $id = addslashes($_POST['id']);
            $id = htmlspecialchars($id);
        }
        if (isset($_POST['sankasya2'])) {
            $sankasya2 = addslashes($_POST['sankasya2']);
            $sankasya2 = htmlspecialchars($sankasya2);
        }
        if (isset($_POST['cancel'])) {
            $cancel = addslashes($_POST['cancel']);
            $cancel = htmlspecialchars($cancel);
        }
    }
?>
