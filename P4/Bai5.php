<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <?php $page_title='Array&String - Phát sinh mảng và tính toán'; include '../Website/includes/headtag.html'; ?>
    <body style="background-color: darkseagreen">
        <?php
            include '../Website/includes/header.php';
            if(!isset($cUser)){
                header("Location:../Website/login.php");
                exit();
            }
            if(isset($_POST['submitp4b5'])){
                $a5 = "";
                $max = "";
                $min = "";
                $sum = "";
                //create array
                function generateArray($size){
                    $array = [];
                    for ($i = 0; $i < $size; $i++) {
                        $array[$i] = rand(0,20);
                    }
                    return $array;
                }
                //array to string
                function arrayToString($ar){
                    return implode(" ", $ar);
                }
                //find max
                function getMax($ar){
                    $max = null;
                    for ($i = 0; $i < count($ar); $i++) if($max==null or $ar[$i]>$max) $max = $ar[$i];
                    return $max;
                }
                //find min
                function getMin($ar){
                    $min = null;
                    for ($i = 0; $i < count($ar); $i++) if($min==null or $ar[$i]<$min) $min = $ar[$i];
                    return $min;
                }
                //sum array
                function getSum($ar){
                    $s = 0;
                    foreach ($ar as $value) {
                        if(is_numeric($value)){
                           $s += $value;
                        }
                    }
                    return $s;
                }
            
                $n5 = $_POST['n5'];
                $ar = generateArray($n5);
                $a5 = arrayToString($ar);
                $max = getMax($ar);
                $min = getMin($ar);
                $sum = getSum($ar);
            }
        ?>
        <form class="d-flex justify-content-center m-5" action="#p4b5" method="POST" id="p4b5">
            <table align="center" class="table-condensed">
                <tr bgcolor="purple">
                    <th class="text-center" colspan="2" style="color: white;">
                        <h3 class="text-uppercase" style="font-family:'Comic Sans MS'">Phát sinh mảng và tính toán</h3>
                    </th>
                </tr>
                <tr class="bg-danger">
                    <th>Nhập số phần tử:</th>
                    <td><input class="form-control" name="n5" type="number" min="0" value="<?php if(isset($_POST["n5"])) echo $n5 ?>"/></td>
                </tr>
                <tr class="bg-danger text-center">
                    <td></td>
                    <td class="text-left"><input class="btn btn-warning col-8" name="submitp4b5" type="submit" value="Phát sinh và tính toán"/></td>
                </tr>
                <tr>
                    <th>Mảng:</th>
                    <td><input class="form-control" type="text" size="50%" disabled="1" value="<?php if(isset($a5)) echo $a5 ?>"/></td>
                </tr>
                <tr>
                    <th>GTLN (MAX) Trong mảng:</th>
                    <td><input class="input-sm" type="text" disabled="1" value="<?php if(isset($max)) echo $max ?>"/></td>
                </tr>
                <tr>
                    <th>GTNN (MIN) Trong mảng:</th>
                    <td><input class="input-sm" type="text" disabled="1" value="<?php if(isset($min)) echo $min ?>"/></td>
                </tr>
                <tr>
                    <th>Tổng mảng:</th>
                    <td><input class="input-sm" type="text" disabled="1" value="<?php if(isset($sum)) echo $sum ?>"/></td>
                </tr>
                <tr class="text-center">
                    <td colspan="2">(<b style="color: red">Ghi chú:</b> Các phần tử trong mảng sẽ có giá trị từ 0 đến 20)</td>
                </tr>
            </table>
        </form>
        <?php include '../Website/includes/footer.html'; ?>
    </body>
</html>
