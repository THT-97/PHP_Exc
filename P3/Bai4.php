<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Kết quả thi đại học</title>
    </head>
    <body>
        <?php
            $total = "";
            $result = "";
            if(isset($_POST["Submit"])){
                $math = $_POST["Math"];
                $phys = $_POST["Phys"];
                $chem = $_POST["Chem"];
                $std = $_POST["Standard"];
                if(is_numeric($math) && is_numeric($phys) && is_numeric($chem)) $total = $math + $phys + $chem;
                if(is_numeric($std)){
                    if($total >= $std) $result="Đậu";
                    else $result = "Tạch";
                }
            }
        ?>
        <form action="" method="POST">
            <table style="border-collapse:collapse" width='30%'>
                <tr bgcolor='purple'>
                    <th colspan="3" width='100%'>
                        <h2 style="color:white">KẾT QUẢ THI ĐẠI HỌC</h2>
                    </th>
                </tr>
                <tr bgcolor='pink'>
                    <td width='50%'>Toán:</td>
                    <td><input type="text" name="Math" value="<?php if(isset($_POST["Math"])) echo $math ?>"/></td>
                    <td>
                        <?php 
                            if(isset($math)){
                                if(!is_numeric($math) or $math < 0) echo "Điểm phải là số >= 0";
                            }
                        ?>
                    </td>
                </tr>
                <tr bgcolor='pink'>
                    <td width='50%'>Lý:</td>
                    <td><input type="text" name="Phys" value="<?php if(isset($_POST["Phys"])) echo $phys ?>"/></td>
                    <td>
                        <?php 
                            if(isset($phys)){
                                if(!is_numeric($phys) or $phys < 0) echo "Điểm phải là số >= 0";
                            }
                        ?>
                    </td>
                </tr>
                <tr bgcolor='pink'>
                    <td width='50%'>Hóa:</td>
                    <td><input type="text" name="Chem" value="<?php if(isset($_POST["Chem"])) echo $chem ?>"/></td>
                    <td>
                        <?php 
                            if(isset($chem)){
                                if(!is_numeric($chem) or $chem < 0) echo "Điểm phải là số >= 0";
                            }
                        ?>
                    </td>
                </tr>
                <tr bgcolor='pink'>
                    <td width='50%'>Điểm chuẩn:</td>
                    <td><input type="text" name="Standard" value="<?php if(isset($_POST["Standard"])) echo $std ?>"/></td>
                    <td>
                        <?php 
                            if(isset($std)){
                                if(!is_numeric($std) or $std < 0) echo "Điểm phải là số >= 0";
                            }
                        ?>
                    </td>
                </tr>
                <tr bgcolor='pink'>
                    <td width='50%'>Tổng điểm:</td>
                    <td><input type="text" name="Total" disabled="1" value="<?php echo $total ?>"/></td>
                    <td></td>
                </tr>
                <tr bgcolor='pink'>
                    <td width='50%'>Kết quả:</td>
                    <td><input type="text" disabled="1" value="<?php echo $result ?>"/></td>
                    <td></td>
                </tr>
                <tr bgcolor='pink'>
                    <td colspan="3" align='center'><input type="submit" name="Submit" value="Tính"/></td>
                </tr>
            </table>
        </form>
    </body>
</html>
