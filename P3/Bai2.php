<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Diện tích và chu vi hình tròn</title>
    </head>
    <body>
        <?php
            $area = 0;
            $outline = 0;
            const PI = 3.14;
            if(isset($_POST["btnSubmit"])){
                $radius = $_POST["nRadius"];
                if(!is_numeric($radius)) $radius = 0;
                $area = PI* pow($radius, 2);
                $outline = 2*PI*$radius;
            }
        ?>
        <form action="" method="POST">
            <table style="border-collapse:collapse" width='30%'>
                <tr bgcolor='orange'>
                    <th colspan="2" width='100%'>
                        <h2 style="color:brown">DIỆN TÍCH VÀ CHU VI HÌNH TRÒN</h2>
                    </th>
                </tr>
                <tr bgcolor='yellow'>
                    <td align='center' width='50%'>Bán kính: </td>
                    <td><input type="number" min="0" name="nRadius" value="<?php echo $radius ?>"/></td>
                </tr>
                <tr bgcolor='yellow'>
                    <td align='center'>Diện tích: </td>
                    <td><input type="text" name="nArea" value="<?php echo $area ?>" disabled="1"/></td>
                </tr>
                <tr bgcolor='yellow'>
                    <td align='center'>Chu vi: </td>
                    <td><input type="text" name="nOutline" value="<?php echo $outline ?>" disabled="1"/></td>
                </tr>
                <tr bgcolor='yellow'>
                    <td colspan="2" align='center'><input type="submit" name="btnSubmit" value="Tính"/></td>
                </tr>
            </table>
        </form>
    </body>
</html>
