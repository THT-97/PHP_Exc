<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <?php $page_title='Array&String - Đếm, ghép mảng và sắp xếp'; include '../Website/includes/headtag.html'; ?>
    <body style="background-color: darkseagreen">
        <?php
            include '../Website/includes/header.php';
            if(!isset($cUser)){
                header("Location:../Website/login.php");
                exit();
            }
            $c = [];
            if(isset($_POST["submitp4b9"])){
                $a = explode(",", $_POST["arr1"]);
                $b = explode(",", $_POST["arr2"]);
                $c = array_merge($a, $b);
            }
        ?>
        <form class="d-flex justify-content-center m-5" action="#p4b9" method="POST" id="p4b9">
            <table align="center" class="table-condensed">
                <tr bgcolor='purple'>
                    <th class="text-center" colspan="3" style="color: white;">
                        <h3 class="text-uppercase" style="font-family:'Comic Sans MS'">Đếm phần tử, ghép mảng và sắp xếp</h3>
                    </th>
                </tr>
                <tr bgcolor="pink">
                    <th>Mảng A:</th>
                    <td><input class="form-control" name="arr1" size="50%" type="text" value="<?php if(isset($_POST["arr1"])) echo implode("," , $a) ?>"/></td>
                </tr>
                <tr bgcolor="pink">
                    <th>Mảng B:</th>
                    <td><input class="form-control" name="arr2" size="50%" type="text" value="<?php if(isset($_POST["arr2"])) echo implode("," , $b) ?>"/></td>
                </tr>
                <tr bgcolor="pink" class="text-center">
                    <td></td>
                    <td class="text-left"><input class="btn btn-warning" name="submitp4b9" type="submit" value="Thực hiện"/></td>
                </tr>
                <tr class="bg-danger">
                    <th>Số phần tử mảng A:</th>
                    <td><input class="form-control" type="text" disabled="1" value="<?php if(isset($_POST["arr1"])) echo count($a) ?>"/></td>
                </tr>
                <tr class="bg-danger">
                    <th>Số phần tử mảng B:</th>
                    <td><input class="form-control" type="text" disabled="1" value="<?php if(isset($_POST["arr2"])) echo count($b) ?>"/></td>
                </tr>
                <tr class="bg-danger">
                    <th>Mảng C:</th>
                    <td><input class="form-control" type="text" disabled="1" value="<?php if(count($c)>0) echo implode("," , $c) ?>"/></td>
                </tr>
                <tr class="bg-danger">
                    <th>Mảng C tăng dần:</th>
                    <td><input class="form-control" type="text" disabled="1" value="<?php if(sort($c)) echo implode(",", $c) ?>"/></td>
                </tr>
                <tr class="bg-danger">
                    <th>Mảng C giảm dần:</th>
                    <td><input class="form-control" type="text" disabled="1" value="<?php if(rsort($c)) echo implode(",", $c) ?>"/></td>
                </tr>
                <tr class="bg-warning text-center">
                    <td colspan="2">(<b style="color: red">Ghi chú:</b> Các phần tử trong mảng sẽ cách nhau bằng dấu ",")</td>
                </tr>
            </table>
        </form>
        <?php include '../Website/includes/footer.html'; ?>
    </body>
</html>
