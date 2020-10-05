<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Tính trên dãy số</title>
        <link rel="stylesheet" href="../bootstrap.min.css"/>
    </head>
    <body>
        <?php
        // put your code here
        ?>
        <form action="" method="POST">
            <table align="center" class="table-condensed">
                <tr class="bg-primary">
                    <th class="text-center" colspan="3" style="color: white;">
                        <h3 style="font-family:'Comic Sans MS'">NHẬP VÀ TÍNH TRÊN DÃY SỐ</h3>
                    </th>
                </tr>
                <tr class="bg-success">
                    <th class="text-center">
                        <label>Nhập dãy số:</label>
                    </th>
                    <td><input class="form-control" name="arr" type="text" value="<?php if(isset($_POST["arr"])) echo $a ?>"/></td>
                    <td class="text-danger"><b>(*)</b></td>
                </tr>
                <tr class="bg-success">
                    <td></td>
                    <td><input class="form-control" name="arr" type="text" value="<?php if(isset($_POST["arr"])) echo $a ?>"/></td>
                    <td></td>
                </tr>
            </table>
        </form>
    </body>
</html>
