<?php

$random = $_POST['random'];
$number = str_shuffle($random);
$num = substr($number,0, 1);

?>

<p><?php echo date("Y/m/d");?>の運勢は</p>
<p>選ばれた数字は<?php echo $num;?></p>

<?php
if($num == 0){
    echo "大凶";
}elseif($num == 9){
    echo "大吉";
}elseif($num >= 7){
    echo "吉";
}elseif($num >= 4){
    echo "中吉";
}else{
    echo "小吉";
}

?>