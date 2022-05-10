<link rel="stylesheet" href="style.css">

<?php
$name = $_POST['name'];
//[question.php]から送られてきた名前の変数、選択した回答、問題の答えの変数を作成

//選択した回答と正解が一致していれば「正解！」、一致していなければ「残念・・・」と出力される処理を組んだ関数を作成する

?>
<p><!--POST通信で送られてきた名前を表示--><?php echo $name; ?>さんの結果は・・・？</p>
<p>①の答え</p>
<?php
if(isset( $_POST['num'])){
    if($_POST['num'] === '80'){
        echo '正解！';
    }else{
        echo '残念・・・';
    }
}
?>
<!--作成した関数を呼び出して結果を表示-->

<p>②の答え</p>
<?php
if(isset( $_POST['lang'])){
    if($_POST['lang'] === 'HTML'){
        echo '正解！';
    }else{
        echo '残念・・・';
    }
}
?>
<!--作成した関数を呼び出して結果を表示-->

<p>③の答え</p>
<?php
if(isset( $_POST['com'])){
    if($_POST['com'] === 'select'){
        echo '正解！';
    }else{
        echo '残念・・・';
    }
}
?>
<!--作成した関数を呼び出して結果を表示-->
