<?php
    $n = rand(-50,50);
    echo "N = $n";
    echo '<br/>';
    if ($n < 0) {
        echo 'N la so am';
        $n *= -1;
    }
    else echo 'N la so duong';
    echo '<br/>Mang duoc tao: ';
    $a = [];
    $sum = 0;
    for ($i = 0; $i < $n; $i++) {
        $a[$i] = rand(-100,100);
        echo "$a[$i] ";
        if($i % 2 != 0) $sum += $a[$i];
    }
    echo "<br/> Tong cac phan tu o vi tri le: $sum";
?>

