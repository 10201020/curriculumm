<?php

function connect(){
    // $host = DB_HOST;
    // $db = DB_NAME;
    // $user = DB_USER;
    // $pass = DB_PASS;
    // DBサーバのURL
    $db['host'] = "localhost";
    // ユーザー名
    $db['user'] = "root";
    // ユーザー名のパスワード
    $db['pass'] = "";
    // データベース名
    $db['dbname'] = "YIGroupBlog";

    $dsn = sprintf('mysql: host=%s; dbname=%s; charset=utf8', $db['host'], $db['dbname']);

    try{
        $pdo = new PDO($dsn,$db['user'],$db['pass'],[
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);
        return $pdo;
    }catch(PDOException $e){
        echo '接続失敗'. $e->getMessage();
        exit();
    }
}