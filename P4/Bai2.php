<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Tính năm âm lịch</title>
        <link rel="stylesheet" href="../bootstrap.min.css"/>
    </head>
    <body>
        <?php
            $ly = null;
            $pic =null;
            $can = ["Quý","Giáp","Ất","Bính","Đinh","Mậu","Kỷ","Canh","Tân","Nhâm"];
            $chi = ["Hợi","Tí","Sửu","Dần","Mẹo","Thìn","Tỵ","Ngọ","Mùi","Thân","Dậu","Tuất"];
            $icon = ["hoi.jpg","chuot.jpg","suu.jpg","dan.jpg","meo.jpg","thin.jpg","ty.jpg","ngo.jpg","mui.jpg","than.jpg","dau.jpg","tuat.jpg"];
            if(isset($_GET["Submit"])){
                $y = $_GET["year"];
                if($y!=""){
                    $pic = ($y-3)%12;
                    $ly = $can[($y-3)%10]." ".$chi[$pic];
                    $pic = "../images/".$icon[$pic];
                }
            }
        ?>
        <form action="" method="GET">
            <table align="center" class="table-condensed">
                <tr class="bg-primary">
                    <th class="text-center" colspan="3" style="color: white;"><h3 style="font-family:'Comic Sans MS'">TÍNH NĂM ÂM LỊCH</h3></th>
                </tr>
                <tr class="bg-info text-center">
                    <td class="text-primary">Năm dương lịch</td>
                    <td></td>
                    <td class="text-primary">Năm âm lịch</td>
                </tr>
                <tr class="bg-info">
                    <td class="text-primary"><input class="form-control" type="number" min="3" name="year" value="<?php if(isset($_GET["year"])) echo $y ?>"/></td>
                    <td><input class="btn btn-success" name="Submit" type="submit" value="=>" /></td>
                    <td class="text-primary"><input class="form-control text-warning" type="text" disabled="1" value="<?php if(isset($ly)) echo $ly ?>"/></td>
                </tr>
                <tr class="bg-info">
                    <td class="text-center" colspan="3">
                        <?php
                            if(isset($pic)){
                                echo "<img alt='lunaryearpic' src='$pic' width='50%' height='50%' />";
                            }
                        ?>
                    </td>
                </tr>
            </table>
        </form>
    </body>
</html>
