<?php
require_once '../classes/UserLogic.php';
session_start();
// err_message
$err = [];

// バリテーション

if(!$email = filter_input(INPUT_POST, 'email')){
$err['email'] = 'emailを記入してください';
}
if(!$password = filter_input(INPUT_POST, 'password')){
    $err['password'] = 'パスワード記入して';
}

if(count($err) > 0){
    // errがあれば戻す
    $_SESSION = $err;
    header('Location: login.php');
    return;
}
// ログイン成功時の処理
$result = UserLogic::login($email, $password);
// ログイン失敗時の処理
if (!$result){
    header('Location: login.php');
    return;
}
echo 'ログイン成功です';
?>


<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>登録完了</title>
</head>
<body>
    <?php if(count($err) > 0) : ?>
        <?php foreach($err as $e) : ?>
            <p><?php echo $e?></p>
            <?php endforeach?>
            <?php else : ?>
    <p>登録完了</p>
    <?php endif?>
    <a href="./login.php">戻る</a>
</body>
</html>