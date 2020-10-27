<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Thêm sản phẩm</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" />
    </head>
    <body>
        <?php
            require 'connect.php';
            if(isset($_POST['insert'])){
                $id = $_POST['Ma_sua'];
                $name = $_POST['Ten_sua'];
                $brand = $_POST['Hang_sua'];
                $type = $_POST['Loai_sua'];
                $weight = $_POST['Trong_luong'];
                $price = $_POST['Don_gia'];
                $nutrition = $_POST['TPDD'];
                $benefit = $_POST['Loi_ich'];
                $img = $_FILES['Hinh_anh']['name'];
                if($_FILES['Hinh_anh']['name']!=NULL){
                    move_uploaded_file($_FILES['Hinh_anh']['tmp_name'], "../images/".$_FILES['Hinh_anh']['name']);
                }
                $query = "INSERT INTO sua VALUES ";
            }
        ?>
        <form action="" method="POST" enctype="multipart/form-data">
            <table style="background-color: pink" class="table-condensed" align="center">
                <tr><th class="bg-danger text-center" colspan="3"><h3 style="color: white">THÊM SỮA MỚI</h3></th></tr>
                <tr>
                    <td>Mã sữa:</td>
                    <td colspan="2"><input class="form-control" type="text" name="Ma_sua" value="<?php if(isset($_POST['Ma_sua'])) echo $id ?>" /></td>
                </tr>
                <tr>
                    <td>Tên sữa:</td>
                    <td colspan="2"><input class="form-control" type="text" name="Ten_sua" value="<?php if(isset($_POST['Ten_sua'])) echo $name ?>" /></td>
                </tr>
                <tr>
                    <td>Hãng sữa:</td>
                    <td>
                        <select class="form-control" name="Hang_sua">
                            <?php
                                $brands = mysqli_query($conn, "SELECT Ma_hang_sua, Ten_hang_sua FROM Hang_sua");
                                while($bar = mysqli_fetch_array($brands)){
                                    echo "<option value='$bar[Ma_hang_sua]' ";
                                    if(isset($_POST['Hang_sua']) && $brand ==$bar['Ma_hang_sua']) echo "selected='1'";
                                    echo "> $bar[Ten_hang_sua]</option>";
                                }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Loại sữa:</td>
                    <td>
                        <select class="form-control" name="Loai_sua">
                            <?php
                                $types = mysqli_query($conn, "SELECT * FROM Loai_sua");
                                while($tar = mysqli_fetch_array($types)){
                                    echo "<option value='$tar[Ma_loai_sua]' ";
                                    if(isset($_POST['Loai_sua']) && $type==$tar['Ma_loai_sua']) echo "selected='1'";
                                    echo "> $tar[Ten_loai] </option>";
                                }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Trọng lượng:</td>
                    <td>
                        <input class="form-control" type="number" min="0" name="Trong_luong" value="<?php if(isset($_POST['Trong_luong'])) echo $weight ?>" />
                    </td>
                    <td>(gr hoặc ml)</td>
                </tr>
                <tr>
                    <td>Đơn giá:</td>
                    <td><input class="form-control" type="number" min="500" name="Don_gia" value="<?php if(isset($_POST['Don_gia'])) echo $price ?>" /></td>
                    <td>(VNĐ)</td>
                </tr>
                <tr>
                    <td>Thành phần dinh dưỡng:</td>
                    <td colspan="2"><textarea class="form-control" name="TPDD" rows="2" cols="50"><?php if(isset($_POST['TPDD'])) echo $nutrition ?></textarea></td>
                </tr>
                <tr>
                    <td>Lợi ích:</td>
                    <td colspan="2"><textarea class="form-control" name="Loi_ich" rows="2" cols="50"><?php if(isset($_POST['Loi_ich'])) echo $benefit ?></textarea></td>
                </tr>
                <tr>
                    <td>Hình ảnh:</td>
                    <td colspan="2"><input class="form-control" type="file" name="Hinh_anh" value="<?php if(isset($_POST['Hinh_anh'])) echo $img ?>" /></td>
                </tr>
                <tr>
                    <td class="text-center" colspan="3"><input class="btn btn-success" type="submit" name="insert" value="Thêm mới"/></td>
                </tr>
            </table>
        </form>
        
        <?php
            if(isset($_POST['insert'])){
                echo '<table align="center" border="5" bordercolor="red">';
                echo "<tr bgcolor='pink'><th class='text-center' style='color: brown' colspan=2><h2>$name - $brand</h2></th>";
                echo "<tr><td><img src='../images/$img' width='150', height='200'/></td>"
                . '<td word-wrap=break-word>'
                . "     <b>Thành phần dinh dưỡng:</b><br/>$nutrition<br/>"
                    . " <b>Lợi ích:</b><br/>$benefit<br/>";
                echo "<p class='text-right'><b>Trọng lượng: </b>$weight gr - <b>Đơn giá: </b>$price VNĐ";
                echo '</td></tr>';
                echo '</table>';
            }
        ?>
    </body>
</html>
