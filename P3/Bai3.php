<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Thanh toán tiền điện</title>
    </head>
    <body>
        <?php
            $name = "";
            $cost = 0;
            $unit = 20000;
            if(isset($_POST["btnSubmit"])){
                $name = $_POST["txtName"];
                $old = $_POST["nOld"];
                $new = $_POST["nNew"];
                $unit = $_POST["nUnit"];
                if($name=="") echo "Nhập tên chủ hộ";
                else {
                    if(!is_numeric($unit)) $unit = 0;
                    if(!is_numeric($old)) $old = 0;
                    if(!is_numeric($new)) $new = 0;
                    if($old > $new) echo "Chỉ số cũ phải nhỏ hơn chỉ số mới";
                    else $cost = ($new-$old)*$unit;
                }
            }
        ?>
        <form action="" method="POST">
            <table style="border-collapse:collapse" width='30%'>
                <tr bgcolor='orange'>
                    <th colspan="3" width='100%'>
                        <h2 style="color:brown">THANH TOÁN TIỀN ĐIỆN</h2>
                    </th>
                </tr>
                <tr bgcolor='yellow'>
                    <td width='50%'>Chủ hộ: </td>
                    <td><input type="text" name="txtName" value="<?php echo $name ?>"/></td>
                    <td></td>
                </tr>
                <tr bgcolor='yellow'>
                    <td>Chỉ số cũ: </td>
                    <td><input type="number" min="0" name="nOld" value="<?php echo $old ?>"/></td>
                    <td>(Kw)</td>
                </tr>
                <tr bgcolor='yellow'>
                    <td>Chỉ số mới: </td>
                    <td><input type="number" min="0" name="nNew" value="<?php echo $new ?>"/></td>
                    <td>(Kw)</td>
                </tr>
                <tr bgcolor='yellow'>
                    <td>Đơn giá: </td>
                    <td><input type="number" min="0" name="nUnit" value="<?php echo $unit ?>"/></td>
                    <td>(VNĐ)</td>
                </tr>
                <tr bgcolor='yellow'>
                    <td>Số tiền thanh toán: </td>
                    <td><input type="text" value="<?php echo $cost ?>" disabled="1"/></td>
                    <td>(VNĐ)</td>
                </tr>
                <tr bgcolor='yellow'>
                    <td colspan="3" align='center'><input type="submit" name="btnSubmit" value="Tính"/></td>
                </tr>
            </table>
        </form>
    </body>
</html>
