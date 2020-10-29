<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <?php $page_title="OOP"; include ('includes/headtag.html')?>
    <body style="background-color: darkseagreen">
        <?php include ('includes/header.php')?>
        <div style="margin-bottom: 5%; padding-left: 5%">
            <h1>PHP & OOP</h1><hr/>
            <?php
                include '../P5/Shapes.php';
                echo '<hr/>';
                include '../P5/Bai2.php';
            ?>
            <hr/>
            <h3><b><a style="color: darkgreen" href="../P5/Bai1/FormNV.php">Quản lý nhân viên</a><hr/></b></h3>
        </div>
        <?php include ('includes/footer.html')?>
    </body>
</html>
