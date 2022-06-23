<?php
require_once('db_connect.php');
require_once('function.php');
check_user_logged_in();
?>
<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title>メイン</title>
</head>
<body>
    <h1>在庫一覧画面</h1>
    <a href="create_post.php" class="button">新規登録</a>
    <a href="logout.php" class="button-out">ログアウト</a><br>

    <table>
    <tr>
        <th>タイトル</th>
        <th>発売日</th>
        <th>在庫数</th>
        <th></th>
    </tr>
    <?php
    $sql = "SELECT * FROM books ORDER BY id DESC";
    $pdo = db_connect();
    try {
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
    
        // ループ文を使用して、1行ずつ読み込んで$rowに代入する
        // 読み込むものがなくなったらループ終了
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
            <tr>
                <td><?php echo $row["title"];?></td>
                <td><?php echo $row["date"];?></td>
                <td><?php echo $row["stock"];?></td>
                <td><a href="delete_post.php?id=<?php echo $row['id']; ?>" class="button-del">削除</a></td>
            </tr>
        <?php }
    } catch (PDOException $e) {
        echo 'Error: ' . $e->getMessage();
        die();
    }?>

</table>


</body>
</html>