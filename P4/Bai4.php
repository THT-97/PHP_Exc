<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Tính trên dãy số</title>
        <link rel="stylesheet" href="../bootstrap.min.css"/>
    </head>
    <body>
        <?php
            $sum = "";
            if(isset($_POST["submitp4b4"])){
                function getSum($arr){
                    $s = 0;
                    foreach ($arr as $value) {
                        if(is_numeric($value)){
                           $s += $value;
                        }
                    }
                    return $s;
                }
                $a4 = str_replace(" ", "", $_POST["arr"]);
                $arr = explode(",", $a);
                $sum = getSum($arr);
            }

        ?>
        <form action="#p4b4" method="POST" id="p4b4">
            <table align="center" class="table-condensed">
                <tr class="bg-primary">
                    <th class="text-center" colspan="3" style="color: white;">
                        <h3 style="font-family:'Comic Sans MS'">NHẬP VÀ TÍNH TRÊN DÃY SỐ</h3>
                    </th>
                </tr>
                <tr class="bg-success">
                    <th class="text-center">
                        <label>Nhập dãy số:</label>
                    </th>
                    <td><input class="form-control" name="arr" type="text" value="<?php if(isset($a4)) echo $a4 ?>"/></td>
                    <td class="text-danger"><b>(*)</b></td>
                </tr>
                <tr class="bg-success text-center">
                    <td colspan="3"><input class="btn btn-info col-8" name="submitp4b4" type="submit" value="Tổng dãy số"/></td>
                </tr>
                <tr class="bg-success">
                    <th class="text-center">
                        <label>Tổng dãy số:</label>
                    </th>
                    <td colspan="2"><input class="form-control" type="text" disabled="1" value="<?php echo $sum ?>"/></td>
                </tr>
                <tr class="bg-success text-center">
                    <td colspan="3">
                        <b class="text-danger">(*)</b>
                        Các số được nhập cách nhau bằng dấu ","
                    </td>
                </tr>
            </table>
        </form>
    </body>
</html>
