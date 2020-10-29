<?php session_start(); ?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <?php $page_title='Xổ số'; include '../../Website/includes/headtag.html'; ?>
    <body>
        <?php include '../../Website/includes/header.html'; ?>
        <h3 class="text-uppercase text-primary" align="center">
            Kết quả xổ số Khánh Hòa Ngày
            <?php echo date("d/m/Y");?>
        </h3>
        <table class="table-condensed table-striped table-hover" align="center">
        <?php
            for($i=8; $i>0; $i--){
                echo "<tr width='100%'>";
                echo "<td align='center'> Giải $i: </td>";
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
            echo "<td align='center'>Giải Đặc biệt:</td>";
            echo "<td align='center'><h4 style='color:red'>";
            $gdb = rand(0,999999);
            printf("%06d ", $gdb);
            echo '</h4></td>';
            $_SESSION['giai'] = [$gdb,$g1,$g2,$g3,$g4,$g5,$g6,$g7,$g8];
        ?>
        </table>
        <form class="form-horizontal text-center" action="DoSo.php" method="GET">
            <div class="form-group form-inline justify-content-center">
                <label class="text-success col-1">Nhập số vé</label>&nbsp;
                <input class="form-control col-2" name="Ticket" type="text" minlength="6" maxlength="6"/>
            </div>
            <input class="btn btn-warning text-uppercase" name="Submit" type="submit" value="Dò số"/>
        </form>
        <?php include '../../Website/includes/footer.html'; ?>
    </body>
</html>
