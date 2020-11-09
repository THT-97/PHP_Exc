<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <?php $page_title='Forms - Diện tích và chu vi hình tròn'; include '../Website/includes/headtag.html'; ?>
    <body style="background-color: darkseagreen">
        <?php
            include '../Website/includes/header.php';
            if(!isset($cUser)){
                header("Location:../Website/login.php");
                exit();
            }
            $area = 0;
            $outline = 0;
            const PI = 3.14;
            if(isset($_POST["submitp3b2"])){
                $radius = $_POST["nRadius"];
                if(!is_numeric($radius)) $radius = 0;
                $area = PI* pow($radius, 2);
                $outline = 2*PI*$radius;
            }
        ?>
        <form class="d-flex justify-content-center m-5" action="" method="POST">
            <table style="border-collapse:collapse" width='40%'>
                <tr bgcolor='orange'>
                    <th colspan="2" width='100%'>
                        <h2 class="text-center" style="color:brown">DIỆN TÍCH VÀ CHU VI HÌNH TRÒN</h2>
                    </th>
                </tr>
                <tr bgcolor='yellow'>
                    <td align='center' width='50%'>Bán kính: </td>
                    <td><input type="number" min="0" name="nRadius" value="<?php echo $radius ?>"/></td>
                </tr>
                <tr bgcolor='yellow'>
                    <td align='center'>Diện tích: </td>
                    <td><input type="text" name="nArea" value="<?php echo $area ?>" disabled="1"/></td>
                </tr>
                <tr bgcolor='yellow'>
                    <td align='center'>Chu vi: </td>
                    <td><input type="text" name="nOutline" value="<?php echo $outline ?>" disabled="1"/></td>
                </tr>
                <tr bgcolor='yellow'>
                    <td colspan="2" align='center'><input type="submit" name="submitp3b2" value="Tính"/></td>
                </tr>
            </table>
        </form>
        <?php include '../Website/includes/footer.html'; ?>
    </body>
</html>
