<?php
session_start();

// require 'lib/password.php';
require_once("db_connect.php");

// エラーメッセージ、登録完了メッセージの初期化
$errorMessage = "";
$signUpMessage = "";

// ログインボタンが押された場合

if (isset($_POST["signUp"])) {
    // 1. ユーザIDの入力チェック
    if (empty($_POST["name"])) {  // 値が空のとき
        $errorMessage = 'ユーザーIDが未入力です。';
    } else if (empty($_POST["password"])) {
        $errorMessage = 'パスワードが未入力です。';
    }
    
    if (!empty($_POST["name"]) && !empty($_POST["password"])) {
        // 入力したユーザIDとパスワードを格納
        $username = $_POST["name"];
        $password = $_POST["password"];
        // 2. ユーザIDとパスワードが入力されていたら認証する
        $dsn = sprintf('mysql: host=%s; dbname=%s; charset=utf8', $db['host'], $db['dbname']);
        // 3. エラー処理
        
            try {
                $pdo = new PDO($dsn, $db['user'], $db['pass'], array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
                $stmt = $pdo->prepare("INSERT INTO users(name, password) VALUES (?, ?)");
                
                $stmt->execute(array($username, password_hash($password, PASSWORD_DEFAULT)));  // パスワードのハッシュ化を行う（今回は文字列のみなのでbindValue(変数の内容が変わらない)を使用せず、直接excuteに渡しても問題ない）
                $userid = $pdo->lastinsertid();  // 登録した(DB側でauto_incrementした)IDを$useridに入れる
                
                $signUpMessage = '登録が完了しました';  // ログイン時に使用するIDとパスワード
            } catch (PDOException $e) {
                $errorMessage = 'データベースエラー';
                // $e->getMessage() でエラー内容を参照可能（デバック時のみ表示）
                // echo $e->getMessage();
            }
    } 
}
?>

<!doctype html>
<html>
    <html lang="ja">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="style.css">
        <title>ユーザー登録画面</title>
    </head>
    <body>
        <form id="loginForm" name="loginForm" action="" method="POST">
            <div style="color: #ff0000;"><?php echo htmlspecialchars($errorMessage, ENT_QUOTES); ?></div>
            <div><?php echo htmlspecialchars($signUpMessage, ENT_QUOTES); ?></div>
            
            <h1>ユーザー登録画面</h1>

                <label for="name"></label>
                <input type="text" id="name" name="name" placeholder="ユーザー名" class="input" value="<?php if (!empty($_POST["name"])) 
                {echo htmlspecialchars($_POST["name"], ENT_QUOTES);
                } ?>">
                <br>
                <label for="password"></label>
                <input type="password" id="password" name="password" value="" placeholder="パスワード" class="input">
                <br>
                <input type="submit" id="signUp" name="signUp" value="新規登録" class="button-register">
        </form>
    </body>
</html>