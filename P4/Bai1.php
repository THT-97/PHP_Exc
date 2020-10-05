<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Mảng ngẫu nhiên</title>
        <link rel="stylesheet" href="../bootstrap.min.css"/>
    </head>
    <body>
        <?php
            if(isset($_POST["Submit"])){
                $n = $_POST["numN"];
                if($n=='') $n = 2;
                //Tạo mảng
                $a = [];
                for ($i = 0; $i < $n; $i++) {
                    $a[$i] = rand(-100,200);
                }
                $result = "a. Mảng: ".implode(" ",$a)."\n";
                //Đếm số chẵn
                $c = 0;
                foreach ($a as $value) if($value % 2 == 0) $c++;
                $result .= "b. Mảng có $c số chẵn \n";
                //Đếm số <100
                $c = 0;
                foreach ($a as $value) if($value < 100) $c++;
                $result .= "c. Mảng có $c số nhỏ hơn 100 \n";
                //Tổng các số < 0
                $c = 0;
                foreach ($a as $value) if($value < 0) $c += $value;
                $result .= "d. Tổng các số âm: $c\n";
                //Vị trí các số 0
                $result .= "e. Các vị trí = 0: ";
                $zero = [];
                foreach ($a as $key => $value) if($value === 0) $zero[]=$key;
                if(count($zero)>0) $result .= implode(",", $zero)."\n";
                else $result .= "Không tìm thấy giá trị = 0 \n";
                //Sắp xếp tăng dần
                sort($a);
                $result .="f: Mảng tăng dần: " .implode(" ", $a);
            }
        ?>
        <form action="" method="POST">
            <table class="table-condensed">
                <tr>
                    <td class="text-center">Nhập 1 số nguyên:</td>
                    <td><input class="form-control" type="number" min="2" max="100" name="numN" value="<?php if(isset($_POST["numN"])) echo $n ?>"/></td>
                    <td><input class="btn" type="submit" name="Submit" value="Tạo mảng"/></td>
                </tr>
                <tr>
                    <td colspan="3">
                        <textarea rows="15" cols="100">
                            <?php
                                if(isset($result))echo $result;
                            ?>
                        </textarea>
                    </td>
                </tr>
            </table>
        </form>
    </body>
</html>
