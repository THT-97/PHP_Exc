<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <?php $page_title="Config"; include ('../../Website/includes/headtag.html')?>
    <body style="font-size: 150%">
        <?php
            include ('../../Website/includes/header.html');
            if(isset($_POST["Submit"])){
                echo '<h3>Bạn đã nhập thành công, dưới đây là những thông tin bạn nhập:</h3>';
                $name = $_POST["txtName"];
                $addr = $_POST["txtAddr"];
                $phone = $_POST["txtPhone"];
                $gender = $_POST["rGender"];
                $country = $_POST["Country"];
                $comment = $_POST["txtComment"];
                $subs = [];
                echo "Họ tên: $name <br/>";
                echo 'Giới tính: ';
                if($gender==0) echo 'Nam';  else echo 'Nữ';
                echo '<br/>';
                //combo box
                echo 'Quốc tịch: ';
                switch ($country){
                    case 1: echo 'Việt Nam'; break;
                    case 2: echo 'Thái Lan'; break;
                    case 3: echo 'Campuchia'; break;
                }
                //------------
                echo '<br/>';
                echo "Địa chỉ: $addr <br/>";
                echo "Điện thoại: $phone <br/>";
                //check boxes
                echo "Môn học: ";
                if(isset($_POST["chkPhp"])) array_push ($subs, 'PHP & MySQL');
                if(isset($_POST["chkCpp"])) array_push ($subs, 'C++');
                if(isset($_POST["chkXml"])) array_push ($subs, 'XML');
                if(isset($_POST["chkPy"])) array_push ($subs, 'Python');
                for ($i = 0; $i < count($subs); $i++) {
                    if($i>0) echo ', ';
                    echo "$subs[$i]";
                }
                echo '<br/>';
                //--------------
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
        <a class="btn btn-warning" href="javascript:window.history.back(-1);">Quay lại</a>
        <?php include ('../../Website/includes/footer.html')?>
    </body>
</html>
