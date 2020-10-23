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
                if(isset($_POST['ptypes'])) $ptype = $_POST['ptypes'];
                if(isset($_POST['pbrands'])) $pbrand = $_POST['pbrands'];
                $query = "SELECT *"
                        . " FROM sua, hang_sua"
                        . " WHERE sua.Ma_hang_sua=hang_sua.Ma_hang_sua "
                        . "AND Ten_Sua LIKE'%$pname%'";
                if(isset($ptype)) $query .= " AND Ma_loai_sua = '$ptype'";
                if(isset($pbrand)) $query .= " AND sua.Ma_hang_sua = '$pbrand'";
                $result = mysqli_query($conn, $query);
            }
        ?>
        <form action="" method="POST">
            <table class="table-condensed bg-danger" align="center">
                <tr><th class="text-center" colspan="4"><h2>TÌM KIẾM THÔNG TIN SỮA</h2></th></tr>
                <tr>
                    <th class="text-center">Loại sữa:</th>
                    <td class="text-center">
                        <select class="form-control" name="ptypes">
                            <?php
                                $types = mysqli_query($conn, "SELECT * FROM Loai_sua");
                                while($tar = mysqli_fetch_array($types)){
                                    echo "<option value='$tar[Ma_loai_sua]' ";
                                    if(isset($_POST['ptypes']) && $_POST['ptypes']==$tar['Ma_loai_sua']) echo "selected='1'";
                                    echo "> $tar[Ten_loai] </option>";
                                }
                            ?>
                        </select>
                    </td>
                    <th class="text-center">Hãng sữa:</th>
                    <td class="text-center">
                        <select class="form-control" name="pbrands">
                            <?php
                                $brands = mysqli_query($conn, "SELECT Ma_hang_sua, Ten_hang_sua FROM Hang_sua");
                                while($bar = mysqli_fetch_array($brands)){
                                    echo "<option value='$bar[Ma_hang_sua]' ";
                                    if(isset($_POST['pbrands']) && $_POST['pbrands']==$bar['Ma_hang_sua']) echo "selected='1'";
                                    echo "> $bar[Ten_hang_sua]</option>";
                                }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td class="text-right"><b>Tên sữa:</b></td>
                    <td colspan="2">
                        <input class="form-control" name="pname" type="text" value="<?php if(isset($_POST['pname'])) echo $pname ?>" />
                    </td>
                    <td class="text-left"><input class="btn btn-default" name="submit" type="submit" value="Tìm kiếm" /></td>
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
