<?php

$num=0;
while($num<100){
    echo "<br>";
    $num++;
    if($num%3==0 && $num%5==0){
        echo "fizzbuzz";
    }elseif($num%3==0){
        echo "fizz";
    }elseif($num%5==0){
        echo "buzz";
    }
    else{
        echo $num;
    }
    
}

?>