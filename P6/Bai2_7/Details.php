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
            require '../connect.php';
            $id = $_GET['id'];
            $query = "SELECT * FROM sua, hang_sua WHERE Ma_sua = '$id' AND sua.Ma_hang_sua = hang_sua.Ma_hang_sua";
            $result = mysqli_query($conn, $query);
            $arr = mysqli_fetch_array($result);
        ?>
        <table align="center" width=50% border="5" bordercolor="red">
            <tr bgcolor="pink"><th style="color: brown" colspan="2"><h2><i><?php echo $arr["Ten_sua"]." - ".$arr["Ten_hang_sua"]?></i></h2></th></tr>
            <tr>
                <td><img src="../images/<?php echo $arr['Hinh'] ?>" width="150", height="200"/></td>
                 <td width=80% word-wrap=break-word>
                    <b>Thành phần dinh dưỡng:</b><br/>
                    <?php echo $arr['TP_Dinh_Duong'] ?><br/>
                    <b>Lợi ích:</b><br/>
                    <?php echo $arr['Loi_ich'] ?>
                    <p style="text-align: right"><?php echo "<b>Trọng lượng: </b>".$arr['Trong_luong']."gr - <b>Đơn giá: </b>".$arr['Don_gia']." VNĐ" ?></p>
                </td>
            </tr>
            <tr><td align="right"><a class="btn btn-warning" href="javascript:window.history.back(-1);">Quay về</a></td></tr>
        </table>
    </body>
</html>
