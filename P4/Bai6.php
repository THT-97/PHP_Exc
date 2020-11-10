<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <?php $page_title='Array&String - Tìm kiếm'; include '../Website/includes/headtag.html'; ?>
    <body style="background-color: darkseagreen">
        <?php
            include '../Website/includes/header.php';
            if(!isset($cUser)){
                header("Location:../Website/login.php");
                exit();
            }
            $a6 = '';
            $result = '';
            if(isset($_POST["submitp4b6"])){
                function search($arr, $v){
                    $count = 0;
                    $report;
                    for ($i = 0; $i < count($arr); $i++) {
                        if($arr[$i]==$v){
                            if($count==0) $report = "Tìm thấy tại vị trí thứ: ";
                            $count += 1;
                            if($count>1) $report .= ", ";
                            $report .= $i+1;
                        }
                    }
                    if($count == 0) $report = 'Không tìm thấy số cần tìm';
                    else $report .= " của mảng";
                    return $report;
                }
                
                $a6 = str_replace(" ", "", $_POST["arr"]);
                $n6 = $_POST['n6'];
                $arr = explode(",", $a6);
                $result = search($arr,$n6);
                foreach ($arr as $key => $value) if(!is_numeric($value)) unset($arr[$key]); //remove non numeric elements
                $a6 = implode(",  ", $arr);
            }
        ?>
        <form class="d-flex justify-content-center m-5" action="#p4b6" method="POST" id="p4b6">
            <table align="center" class="table-condensed">
                <tr bgcolor='cadetblue'>
                    <th class="text-center" colspan="3" style="color: white;">
                        <h3 class="text-uppercase" style="font-family:'Comic Sans MS'">Tìm kiếm</h3>
                    </th>
                </tr>
                <tr class="bg-success">
                    <th>Nhập mảng:</th>
                    <td><input class="form-control" size="50%" name="arr" type="text" value="<?php if(isset($_POST["arr"])) echo $a6 ?>"/></td>
                </tr>
                <tr class="bg-success">
                    <th>Nhập số cần tìm:</th>
                    <td><input class="input-sm" name="n6" type="number" value="<?php if(isset($_POST["n6"])) echo $n6 ?>"/></td>
                </tr>
                <tr class="bg-success text-center">
                    <td></td>
                    <td class="text-left"><input class="btn btn-info" name="submitp4b6" type="submit" value="Tìm kiếm"/></td>
                </tr>
                <tr class="bg-success">
                    <th>Mảng:</th>
                    <td><input class="form-control" type="text" disabled="1" value="<?php echo $a6 ?>"/></td>
                </tr>
                <tr class="bg-success">
                    <th>Kết quả tìm kiếm:</th>
                    <td><input class="form-control" type="text" style="color:red" disabled="1" value="<?php echo $result ?>"/></td>
                </tr>
                <tr bgcolor='turquoise' class="text-center">
                    <td colspan="2">(Các phần tử trong mảng sẽ cách nhau bằng dấu ",")</td>
                </tr>
            </table>
        </form>
        <?php include '../Website/includes/footer.html'; ?>
    </body>
</html>
