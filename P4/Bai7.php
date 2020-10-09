<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Thay thế</title>
        <link rel="stylesheet" href="../bootstrap.min.css"/>
    </head>
    <body>
        <?php
            $a = '';
            $result = '';
            
            function replace($arr, $target, $value){
                for ($i = 0; $i < count($arr); $i++) if($arr[$i]==$target)$arr[$i] = $value;
                return implode(",", $arr);
            }

            if(isset($_POST["submit"])){
                $a = str_replace(" ", "", $_POST["arr"]);
                $n = $_POST['n'];
                $x = $_POST['x'];
                $arr = explode(",", $a);
                foreach ($arr as $key => $value) if(!is_numeric($value)) unset($arr[$key]); //remove non numeric elements
                $a = implode(",", $arr);
                $result = replace($arr, $n, $x);
            }
        ?>
        <form action="" method="POST">
            <table align="center" class="table-condensed">
                <tr bgcolor='purple'>
                    <th class="text-center" colspan="3" style="color: white;">
                        <h3 class="text-uppercase" style="font-family:'Comic Sans MS'">Thay thế</h3>
                    </th>
                </tr>
                <tr class="bg-danger">
                    <th>Nhập mảng:</th>
                    <td><input class="form-control" name="arr" size="50%" type="text" value="<?php if(isset($_POST["arr"])) echo $a ?>"/></td>
                </tr>
                <tr class="bg-danger">
                    <th>Giá trị cần thay thế:</th>
                    <td><input class="input-sm" name="n" type="number" value="<?php if(isset($_POST["n"])) echo $n ?>"/></td>
                </tr>
                <tr class="bg-danger">
                    <th>Giá trị thay thế:</th>
                    <td><input class="input-sm" name="x" type="number" value="<?php if(isset($_POST["x"])) echo $x ?>"/></td>
                </tr>
                <tr class="bg-danger text-center">
                    <td></td>
                    <td class="text-left"><input class="btn btn-warning" name="submit" type="submit" value="Thay thế"/></td>
                </tr>
                <tr>
                    <th>Mảng cũ:</th>
                    <td><input class="form-control" type="text" disabled="1" value="<?php echo $a ?>"/></td>
                </tr>
                <tr>
                    <th>Mảng sau khi thay thế:</th>
                    <td><input class="form-control" type="text" disabled="1" value="<?php echo $result ?>"/></td>
                </tr>
                <tr class="text-center">
                    <td colspan="2">(<b style="color: red">Ghi chú:</b> Các phần tử trong mảng sẽ cách nhau bằng dấu ",")</td>
                </tr>
            </table>
        </form>
    </body>
</html>
