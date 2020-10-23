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
    </head>
    <body>
        <?php
            function writeFile($arr){
                if(!file_exists('ttsv.txt')) touch('ttsv.txt');
                $f = fopen('ttsv.txt', 'a');
                if($arr[0]!=''){
                    fwrite($f, implode('--', $arr));
                    fwrite($f, PHP_EOL);
                }
                fclose($f);
            }
        
            function readFromFile(&$arr){
                $f = fopen('ttsv.txt', 'r') or exit('Not found');
                $i = 0;
                while(!feof($f)){
                    $arr[] = explode('--', fgets($f));
                    if($arr[$i][0]=='') unset ($arr[$i]);
                    else $i++;
                }
                fclose($f);
            }
            
            function checkArray($array, $id){
                $i = 0;
                while($i<count($array) && $array[$i][0]!=$id) $i++;
                if($i<count($array)) return true;
                return false;
            }
            
            $astr = '';
            if(isset($_POST['save'])) $astr = trim($_POST['save']);
            $ttsv = [];
            if($astr!='') $ttsv = explode("+", $astr);
            foreach ($ttsv as $key => $value) {
                $ttsv[$key] = explode(",", $value);
            }
    
            $isValid = true;
            if(isset($_POST['insert'])){
                if($_POST['mssv']==''){
                    echo 'Nhập Mã số sv<br/>';
                    $isValid = false;
                }
                else $mssv = $_POST['mssv'];
                if($_POST['hoten']==''){
                    echo 'Nhập họ tên<br/>';
                    $isValid = false;
                }
                else $hoten = $_POST['hoten'];
                if($_POST['lop']==''){
                    echo 'Nhập lớp<br/>';
                    $isValid = false;
                }
                else $lop = $_POST['lop'];
                if($_POST['ns']==''){
                    echo 'Nhập ngày sinh<br/>';
                    $isValid = false;
                }
                else $ns = substr($_POST['ns'],8,2)."/".substr($_POST['ns'],5,2)."/".substr($_POST['ns'],0,4);
                if($_POST['dc']==''){
                    echo 'Nhập địa chỉ<br/>';
                    $isValid = false;
                }
                else $dc = $_POST['dc'];
                if($_POST['dt']=='' || !is_numeric($_POST['dt'])){
                    echo 'Nhập sđt hợp lệ<br/>';
                    $isValid = false;
                }
                else $dt = $_POST['dt'];
                if($_POST['gt']==0) $gt = 'Nam';
                else $gt = 'Nữ';
                if($isValid){
                    $sv = [$mssv, $hoten, $lop, $ns, $gt, $dc, $dt];
                    if(!checkArray($ttsv, $mssv)){
                        $ttsv[] = $sv;
                        $str = implode(",", $sv);
                        $astr .= $str."+";
                    }
                    else echo 'Mã số trùng<br/>';
                }
            }
            if(isset($_POST['msv']) && count($ttsv)>0){
                $mssv = $_POST['msv'];
                $i = 0;
                while ($i< count($ttsv) && $mssv!=$ttsv[$i][0]) $i++;
                $hoten = $ttsv[$i][1];
                $lop = $ttsv[$i][2];
                $ns = $ttsv[$i][3];
                $gt = $ttsv[$i][4];
                $dc = $ttsv[$i][5];
            }
        ?>
        <form action="" method="POST">
            <h2>NHẬP THÔNG TIN SINH VIÊN</h2>
            <fieldset>
                <legend>Thông tin sinh viên:</legend>
                <table>
                    <tr>
                        <td>Mã số sv:</td>
                        <td><input name='mssv' type="text" value="<?php if(isset($_POST['mssv'])) echo $_POST['mssv'] ?>" /></td>
                        <td>Họ tên:</td>
                        <td><input name='hoten' type="text" value="<?php if(isset($_POST['hoten'])) echo $_POST['hoten'] ?>" /></td>
                        <td rowspan="4">
                            <textarea cols="50" rows="5" name='save'>
                                <?php if(isset($_POST['save'])) echo $astr ?>
                            </textarea>
                        </td>
                    </tr>
                    <tr>
                        <td>Lớp:</td>
                        <td><input name='lop' type="text" value="<?php if(isset($_POST['lop'])) echo $_POST['lop'] ?>" /></td>
                        <td>Giới tính:</td>
                        <td>
                            <input name='gt' type="radio" value="0" <?php if(isset($_POST['gt']) && $_POST['gt']=='0') echo 'checked=checked' ?> checked/>Nam
                            <input name='gt' type="radio" value="1" <?php if(isset($_POST['gt']) && $_POST['gt']=='1') echo 'checked=checked'?> />Nữ
                        </td>
                    </tr>
                    <tr>
                        <td>Ngày sinh:</td>
                        <td><input name='ns' type="date" value="<?php if(isset($_POST['ns'])) echo $_POST['ns'] ?>" /></td>
                        <td>Địa chỉ:</td>
                        <td><input name='dc' type="text" value="<?php if(isset($_POST['dc'])) echo $_POST['dc'] ?>" /></td>
                    </tr>
                    <tr>
                        <td colspan="2">Điện thoại:</td>
                        <td colspan="2"><input name='dt' type="tel" value="<?php if(isset($_POST['dt'])) echo $_POST['dt'] ?>" /></td>
                    </tr>
                    <tr>
                        <td colspan="4"><input name='insert' type="submit" value="Thêm sinh viên" /></td>
                    </tr>
                </table>
            </fieldset>
            <h2>HIỂN THỊ THÔNG TIN SINH VIÊN</h2>
            <fieldset>
                <legend>Thông tin sinh viên:</legend>
                <table>
                    <tr>
                        <td>Mã số sv:</td>
                        <td>
                            <select name="msv">
                                <?php
                                    foreach ($ttsv as $key => $value) {
                                        if(trim($value[0])!=''){
                                            echo "<option value='$value[0]' ";
                                            if(isset($_POST['msv']) && $_POST['msv']==$value[0]) echo "selected='1'";
                                            echo '>';
                                            echo $value[0];
                                            echo '</option>';
                                        }
                                    }
                                ?>
                            </select>
                        </td>
                        <td>Họ tên:</td>
                        <td><input type="text" disabled="1" value="<?php if(isset($_POST['msv'])) echo $hoten ?>" /></td>
                    </tr>
                    <tr>
                        <td>Giới tính:</td>
                        <td><input type="text" disabled="1" value="<?php if(isset($_POST['msv'])) echo $gt ?>" /></td>
                        <td>Lớp:</td>
                        <td><input type="text" disabled="1" value="<?php if(isset($_POST['msv'])) echo $lop ?>" /></td>                     
                    </tr>
                    <tr>
                        <td>Ngày sinh:</td>
                        <td><input type="text" disabled="1" value="<?php if(isset($_POST['msv'])) echo $ns ?>" /></td>
                        <td>Địa chỉ:</td>
                        <td><input type="text" disabled="1" value="<?php if(isset($_POST['msv'])) echo $dc ?>" /></td>
                    </tr>
                    <tr>
                        <td colspan="4"><input name='select' type="submit" value="Xem thông tin" /></td>
                    </tr>
                </table>
            </fieldset>
        </form>
    </body>
</html>
