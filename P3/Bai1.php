<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Diện tích hình chữ nhật</title>
    </head>
    <body>
        <?php
            $area = 0;
            if(isset($_POST["btbSubmit"])){
                $width = $_POST["nWidth"];
                $length = $_POST["nLength"];
                if (!is_numeric($width)) $width = 0;
                if(!is_numeric($length)) $length = 0;
                $area = $width * $length;
            }
        ?>
        <form action="" method="POST">
            <table style="border-collapse:collapse" width='30%'>
                <tr bgcolor='orange'>
                    <th colspan="2" width='100%'>
                        <h2 style="color:brown">DIỆN TÍCH HÌNH CHỮ NHẬT</h2>
                    </th>
                </tr>
                <tr bgcolor='yellow'>
                    <td align='center' width='50%'>Chiều dài: </td>
                    <td><input type="number" min="0" name="nLength" value="<?php echo $length ?>"/></td>
                </tr>
                <tr bgcolor='yellow'>
                    <td align='center'>Chiều rộng: </td>
                    <td><input type="number" min="0" name="nWidth" value="<?php echo $width ?>"/></td>
                </tr>
                <tr bgcolor='yellow'>
                    <td align='center'>Diện tích: </td>
                    <td><input type="text" name="nArea" value="<?php echo $area ?>" disabled="1"/></td>
                </tr>
                <tr bgcolor='yellow'>
                    <td colspan="2" align='center'><input type="submit" name="btnSubmit" value="Tính"/></td>
                </tr>
            </table>
        </form>
    </body>
</html>