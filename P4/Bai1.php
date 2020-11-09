<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <?php $page_title='Array&String - Mảng ngẫu nhiên'; include '../Website/includes/headtag.html'; ?>
    <body style="background-color: darkseagreen">
        <?php
            include '../Website/includes/header.php';
            if(isset($_POST["submitp4b1"])){
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
                foreach ($a as $key => $value) if($value == 0) $zero[]=$key;
                if(count($zero)>0) $result .= implode(",", $zero)."\n";
                else $result .= "Không tìm thấy giá trị = 0 \n";
                //Sắp xếp tăng dần
                sort($a);
                $result .="f: Mảng tăng dần: " .implode(" ", $a);
            }
        ?>
        <form class="d-flex justify-content-center m-5" action="#p4b1" method="POST" id="p4b1">
            <h2>Mảng ngẫu nhiên</h2>
            <table class="table-condensed">
                <tr>
                    <td class="text-center">Nhập số phần tử của mảng:</td>
                    <td><input class="form-control" type="number" min="2" max="100" name="numN" value="<?php if(isset($_POST["numN"])) echo $n ?>"/></td>
                    <td><input class="btn btn-info" type="submit" name="submitp4b1" value="Xem kết quả"/></td>
                </tr>
                <tr>
                    <td colspan="3">
                        <textarea class="form-control" rows="15" cols="100">
                            <?php
                                if(isset($result))echo $result;
                            ?>
                        </textarea>
                    </td>
                </tr>
            </table>
        </form>
        <?php include '../Website/includes/footer.html'; ?>
    </body>
</html>
