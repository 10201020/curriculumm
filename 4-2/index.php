<?php 
require_once("pdo.php");
require_once("getData.php");

echo $users_data;
echo $post_data;
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CheckTest</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header class="header">
        <div class="header-logo">
          <img src="logo.png" alt="logo">
        </div>
        <nav>
            <ul class="nav_list">
                <li class="name">ようこそ●●●●さん</li>
                <li class="date">最終ログイン日：○○○○</li>
            </ul>
        </nav>
    </header>

    <main>

    <table>
  <tr>
    <th>記事ID</th><th>タイトル</th><th>カテゴリ</th><th>本文</th><th>投稿日</th>
  </tr>

  <tr>
    <td>5</td><td>静岡の良さ</td><td>旅行</td><td>富士山</td><td>2022‐02‐02</td>
  </tr>
  <tr>
    <td>4</td><td>静岡の良さaaaaa</td><td>旅行</td><td>富士山</td><td>2022‐02‐02</td>
  </tr>
  <tr>
    <td>3</td><td>静岡の良さ</td><td>旅行</td><td>富士山</td><td>2022‐02‐02</td>
  </tr>
  <tr>
    <td>2</td><td>静岡の良さ</td><td>旅行</td><td>富士山</td><td>2022‐02‐02</td>
  </tr>
  <tr>
    <td>1</td><td>静岡の良さ</td><td>旅行</td><td>富士山</td><td>2022‐02‐02</td>
  </tr>
</table>

    </main>

    <footer>
        <p>Y&I group.inc</p>
    </footer>
</body>
</html>