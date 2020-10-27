<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <?php $page_title="Forms"; include ('includes/headtag.html')?>
    <body style="background-color: darkseagreen">
        <?php include ('includes/header.html')?>
        <div style="margin-bottom: 5%; padding-left: 5%">
            <h1>Forms</h1>
            <?php
                include '../P3/Bai1.php';
                echo '<hr/>';
                include '../P3/Bai2.php';
                echo '<hr/>';
                include '../P3/Bai3.php';
                echo '<hr/>';
                include '../P3/Bai4.php';
                echo '<hr/>';
                include '../P3/Bai5.php';
            ?>
            <a style="color: darkgreen" href="../P3/Bai6/Bai6.php"><h3>Phép tính trên hai số</h3</a>
            <a style="color: darkgreen" href="../P3/Bai7/form.php"><h3>Form - Config</h3</a>
            <a style="color: darkgreen" href="../P3/FormXoSo/XoSo.php"><h3>Xổ Số Kiến Thiết</h3</a>
        </div>
        <?php include ('includes/footer.html')?>
    </body>
</html>
