<?php
    $m = rand(2,5);
    $n = rand(2,5);
    printf("Ma tran co kick thuoc: %dx%d", $m, $n);
    //---------------------------------------------
    $a = [];
    echo '<br/>';
    echo '<table border=1>';
    for($i=0; $i<$m; $i++){
        echo '<tr align=center>';
        for($j=0; $j<$n; $j++){
            $a[$i][$j] = rand(-100,100);
            echo '<td>';
            printf("%d ", $a[$i][$j]);
            echo '</td>';
        }
        echo '</tr>';
    }
    echo '</table>';
    //-----------------------------------------------
    echo '<br/> Thay cac phan tu am = 0';
    echo '<table border=1>';
    for($i=0; $i<$m; $i++){
        echo '<tr align=center>';
        for($j=0; $j<$n; $j++){
            if($a[$i][$j]<0) $a[$i][$j]=0;
            echo '<td>';
            printf("%d ", $a[$i][$j]);
            echo '</td>';
        }
        echo '</tr>';
    }
    echo '</table>' 
?>

