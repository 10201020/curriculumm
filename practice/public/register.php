<?php
session_start();
require_once '../classes/UserLogic.php';

// err_message
$err = [];

$token = filter_input(INPUT_POST, 'csrf_token');
// トークンがない、一致しない場合処理を中止
if(!isset($_SESSION['csrf_token'])|| $token !==$_SESSION['csrf_token']){
    exit('不正なリクエストです');
}
unset($_SESSION['csrf_token']);

// バリテーション
if(!$username = filter_input(INPUT_POST, 'username')){
$err[] = 'ユーザー名を記入してください';
}
if(!$email = filter_input(INPUT_POST, 'email')){
$err[] = 'emailを記入してください';
}
$password = filter_input(INPUT_POST, 'password');
// 正規表現
if (!preg_match("/\A[a-z\d]{1,100}+\z/i",$password)){
    $err[] = 'password_nono_password';
}
$password_conf = filter_input(INPUT_POST, 'password_conf');
if ($password !== $password_conf){
    $err[] = 'nono_password!!!';
}
if(count($err) === 0){
    // tourokusuru
    $hasCreated = UserLogic::createUser($_POST);
    if(!$hasCreated){
        $err[] = '登録に失敗しました';
    }
}
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
    <a href="./signup_form.php">戻る</a>
</body>
</html>