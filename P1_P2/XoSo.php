<h3 align="center">
    Ket qua xo so Khanh Hoa ngay
    <?php echo date("d/m/Y");?>
</h3>
<table border="1" align="center">
    <?php
        for($i=8; $i>0; $i--){
            echo "<tr width='100%'>";
            echo "<td align='center'> Giai $i: </td>";
            echo "<td width='80%' align='center'><h4>";
            switch ($i){
                case 8:{
                    $g8 = rand(0,99);
                    printf("%02d", $g8);
                    break;
                }
                case 7:{
                    $g7 = rand(0,999);
                    printf("%03d", $g7);
                    break;
                }
                case 6:{
                    $g6 = [];
                    for ($j = 0; $j < 3; $j++) {
                        $g6[$j] = rand(0,9999);
                        printf("%04d", $g6[$j]);
                        if($j<2) echo ' - ';
                    }
                    break;
                }
                case 5:{
                    $g5 = rand(0,9999);
                    printf("%03d", $g5);
                    break;
                }
                case 4:{
                    $g4 = [];
                    for ($j = 0; $j < 7; $j++) {
                        $g4[$j] = rand(0,99999);
                        printf("%04d", $g4[$j]);
                        if($j<6) echo ' - ';
                    }
                    break;
                }
                case 3:{
                    $g3 = [rand(0,99999), rand(0,99999)];
                    printf("%05d - %05d", $g3[0], $g3[1]);
                    break;
                }
                case 2:{
                    $g2 = rand(0,99999);
                    printf("%03d", $g2);
                    break;
                }
                case 1:{
                    $g1 = rand(0,99999);
                    printf("%03d", $g1);
                    break;
                }
            }
            echo '</h4></td>';
            echo '</tr>';
        }
        echo "<td align='center'>Giai Dac biet: </td>";
        echo "<td align='center'><h4 style='color:red'>";
        $gdb = rand(0,999999);
        printf("%06d ", $gdb);
        echo '</h4></td>';
    ?>
</table>
<br/>
<h4 align="center">
    Ve so:
    <?php
        $n = rand(0,999999);
        $trung = false;
        printf("%06d", $n);
        if($n%100 == $g8){
            $trung = true;
            echo "<br/><b style='color:green'>Ban trung giai 8</b><br/>";
        }
        if ($n % 1000 == $g7) {
            $trung = true;
            echo "<br/><b style='color:green'>Ban trung giai 7</b><br/>";
        }
        
        if($trung == false) echo "<br/>Chuc ban may man lan sau";
    ?>
</h4>

