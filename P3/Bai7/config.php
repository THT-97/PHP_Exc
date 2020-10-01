<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
            if(isset($_POST["Submit"])){
                echo '<h3>Bạn đã nhập thành công, dưới đây là những thông tin bạn nhập:</h3>';
                $name = $_POST["txtName"];
                $addr = $_POST["txtAddr"];
                $phone = $_POST["txtPhone"];
                $gender = $_POST["rGender"];
                $country = $_POST["Country"];
                $comment = $_POST["txtComment"];
                echo "Họ tên: $name <br/>";
                echo 'Giới tính: ';
                if($gender==0) echo 'Nam';  else echo 'Nữ';
                echo '<br/>';
                echo 'Quốc tịch: ';
                switch ($country){
                    case 1: echo 'Việt Nam'; break;
                    case 2: echo 'Thái Lan'; break;
                    case 3: echo 'Campuchia'; break;
                }
                echo '<br/>';
                echo "Địa chỉ: $addr <br/>";
                echo "Điện thoại: $phone <br/>";
                echo "Ghi chú: $comment <br/>";
            }
            else {
                $name = "";
                $addr = "";
                $phone = "";
                $gender = 0;
                $country = 1;
                $comment = "";
            }
        ?>
        <br/>
        <a class="btn btn-default" href="javascript:window.history.back(-1);">Quay lại</a>
    </body>
</html>
