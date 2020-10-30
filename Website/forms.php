<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <?php $page_title="Products"; include ('includes/headtag.html')?>
    <body style="background-color: darkseagreen">
        <?php 
            include ('includes/header.php');
            if(!isset($cUser)) header("Location:login.php");
        ?>
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
            <hr/>
            <h3>
                <b>
                    <a style="color: darkgreen" href="../P3/Bai6/Bai6.php">Phép tính trên hai số</a><hr/>
                    <a style="color: darkgreen" href="../P3/Bai7/form.php">Form - Config</a><hr/>
                    <a style="color: darkgreen" href="../P3/FormXoSo/XoSo.php">Xổ Số Kiến Thiết</a>
                </b>
            </h3>
        </div>
        <?php include ('includes/footer.html')?>
    </body>
</html>
