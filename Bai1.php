<?php
    $n = rand(1,100);
    echo "N = $n <br/>";
    echo "Cac so chan tu 1 den $n: <br/>";
    for ($i = 1; $i < $n; $i++) {
        if($i % 2 == 0){
            echo "$i ";
        }
    }
    echo '</br> Cac so la boi cua 3: <br/>';
    for ($i = 1; $i <= $n; $i++) {
        if ($i % 3 == 0) {
            echo "<b>$i</b> ";
        } else {
            echo "$i ";
        }
    }
?>

