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
        <link rel="stylesheet" href="../bootstrap.min.css" />
    </head>
    <body>
        <?php
            require 'connect.php';
            if(isset($_POST['submit'])){
                $pname = $_POST['pname'];
                $query = "SELECT *"
                        . " FROM sua, hang_sua"
                        . " WHERE sua.Ma_hang_sua=hang_sua.Ma_hang_sua AND Ten_Sua LIKE'%$pname%'";
                $result = mysqli_query($conn, $query);
            }
        ?>
        <form action="" method="POST">
            <table class="table bg-danger" align="center">
                <tr><th class="text-center" colspan="3"><h2>TÌM KIẾM THÔNG TIN SỮA</h2></th></tr>
                <tr>
                    <td class="text-center">
                        <span><b>Tên sữa:</b></span>
                        <input name="pname" type="text" value="<?php if(isset($_POST['pname'])) echo $pname ?>" />
                        <input class="btn btn-default" name="submit" type="submit" value="Tìm kiếm" />
                    </td>
                </tr>
            </table>
        </form>
        <?php
        if(isset($result)) {
            echo "<p style='text-align:center'><b>Có ".mysqli_num_rows($result).' sản phẩm được tìm thấy</b></p>';
            echo "<table align='center' width=50% border=1>";
            while($arr = mysqli_fetch_array($result)){
                $dg = $arr['Don_gia'];
                echo "<tr bgcolor=pink><th class='text-center' style='color: brown' colspan=2><h2><i>$arr[Ten_sua] - $arr[Ten_hang_sua]</i></h2></th></tr>";
                echo "<tr>";
                echo "<td><img src='images/$arr[Hinh]' width=150, height=200/></td>";
                echo "<td width=80% word-wrap=break-word>
                        <b>Thành phần dinh dưỡng:</b><br/>
                        $arr[TP_Dinh_Duong]<br/>
                        <b>Lợi ích:</b><br/>
                        $arr[Loi_ich]
                        <p><b>Trọng lượng: </b><span style='color:red'>$arr[Trong_luong] gr</span>
                      - <b>Đơn giá: </b><span style='color:red'>".number_format($dg,0,",",".")." VNĐ</span></p>
                    </td>";
                echo '</tr>';
            }
            echo '</table>';
        }
        ?>
    </body>
</html>
