<link rel="stylesheet" href="style.css">

<?php
//POST送信で送られてきた名前を受け取って変数を作成
$name = $_POST['name'];

//①画像を参考に問題文の選択肢の配列を作成してください。

//② ①で作成した、配列から正解の選択肢の変数を作成してください

?>

<!--POST通信で送られてきた名前を出力-->
<form action="answer.php" method="post">
<p>お疲れ様です<?php echo $name; ?>さん</p>

<!--フォームの作成 通信はPOST通信で-->
<h2>①ネットワークのポート番号は何番？</h2>
<!--③ 問題のradioボタンを「foreach」を使って作成する-->

<?php
$num = [80, 22, 20, 21];
foreach ( $num as $value ) {?>
    <input type="radio" name="num" value="<?php echo $value?>">
    <?php echo $value;   
    }
    ?>
<!-- </form> -->


<h2>②Webページを作成するための言語は？</h2>
<!--③ 問題のradioボタンを「foreach」を使って作成する-->
<!-- <form action="answer.php" method="post"> -->
<?php
$lang = ["PHP", "Python", "JAVA", "HTML"];
foreach ( $lang as $lang ) {?>
    <input type="radio" name="lang" value="<?php echo $lang?>">
    <?php echo $lang;   
    }
    ?>
<!-- </form> -->




<h2>③MySQLで情報を取得するためのコマンドは？</h2>
<!--③ 問題のradioボタンを「foreach」を使って作成する-->
<!-- <form action="answer.php" method="post"> -->
<?php
$com = ["join", "select", "insert", "update"];
foreach ( $com as $com ) {?>
    <input type="radio" name="com" value="<?php echo $com?>">
    <?php echo $com;   
    }
    ?>
<!-- </form> -->

<br>


<!--問題の正解の変数と名前の変数を[answer.php]に送る-->
<!-- <form action="answer.php" method="post"> -->
<input type="hidden" name="name" value="<?php echo $name; ?>">
<input type="submit" value="回答する" class="submit">
</form>
