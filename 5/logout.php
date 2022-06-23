<?php
// セッション開始
session_start();
// セッション変数のクリア
$_SESSION = array();
// セッションクリア
session_destroy();
?>
<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title>ログアウト</title>
</head>
    <body>
     <h1>ログアウト画面</h1>
    <div class="out-comment">ログアウトしました</div>
    <a href="login.php" class="button-logout">ログイン画面に戻る</a>
    </body>
</html>