<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <?php $page_title="Phép tính trên hai số"; include ('../../Website/includes/headtag.html')?>
    <body>
        <?php include ('../../Website/includes/header.php')?>
        <form action="Bai6xl.php" method="POST">
            <table class="table-condensed col-6" style="margin-left: auto; margin-right: auto">
                <tr>
                    <th colspan="2">
                        <h2 class="text-primary">PHÉP TÍNH TRÊN HAI SỐ</h2>
                    </th>
                </tr>
                <tr>
                    <td class="text-right" width="40%"><b class="text-primary">Số thứ nhất:</b></td>
                    <td><input width="50%" type="number" name="A" value="<?php if(isset($_POST["A"])) echo $a ?>"/></td>
                </tr>
                <tr>
                    <td class="text-right" width='40%'><b class="text-primary">Số thứ hai:</b></td>
                    <td><input width="50%" type="number" name="B" value="<?php if(isset($_POST["B"])) echo $b ?>"/></td>
                </tr>
                <tr>
                    <td class="text-right" width='40%'><b class="text-warning">Chọn phép tính:</b></td>
                    <td>
                        <p class="text-danger">
                            <input name="operator" type="radio" value="1" <?php if(isset($_POST["operator"]) && $op==1) echo "checked=checked"?> checked/>
                            Cộng
                            <input name="operator" type="radio" value="2" <?php if(isset($_POST["operator"]) && $op==2) echo "checked=checked"?>/>
                            Trừ
                            <input name="operator" type="radio" value="3" <?php if(isset($_POST["operator"]) && $op==3) echo "checked=checked"?>/>
                            Nhân
                            <input name="operator" type="radio" value="4" <?php if(isset($_POST["operator"]) && $op==4) echo "checked=checked"?>/>
                            Chia
                        </p> 
                    </td>
                </tr>
                <tr class="bg-success">
                    <td colspan="2" align='center'><input class="btn btn-default" type="submit" name="Submit" value="Tính"/></td>
                </tr>
            </table>
        </form>
            <?php include ('../../Website/includes/footer.html')?>
    </body>
</html>
