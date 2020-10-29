<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <?php $page_title ='Quản lý nhân viên'; include '../../Website/includes/headtag.html'; ?>
    <body>
        <?php 
            require_once 'NhanVien.php';
            include ('../../Website/includes/header.php');
        ?>
        <form action="#p5b1" method="POST" id="p5b1">
            <h1 class="text-center text-uppercase">quản lý nhân viên</h1>
            <table align="center" class="table-condensed bg-warning">
                <tr>
                    <td>Họ và tên:</td>
                    <td><input class="form-control" name="name" size="50%" type="text" value="<?php if(isset($_POST['name'])) echo $nv->getName() ?>"/></td>
                    <td>Số con:</td>
                    <td><input class="form-control" name="kids" style="width: 80%" type="number" min="0" max="10" value="<?php if(isset($_POST['kids'])) echo $nv->getKids() ?>"/></td>
                </tr>
                <tr>
                    <td>Ngày sinh:</td>
                    <td><input class="form-control" style="width: 60%" name="dob" type="date" value="<?php if(isset($_POST['dob'])) echo $nv->getDob() ?>"/></td>
                    <td>Ngày vào làm:</td>
                    <td><input class="form-control" style="width: 100%" name="dow" type="date" value="<?php if(isset($_POST['dow'])) echo $nv->getDow() ?>"/></td>
                </tr>
                <tr>
                    <td>Giới tính:</td>
                    <td>
                        <input name="gender" type="radio" value="0" <?php if(isset($_POST["gender"]) && $_POST["gender"]==0) echo "checked=checked"?> checked/>
                        Nam
                        <input name="gender" type="radio" value="1" <?php if(isset($_POST["gender"]) && $_POST["gender"]==1) echo "checked=checked"?>/>
                        Nữ
                    </td>
                    <td>Hệ số lương:</td>
                    <td><input class="form-control" style="width: 80%" name="smul" type="text" value="<?php if(isset($_POST['smul'])) echo $nv->getSmul() ?>"/></td>
                </tr>
                <tr>
                    <td>Loại nhân viên:</td>
                    <td>
                        <input name="dep" type="radio" value="0" <?php if(isset($_POST["dep"]) && $dep==0) echo "checked=checked"?> checked/>
                        Văn phòng
                    </td>
                    <td><input name="dep" type="radio" value="1" <?php if(isset($_POST["dep"]) && $dep==1) echo "checked=checked"?>/>
                        Sản xuất
                    </td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td class="form-inline">
                        Số ngày vắng
                        <input class="form-control" style="width: 45%" name="absence" type="number" min="0" value="<?php if(isset($_POST['absence'])&&($dep == 0)) echo $nv->getAbsence() ?>"/>
                    </td>
                    <td class="form-inline">
                        Số sản phẩm:
                        <input class="form-control" style="width: 60%" name="products" type="number" min="0" value="<?php if(isset($_POST['products'])&&($dep == 1)) echo $nv->getProducts() ?>"/>
                    </td>
                    <td></td>
                </tr>
            </table>
            <p class="text-center"><input class="btn btn-success" name="submitp5b1" type="submit" value="Tính lương"/></p>
            <table align="center" class="table-condensed bg-warning">
                <tr>
                    <td>Tiền lương:</td>
                    <td><input class="form-control" size="30%" type="text" disabled="1" value="<?php if(isset($_POST['submitp5b1'])) echo $nv->TinhLuong()." VNĐ" ?>"/></td>
                    <td>Tiền trợ cấp:</td>
                    <td><input class="form-control" size="30%" type="text" disabled="1" value="<?php if(isset($_POST['submitp5b1'])) echo $nv->TroCap()." VNĐ" ?>"/></td>
                </tr>
                <tr>
                    <td>Tiền thưởng:</td>
                    <td><input class="form-control" size="30%" type="text" disabled="1" value="<?php if(isset($_POST['submitp5b1'])) echo $nv->Thuong()." VNĐ" ?>"/></td>
                    <td>Tiền phạt:</td>
                    <td><input class="form-control" size="30%" type="text" disabled="1" value="<?php if(isset($_POST['submitp5b1'])&&($dep==0)) echo $nv->Phat()." VNĐ" ?>"/></td>
                </tr>
                <tr>
                    <td class="form-inline text-center" colspan="4">
                        Thực lĩnh:
                        <input class="form-control" name="total" size="50%" type="text" disabled="1" value="<?php echo $total." VNĐ" ?>"/>
                    </td>
                </tr>
            </table>
        </form>
        <?php include ('../../Website/includes/footer.html')?>
    </body>
</html>
