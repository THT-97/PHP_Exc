<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Tính tiền karaoke</title>
    </head>
    <body>
        <?php
            $cost = "";
            if(isset($_POST["submitp3b5"])){
                $start = $_POST["Start"];
                $end = $_POST["End"];
                if ($start < $end) {
                $cost = $end - $start;
                if ($start <= 15) {
                    if($end<=15) $cost *= 20000;
                    else $cost = 20000*(15-$start)+45000*($end-15);
                }
                else $cost *= 45000;
            }
        }
        ?>
        <form action="#p3b5" method="POST" id="p3b5">
            <table class="table-condensed col-6" style="margin-left: auto; margin-right: auto">
                <tr class="bg-primary">
                    <th colspan="3" class="text-center">
                        <h2 style="color:white">TÍNH TIỀN KARAOKE</h2>
                    </th>
                </tr>
                <tr class="bg-info">
                    <td class="text-left" width="40%">Giờ bắt đầu:</td>
                    <td><input width="50%" type="number" min="10" max="24" name="Start" value="<?php if(isset($_POST["Start"])) echo $start ?>"/></td>
                    <td>(h)</td>
                </tr>
                <tr class="bg-info">
                    <td class="text-left" width='40%'>Giờ kết thúc:</td>
                    <td><input width="50%" type="number" min="10" max="24" name="End" value="<?php if(isset($_POST["End"])) echo $end ?>"/></td>
                    <td>(h)</td>
                </tr>
                <tr class="bg-info">
                    <td class="text-left" width='40%'>Tiền thanh toán:</td>
                    <td><input type="text" disabled="1" value="<?php echo $cost ?>"/></td>
                    <td>(VNĐ)</td>
                </tr>
                <tr class="bg-info">
                    <td colspan="3" align='center'><input class="btn btn-default" type="submit" name="submitp3b5" value="Tính tiền"/></td>
                </tr>
            </table>
            <p class='text-danger text-center'>
                <?php
                    if(isset($_POST["submitp3b5"]))if($start>=$end) echo "Giờ kết thúc phải lớn hơn giờ bắt đầu";
                    else echo "";  
                ?>
            </p>
        </form>
    </body>
</html>
