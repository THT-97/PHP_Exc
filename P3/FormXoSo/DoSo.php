<?php session_start();?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <?php $page_title ='Dò số'; include '../../Website/includes/headtag.html'; ?>
    </head>
    <body>
        <?php include '../../Website/includes/header.html'; ?>
        <table class="table-condensed table-striped table-hover" align="center">
            <?php
                $ve = $_GET["Ticket"];
                $giai = $_SESSION['giai'];
                $trung = [];
                if(is_numeric($ve) && $ve>0){
                    for($i = count($giai)-1; $i >= 0 ; $i--) {
                        echo '<tr>';
                        if($i==0) echo '<td class="text-uppercase">Giải đặc biệt:</td>';
                        else echo "<td>Giải $i:</td>";
                        echo "<td align='center'>";
                        if(is_array($giai[$i])){
                            for ($j = 0; $j < count($giai[$i]); $j++) {
                                if($j>0) echo " - ";
                                if($i==6) {
                                    if($ve%10000==$giai[$i][$j]){
                                        array_push($trung, $i);
                                        echo '<b class="text-success">';
                                            printf("%04d", $giai[$i][$j]);
                                        echo '</b>';
                                    }
                                    else printf("%04d", $giai[$i][$j]);
                                }
                                else if($ve%100000==$giai[$i][$j]){
                                        array_push($trung, $i);
                                        echo '<b class="text-success">';
                                            printf("%05d", $giai[$i][$j]);
                                        echo '</b>';
                                    }
                                else printf("%05d", $giai[$i][$j]);
                            }
                        }
                        else{
                            switch ($i){
                                case 8: {
                                    if($ve%100==$giai[$i]){
                                        array_push($trung, $i);
                                        echo '<b class="text-success">';
                                            printf("%02d", $giai[$i]);
                                        echo '</b>';
                                    }
                                    else printf("%02d", $giai[$i]);
                                    break;
                                }
                                case 7: {
                                    if($ve%1000==$giai[$i]){
                                        array_push($trung, $i);
                                        echo '<b class="text-success">';
                                            printf("%03d", $giai[$i]);
                                        echo '</b>';
                                    }
                                    else printf("%03d", $giai[$i]);
                                    break;
                                }
                                case 5: {
                                    if($ve%10000==$giai[$i]){
                                        array_push($trung, $i);
                                        echo '<b class="text-success">';
                                            printf("%04d", $giai[$i]);
                                        echo '</b>';
                                    }
                                    else printf("%04d", $giai[$i]);
                                    break;
                                }
                                case 2:
                                case 1: {
                                    if($ve%100000==$giai[$i]){
                                        array_push($trung, $i);
                                        echo '<b class="text-success">';
                                            printf("%05d", $giai[$i]);
                                        echo '</b>';
                                    }
                                    else printf("%05d", $giai[$i]);
                                    break;
                                }
                                case 0: {
                                    if($ve==$giai[$i]){
                                        array_push($trung, $i);
                                        echo '<b class="text-success">';
                                            printf("%06d", $giai[$i]);
                                        echo '</b>';
                                    }
                                    else printf("%06d", $giai[$i]);
                                    break;
                                }
                            }
                        }
                        echo '</td>';
                        echo '</tr>';
                    }
                    echo "<tr><td class='text-center' colspan='3'>Vé của bạn: $ve </td></tr>";
                }
                else echo "<b class='text-danger'>SỐ VÉ PHẢI LÀ SỐ NGUYÊN > 0 CÓ 6 CHỮ SỐ</b>"
            ?>
        </table>
        <div class="text-center">
            <b class="text-success">
                <?php
                    foreach ($trung as $t){
                        echo '<td class="text-success">';
                        if($t!=0) echo "Bạn trúng giải $t";
                        else echo "Bạn trúng giải ĐẶC BIỆT";
                        echo '</td><br/>';
                    }
                ?>
            </b><br/>
            <a class="btn btn-warning" href="javascript:window.history.back(-1);">Quay lại</a>
        </div>
        <?php include '../../Website/includes/footer.html'; ?>
    </body>
</html>
