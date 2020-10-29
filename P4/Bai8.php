<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <?php $page_title ='Sắp xếp mảng'; include '../Website/includes/headtag.html'; ?>
    <body>
        <?php
            $asc = "";
            $desc = "";

            function validateArray($str){
                $arr = explode(",", $str);
                foreach ($arr as $key => $value) if(!is_numeric($value)) unset ($arr[$key]);
                return $arr;
            }
            
            function swap(&$x,&$y){
                $z = $x;
                $x = $y;
                $y = $z;
            }

            function ascend($arr){
                $result = $arr;
                for ($min = 0; $min < count($result)-1; $min++) {
                    $flag = $min;
                    for ($i = $min+1; $i < count($result); $i++) {
                        if(isset($result[$i]) && $result[$i] < $result[$flag]) $flag = $i;
                    }
                    if($flag != $min) swap($result[$min],$result[$flag]);
                }
                return $result;
            }
            
            function descend($arr){
                $result = $arr;
                for ($min = 0; $min < count($result)-1; $min++) {
                    $flag = $min;
                    for ($i = $min+1; $i < count($result); $i++) {
                        if(isset($result[$i]) && $result[$i] > $result[$flag]) $flag = $i;
                    }
                    if($flag != $min) swap($result[$min],$result[$flag]);
                }
                return $result;
            }

            function writeFile($arr, $mode){
                if(!file_exists("dulieu_bai8.txt")) touch("dulieu_bai8.txt");
                $f = fopen("dulieu_bai8.txt", $mode);
                fwrite($f, $arr);
                fwrite($f, PHP_EOL);
                fclose($f);
            }

            function readFromFile(&$a, &$asc, &$desc){
                $f = fopen("dulieu_bai8.txt", "r") or exit("Not found");
                $a = fgets($f);
                $asc = fgets($f);
                $desc = fgets($f);
            }
            
            if(isset($_POST["submit"])){
                $a = $_POST["arr"];
                $arr = validateArray($a);
                writeFile(implode(",", $arr), "w");
                writeFile(implode(",", ascend($arr)), "a");
                writeFile(implode(",", descend($arr)), "a");
                readFromFile($a, $asc, $desc);
            }
            include '../Website/includes/header.html';
        ?>
        <form action="" method="POST">
            <table align="center" class="table-condensed">
                <tr bgcolor='cadetblue'>
                    <th class="text-center" colspan="3" style="color: white;">
                        <h3 class="text-uppercase" style="font-family:'Comic Sans MS'">Sắp xếp mảng</h3>
                    </th>
                </tr>
                <tr class="bg-success">
                    <th>Nhập mảng:</th>
                    <td><input class="form-control" name="arr" size="50%" type="text" value="<?php if(isset($_POST["arr"])) echo $a ?>"/></td>
                    <td class="text-danger"><b>(*)</b></td>
                </tr>
                <tr class="bg-success text-center">
                    <td></td>
                    <td class="text-left"><input class="btn btn-info" name="submit" type="submit" value="Sắp xếp tăng/giảm"/></td>
                    <td></td>
                </tr>
                <tr class="bg-info">
                    <th class="text-danger" colspan="3">Sau khi sắp xếp:</th>
                </tr>
                <tr class="bg-info">
                    <th>Mảng tăng dần:</th>
                    <td><input class="form-control" type="text" disabled="1" value="<?php echo $asc ?>"/></td>
                    <td></td>
                </tr>
                <tr class="bg-info">
                    <th>Mảng giảm dần:</th>
                    <td><input class="form-control" type="text" disabled="1" value="<?php echo $desc ?>"/></td>
                    <td></td>
                </tr>
                <tr class="bg-success text-center">
                    <td colspan="3">
                        <b class="text-danger">(*)</b>
                        Các số được nhập cách nhau bằng dấu ","
                    </td>
                </tr>
            </table>
        </form>
        <?php include '../Website/includes/footer.html'; ?>
    </body>
</html>
