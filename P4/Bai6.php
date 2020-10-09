<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Tìm kiếm</title>
        <link rel="stylesheet" href="../bootstrap.min.css"/>
    </head>
    <body>
        <?php
            $a = '';
            $result = '';
            
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

            if(isset($_POST["submit"])){
                $a = str_replace(" ", "", $_POST["arr"]);
                $n = $_POST['n'];
                $arr = explode(",", $a);
                $result = search($arr,$n);
                foreach ($arr as $key => $value) if(!is_numeric($value)) unset($arr[$key]); //remove non numeric elements
                $a = implode(",  ", $arr);
            }
        ?>
        <form action="" method="POST">
            <table align="center" class="table-condensed">
                <tr bgcolor='cadetblue'>
                    <th class="text-center" colspan="3" style="color: white;">
                        <h3 class="text-uppercase" style="font-family:'Comic Sans MS'">Tìm kiếm</h3>
                    </th>
                </tr>
                <tr class="bg-success">
                    <th>Nhập mảng:</th>
                    <td><input class="form-control" name="arr" size="50%" type="text" value="<?php if(isset($_POST["arr"])) echo $a ?>"/></td>
                </tr>
                <tr class="bg-success">
                    <th>Nhập số cần tìm:</th>
                    <td><input class="input-sm" name="n" type="number" value="<?php if(isset($_POST["n"])) echo $n ?>"/></td>
                </tr>
                <tr class="bg-success text-center">
                    <td></td>
                    <td class="text-left"><input class="btn btn-info" name="submit" type="submit" value="Tìm kiếm"/></td>
                </tr>
                <tr class="bg-success">
                    <th>Mảng:</th>
                    <td><input class="form-control" type="text" disabled="1" value="<?php echo $a ?>"/></td>
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
    </body>
</html>
