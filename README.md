# みんなで遊ぼう！仙台
・子供の遊び約束を目的とした掲示板です。<br>
https://ts76cn.com
で実際の操作が可能です。

## Overview　概要
①予定の登録<br>
②修正<br>
③削除<br>
④予定への参加表明<br>
⑤予定への参加表明取り消し<br>
⑥ログインアドレス登録<br>
⑦ログイン認証<br>
⑧広告リンク<br>
の各機能があります。<br>

## Demonstration　デモ画面
<img width="1201" alt="main" src="https://user-images.githubusercontent.com/55599388/76591382-88bc4a00-6533-11ea-9c55-49cfe4086c5b.png"><br>

## Description　説明
## ①予定の登録
![add](https://user-images.githubusercontent.com/55599388/76592587-29603900-6537-11ea-8930-57df31bd3b08.jpg)<br>
・日時はセレクトメニューとすることで、全角／半角などの数値入力によるエラーをあらかじめ回避しています。<br>

## ②予定の修正
![edit](https://user-images.githubusercontent.com/55599388/76592820-dcc92d80-6537-11ea-94d9-5e4aa1b7a871.jpg)<br>
・一覧から修正を行う予定を選択し、元のデータを書き換える形で修正を行います。<br>

## ③予定の削除
<img width="1293" alt="del1" src="https://user-images.githubusercontent.com/55599388/76420783-ffe3c800-63e5-11ea-8931-ce41a2607f00.png"><br>
・一覧から削除を行う予定を選択し、確認画面の後、予定ごと削除します。<br>

## ④予定への参加表明
<img width="570" alt="join2" src="https://user-images.githubusercontent.com/55599388/76420786-02462200-63e6-11ea-8fe8-c7a4fde40457.png"><br>
・表示済みの予定から参加したいものを選択し、氏名を入力します。<br>

## ⑤予定への参加表明取り消し
<img width="1326" alt="cancel" src="https://user-images.githubusercontent.com/55599388/76420778-fd816e00-63e5-11ea-91c8-4898f4f39054.png"><br>
・表示済みの予定から削除したい自身の名前をセレクトメニューより選択し、その参加者の名前のみ削除を行います。<br>

## ⑥ログインアドレス登録<br>
![mail](https://user-images.githubusercontent.com/55599388/76593091-a2ac5b80-6538-11ea-8f81-b825caae385f.jpg)<br>
・入力したアドレスに仮登録メールを送り、リンクURLより本登録（氏名・パスワード入力）を行います。<br>

## ⑦ログイン認証<br>
![login](https://user-images.githubusercontent.com/55599388/76591783-b5bd2c80-6534-11ea-989e-cd23b28447a2.jpg)<br>
・メールアドレスの仮登録後、URLリンク付メールが送信され本登録画面へ遷移。<br>

## ⑧広告リンク<br>
<img width="712" alt="スクリーンショット 2020-03-13 14 01 31" src="https://user-images.githubusercontent.com/55599388/76591546-126c1780-6534-11ea-9c9e-deb42d509c4e.png"><br>
・画面下部に画像を入れて、他サイトへ遷移するようにしています。<br>

## Requirement　要件
・PHP 7.2.21<br>
・phpMyAdmin 4.9.0.1（MySQL 5.7.26）<br>
・JavaScript（機能のselect表示）<br>

## Usage　使用法
・sqlフォルダ内「minaso.sql」でtable作成が可能です。<br>
・設定ファイル「ini.php」を環境に合わせて編集する必要があります。<br>



