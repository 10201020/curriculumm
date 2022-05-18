<?php
// 配列の0:リンゴ、1:みかん、2:桃　の順に個数を配列で作成してください。
// 引数はフルーツの単価・個数の２つ、返り値は計算した合計値を返します。
// 繰り返しを使ってそれぞれのフルーツを書き出してください。

$fruits = ["りんご", "みかん", "もも"];
function total($price,$quantity) {
    $amount = $price * $quantity;
    return $amount;
}

foreach($fruits as $value){
    if($value == "りんご"){
        echo $value . "は" . total(300,1) . "円です。" . "<br>";
     } elseif($value == "みかん"){
        echo $value . "は" . total(150,1) . "円です。" . "<br>";
     }else{
        echo $value . "は" . total(3000,1) . "円です。" . "<br>";
     }
}
    
//     foreach($fruits as $value){
//         if($value == "りんご"){
//             $amount = total(300,1);
//         } elseif($value == "みかん"){
//             $amount = total(150,1);
//         }else{
//             $amount = total(3000,1);
//         }
//         echo $value . "は" . $amount."です。". "</br>";
// }

// 1)
total(300,1);
// 2)
total(150,1);
// 3)
total(3000,1);

?>
