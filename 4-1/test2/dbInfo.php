<!doctype html>
<html>
    <html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>新規登録</title>
    </head>
    <body>
        <h1>新規登録画面</h1>
        <form id="loginForm" name="loginForm" action="lib/password.php" method="POST">
            <fieldset>
                <legend>新規登録フォーム</legend>
                <div><style color="#ff0000"><?php echo htmlspecialchars($errorMessage, ENT_QUOTES); ?></style></div>
                <div><style color="#0000ff"><?php echo htmlspecialchars($signUpMessage, ENT_QUOTES); ?></style></div>
                <label for="username">ユーザー名</label><input type="text" id="username" name="username" placeholder="ユーザー名を入力" value="<?php if (!empty($_POST["username"])) {
    echo htmlspecialchars($_POST["username"], ENT_QUOTES);
} ?>">
                <br>
                <label for="password">パスワード</label><input type="password" id="password" name="password" value="" placeholder="パスワードを入力">
                <br>
                <label for="password2">パスワード(確認用)</label><input type="password" id="password2" name="password2" value="" placeholder="再度パスワードを入力">
                <br>
                <input type="submit" id="signUp" name="signUp" value="登録">
            </fieldset>
        </form>
    </body>
</html>