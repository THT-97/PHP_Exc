<?php
    $n = rand(1, 1000);
    echo "N = $n </br>";
    $i = 2;
    while(($i <= round(sqrt($n))) && ($n%$i!=0)){
        $i++;
    }
    if($i < round(sqrt($n))){
        echo 'N khong phai so nguyen to </br>';
    }
    else{
        echo 'N la so nguyen to </br>';
    }
    //Tong (10 < cac so le <= N)
    $sum = 0;
    if($n > 10){
        $i = 11;
        while($i<=$n && $i<100){
            if($i %2 != 0){
                $sum += $i;
            }
            $i++;
        }
    }
    echo "Tong cac so le co hai chu so tu 1 den N: $sum </br>";
    //Dem so chu so cua N
    $i = 0;
    while ($n>0){
        $n = floor($n/10);
        $i++;
    }
    echo "N co $i chu so";
?>

