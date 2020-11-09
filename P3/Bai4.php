<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
   <?php $page_title='Forms - Kết quả thi đại học'; include '../Website/includes/headtag.html'; ?>
    <body style="background-color: darkseagreen">
        <?php
            include '../Website/includes/header.php';
            $total = "";
            $result = "";
            if(isset($_POST["submitp3b4"])){
                $math = $_POST["Math"];
                $phys = $_POST["Phys"];
                $chem = $_POST["Chem"];
                $std = $_POST["Standard"];
                if(is_numeric($math) && is_numeric($phys) && is_numeric($chem) && $math>=0 && $phys>=0 && $chem>=0){
                    $total = $math + $phys + $chem;
                    if(is_numeric($std)){
                        if($total >= $std && $math>0 && $phys>0 && $chem>0) $result="Đậu";
                        else $result = "Tạch";
                    }
                }
            }
        ?>
        <form class="d-flex justify-content-center m-5" action="#p3b4" method="POST" id="p3b4">
            <table class="table-condensed col-4" align="center">
                <tr bgcolor='purple'>
                    <th colspan="3" class="text-center">
                        <h2 style="color:white">KẾT QUẢ THI ĐẠI HỌC</h2>
                    </th>
                </tr>
                <tr bgcolor='pink'>
                    <td class="text-left" width="30%">Toán:</td>
                    <td><input width="50%" type="text" name="Math" value="<?php if(isset($_POST["Math"])) echo $math ?>"/></td>
                    <td>
                        <?php 
                            if(isset($math)){
                                if(!is_numeric($math) or $math < 0) echo "Điểm phải là số >= 0";
                            }
                        ?>
                    </td>
                </tr>
                <tr bgcolor='pink'>
                    <td class="text-left" width='30%'>Lý:</td>
                    <td><input type="text" name="Phys" width="50%" value="<?php if(isset($_POST["Phys"])) echo $phys ?>"/></td>
                    <td>
                        <?php 
                            if(isset($phys)){
                                if(!is_numeric($phys) or $phys < 0) echo "Điểm phải là số >= 0";
                            }
                        ?>
                    </td>
                </tr>
                <tr bgcolor='pink'>
                    <td class="text-left" width='30%'>Hóa:</td>
                    <td><input type="text" name="Chem" width="50%" value="<?php if(isset($_POST["Chem"])) echo $chem ?>"/></td>
                    <td>
                        <?php 
                            if(isset($chem)){
                                if(!is_numeric($chem) or $chem < 0) echo "Điểm phải là số >= 0";
                            }
                        ?>
                    </td>
                </tr>
                <tr bgcolor='pink'>
                    <td class="text-left" width='30%'>Điểm chuẩn:</td>
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
                    <td class="text-left" width='30%'>Tổng điểm:</td>
                    <td><input type="text" name="Total" disabled="1" value="<?php echo $total ?>"/></td>
                    <td></td>
                </tr>
                <tr bgcolor='pink'>
                    <td class="text-left" width='30%'>Kết quả:</td>
                    <td><input type="text" disabled="1" value="<?php echo $result ?>"/></td>
                    <td></td>
                </tr>
                <tr bgcolor='pink'>
                    <td colspan="3" align='center'><input class="btn btn-light" type="submit" name="submitp3b4" value="Xem kết quả"/></td>
                </tr>
            </table>
        </form>
        <?php include '../Website/includes/footer.html'; ?>
    </body>
</html>
