<?php
// db_connect.phpの読み込み
require_once('db_connect.php');

// function.phpの読み込み
require_once('function.php');
// check_user_logged_in();

// ログインしていなければ、login.phpにリダイレクト
session_start();
if (!empty($_POST)) {
    header('Location: login.php'); // ログインしていればlogin.phpへリダイレクトする


// 提出ボタンが押された場合
if (!empty($_POST)) {
    // titleとcontentの入力チェック
    if (empty($_POST["title"])) {
        echo 'タイトルが未入力です。';
    } elseif (empty($_POST["date"])) {
        echo 'dateが未入力です。';
    } elseif(empty($_POST["stock"])){
        echo 'stockが未入力です。';
    }

    if (!empty($_POST["title"]) && !empty($_POST["date"]) && !empty($_POST["stock"])) {
        // 入力したtitleとdateを格納
        $title = htmlspecialchars($_POST['title'], ENT_QUOTES);
        $date = htmlspecialchars($_POST['date'], ENT_QUOTES);
        $stock = htmlspecialchars($_POST['stock'], ENT_QUOTES);

        // PDOのインスタンスを取得
        $pdo = db_connect();

        try {
            // SQL文の準備
            $sql = "INSERT INTO books (title,date,stock) VALUES (:title , :date , :stock)";
            // プリペアドステートメントの準備
            $stmt = $pdo->prepare($sql);
            // タイトルをバインド
            $stmt->bindParam(':title',$title);
            // 発売日をバインド
            $stmt->bindParam(':date',$date);
            // 在庫をバインド
            $stmt->bindParam(':stock',$stock);
            // 実行
            $stmt->execute();
            // main.phpにリダイレクト
            header('Location: main.php');
        } catch (PDOException $e) {
            // エラーメッセージの出力
            echo 'Error: ' . $e->getMessage();
            // 終了
            die();
        }
    }
}
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link rel="stylesheet" href="style.css">
    <title>本登録画面</title>
</head>
<body>
    <h1>本登録画面</h1>
    <form method="POST" action="">
        <input type="text" name="title" id="title" placeholder="タイトル" class="input"><br>
        <input type="text" name="date" id="date" placeholder="発売日" class="input"><br>
        <input type="number" name="stock" id="stock" placeholder="選択してください" class="input"><br>
        <input type="submit" value="登録" id="post" name="post" class="button-book">
    </form>
</body>
</html>