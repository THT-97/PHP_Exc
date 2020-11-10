<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <?php $page_title="Forms - Form"; include ('../../Website/includes/headtag.html')?>
    <body style="background-color: darkseagreen; font-size: 120%">
        <?php
            include ('../../Website/includes/header.php');
            if(!isset($cUser)){
                header("Location:../../Website/login.php");
                exit();
            }
        ?>
        <form class="d-flex justify-content-center m-5" action="config.php" method="POST">
            <fieldset class="col-10 bg-light">
                <legend class="bg-info col-4"><b>Enter your information</b></legend>
                <table border="1">
                    <tr>
                        <td>Họ tên:</td>
                        <td><input size="100%" name="txtName" type="text" value="<?php if(isset($_POST["txtName"]))echo "$name" ?>"/></td>
                    </tr>
                    <tr>
                        <td>Địa chỉ:</td>
                        <td><input size="100%" name="txtAddr" type="text" value="<?php if(isset($_POST["txtAddr"]))echo "$addr" ?>"/></td>
                    </tr>
                    <tr>
                        <td>Số điện thoại:</td>
                        <td><input name="txtPhone" type="text" value="<?php if(isset($_POST["txtPhone"]))echo "$phone" ?>"/></td>
                    </tr>
                    <tr>
                        <td>Giới tính:</td>
                        <td>
                            <input name="rGender" type="radio" value="0" <?php if(isset($_POST["rGender"])==0)echo "checked=checked" ?> checked/>Nam
                            <input name="rGender" type="radio" value="1" <?php if(isset($_POST["rGender"])==1)echo "checked=checked" ?>/>Nữ
                        </td>
                    </tr>
                    <tr>
                        <td>Quốc tịch:</td>
                        <td>
                            <select name="Country">
                                <option value="1" <?php if(isset($_POST["Country"])==1) echo 'selected="selected"'?>selected>Việt Nam</option>
                                <option value="2" <?php if(isset($_POST["Country"])==2) echo 'selected="selected"'?>>Thái Lan</option>
                                <option value="3" <?php if(isset($_POST["Country"])==3) echo 'selected="selected"'?>>Campuchia</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Các môn đã học:</td>
                        <td>
                            <input name="chkPhp" type="checkbox" <?php if(isset($_POST["chkPhp"])) echo 'checked=checked"'?>/> PHP & MySQL
                            <input name="chkCpp" type="checkbox" <?php if(isset($_POST["chkCpp"])) echo 'checked=checked"'?>/> C++
                            <input name="chkXml" type="checkbox" <?php if(isset($_POST["chkXml"])) echo 'checked=checked"'?>/> XML
                            <input name="chkPy" type="checkbox" <?php if(isset($_POST["chkPy"])) echo 'checked=checked"'?>/> Python
                        </td>
                    </tr>
                    <tr>
                        <td>Ghi chú:</td>
                        <td>
                            <textarea name="txtComment" rows="5" cols="60">
                                <?php if(isset($_POST["txtComment"]))echo "$comment" ?>
                            </textarea>
                        </td>
                    </tr>
                    <tr>
                        <td align="center" colspan="2">
                            <input name="Submit" type="submit" value="Gửi"/>
                            <input name="Cancel" type="reset" value="Hủy"/>
                        </td>
                    </tr>
                </table>
            </fieldset>
        </form>
        <?php include ('../../Website/includes/footer.html')?>
    </body>
</html>
