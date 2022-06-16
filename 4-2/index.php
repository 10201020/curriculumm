<?php 
require_once("pdo.php");
require_once("getData.php");

$data = new getData();
$getUserData = $data->getUserData();
$getPostData = $data->getPostData();

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
                <li class="name">ようこそ<?php echo $getUserData["last_name"].$getUserData["first_name"];?>さん</li>
                <li class="date">最終ログイン日：<?php echo $getUserData["last_login"]?></li>
            </ul>
        </nav>
    </header>

    <main>

    <table>
      <tr>
        <th>記事ID</th><th>タイトル</th><th>カテゴリ</th><th>本文</th><th>投稿日</th>
      </tr>

      <!-- foreach  $getUserData["id"];-->
      <?php
      
      foreach($getPostData as $row){
        if($row["category_no"] == 1){
          $no = '食事';
        }elseif($row["category_no"] == 2){
          $no = '旅行';
        }else{
          $no = 'その他';
        }
        echo  '<tr>';
        echo  '<td>'. $row["id"]. '</td>';
        echo  '<td>'. $row["title"] . '</td>';
        echo  '<td>'. $no .'</td>';
        echo  '<td>'. $row["comment"] .'</td>';
        echo  '<td>'. $row["created"] .'</td>';
        echo '</tr>';
      }?>
      
        
        
        
    </table>

    </main>

    <footer>
        <p>Y&I group.inc</p>
    </footer>
</body>
</html>