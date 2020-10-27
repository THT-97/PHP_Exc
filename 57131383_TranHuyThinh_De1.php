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
        <link rel="stylesheet" href='bootstrap.min.css' />
    </head>
    <body>
        <?php
        //classes
            class Nguoi{
                private $maso, $hoten, $gioitinh, $diachi;
                function __construct() {}
                function getMaso() {
                    return $this->maso;
                }

                function getHoten() {
                    return $this->hoten;
                }

                function getGioitinh() {
                    return $this->gioitinh;
                }

                function getDiachi() {
                    return $this->diachi;
                }

                function setMaso($maso) {
                    $this->maso = $maso;
                }

                function setHoten($hoten) {
                    $this->hoten = $hoten;
                }

                function setGioitinh($gioitinh) {
                    $this->gioitinh = $gioitinh;
                }

                function setDiachi($diachi) {
                    $this->diachi = $diachi;
                }
            }
            
            class GiangVien extends Nguoi{
                private $hocvi, $sonamct;
                protected const luongcb = 1350000;

                function __construct(){}
                function getHocvi() {
                    return $this->hocvi;
                }

                function getSonamct() {
                    return $this->sonamct;
                }

                function setHocvi($hocvi) {
                    $this->hocvi = $hocvi;
                }

                function setSonamct($sonamct) {
                    if(!is_numeric($sonamct)) $this->sonamct=0;
                    $this->sonamct = $sonamct;
                }
                
                function tinhLuong(){
                    if($this->hocvi == 'Cử nhân') return self::luongcb*2.67;
                    if($this->hocvi == 'Thạc sĩ') return self::luongcb*3.66;
                    if($this->hocvi == 'Tiến sĩ') return self::luongcb*4.3;
                }
            }
            
            class SinhVien extends Nguoi{
                private $lop, $nganh;
                protected const thuongcb = 100000;
                function __construct() {}
                
                function getLop() {
                    return $this->lop;
                }

                function getNganh() {
                    return $this->nganh;
                }

                function setLop($lop) {
                    $this->lop = $lop;
                }

                function setNganh($nganh) {
                    $this->nganh = $nganh;
                }
                
                function tinhThuong(){
                    if($this->nganh == 'CNTT') return self::thuongcb;
                    if($this->nganh == 'Xây dựng') return self::thuongcb*1.5;
                    return self::thuongcb*1.25;
                }
            }
            
            class NhanVienVP extends Nguoi{
                private $pb;
                function __construct() {}
                function getPb() {
                    return $this->pb;
                }

                function setPb($pb) {
                    $this->pb = $pb;
                }
                
                function tinhDiem(){
                    if($this->pb == 'Hành chính') return 1;
                    return 2;
                }
            }
        ?>
        
        <?php
        //save to file
            function writeFile(Nguoi $obj, $type){
                if(!file_exists('ttcb.txt')) touch('ttcb.txt');
                $f = fopen('ttcb.txt', 'a');
                fwrite($f,$type.',');
                fwrite($f, $obj->getMaso().",");
                fwrite($f, $obj->getHoten().",");
                fwrite($f, $obj->getGioitinh().",");
                fwrite($f, $obj->getDiachi().",");
                if($type==0){
                    fwrite($f, $obj->getHocvi().",");
                    fwrite($f, $obj->getSonamct());
                }
                if($type==1){
                    fwrite($f, $obj->getLop().",");
                    fwrite($f, $obj->getNganh());
                }
                if($type==2){
                    fwrite($f, $obj->getPb());
                }
                fwrite($f, PHP_EOL);
                fclose($f);
            }
        //submit
            if(isset($_POST['submit'])){
                $cb = new Nguoi(); //Tao nguoi           
                //Tao can bo
                $t = $_POST['type'];               
                if($t==0) {
                    $cb = new GiangVien ();
                    $cb->setHocvi($_POST['diploma']);
                    $cb->setSonamct($_POST['exp']);
                    echo "Lương: ".$cb->tinhLuong();
                }
                else if($t==1){
                    $cb = new SinhVien ();
                    if($_POST['cls']!='') $cb->setLop ($_POST['cls']);
                    else 'Nhập lớp';
                    $cb->setNganh($_POST['subject']);
                    
                    echo "Thưởng: ".$cb->tinhThuong();
                }
                else if($t==2){
                    $cb = new NhanVienVP ();
                    $cb->setPb($_POST['dep']);
                    
                    echo "Điểm: ".$cb->tinhDiem();
                }
                if($_POST['id']!='') $cb->setMaso ($_POST['id']);
                else echo 'Nhập mã số';
                if($_POST['name']!='') $cb->setHoten ($_POST['name']);
                else echo 'Nhập tên';
                $cb->setGioitinh ($_POST['gender']);
                if($_POST['add']!='') $cb->setDiachi ($_POST['add']);
                else echo 'Nhập địa chỉ';
//                var_dump($cb);
                writeFile($cb, $t);
            }
        ?>
        
        <form action="" method="POST">
            <h1 class="text-center text-primary text-uppercase">quản lý cán bộ</h1>
            <table align="center" class="table-condensed bg-success">
                <tr>
                    <td>Mã số:</td>
                    <td><input class="form-control" name="id" size="50%" type="text" value="<?php if(isset($_POST['id'])) echo $cb->getMaso() ?>"/></td>
                    <td class="text-right">Họ và tên:</td>
                    <td><input class="form-control" name="name" size="50%" type="text" value="<?php if(isset($_POST['name'])) echo $cb->getHoten() ?>"/></td>
                </tr>
                <tr>
                    <td>Giới tính:</td>
                    <td>
                        <input name="gender" type="radio" value="Nam" <?php if(isset($_POST["gender"]) && $_POST["gender"]=="Nam") echo "checked=checked"?> checked/>
                        Nam &nbsp;
                        <input name="gender" type="radio" value="Nữ" <?php if(isset($_POST["gender"]) && $_POST["gender"]=="Nữ") echo "checked=checked"?>/>
                        Nữ
                    </td>
                    <td class="text-right">Địa chỉ:</td>
                    <td><input class="form-control" style="width: 80%" name="add" type="text" value="<?php if(isset($_POST['add'])) echo $cb->getDiachi() ?>"/></td>
                </tr>
                <tr>
                    <td>Loại cán bộ:</td>
                    <td>
                        <input name="type" type="radio" value="0" <?php if(isset($_POST["type"]) && $t==0) echo "checked=checked"?> checked/>
                        Giảng viên &nbsp;
                        <input name="type" type="radio" value="1" <?php if(isset($_POST["type"]) && $t==1) echo "checked=checked"?>/>
                        Sinh viên &nbsp;
                        <input name="type" type="radio" value="2" <?php if(isset($_POST["type"]) && $t==2) echo "checked=checked"?>/>
                        Nhân viên văn phòng
                    </td>
                    <td class="text-right">Số năm công tác</td>
                    <td><input class="form-control" name="exp" type="number" min="0" value="<?php if(isset($_POST['exp']) && $t==0) echo $cb->getSonamct() ?>"/></td>
                </tr>
                <tr>
                    <td class="text-right">Học vị:</td>
                    <td>
                        <select class="form-control" name="diploma">
                            <option value="Cử nhân" <?php if(isset($_POST['diploma']) && $_POST['diploma']=="Cử nhân") echo "selected='1'" ?>>
                                Cử nhân
                            </option>
                            <option value="Thạc sĩ" <?php if(isset($_POST['diploma']) && $_POST['diploma']=="Thạc sĩ") echo "selected='1'" ?>>
                                Thạc sĩ
                            </option>
                            <option value="Tiến sĩ" <?php if(isset($_POST['diploma']) && $_POST['diploma']=="Tiến sĩ") echo "selected='1'" ?>>
                                Tiến sĩ
                            </option>
                        </select>
                    </td>
                    <td class="text-right">Ngành:</td>
                    <td>
                        <select class="form-control" name="subject">
                            <option value="CNTT" <?php if(isset($_POST['subject']) && $_POST['subject']=="CNTT") echo "selected='1'" ?>>
                                CNTT
                            </option>
                            <option value="Xây dựng" <?php if(isset($_POST['subject']) && $_POST['subject']=="Xây dựng") echo "selected='1'" ?>>
                                Xây dựng
                            </option>
                            <option value="CNTP" <?php if(isset($_POST['subject']) && $_POST['subject']=="CNTP") echo "selected='1'" ?>>
                                CNTP
                            </option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td class="text-right">Phòng ban:</td>
                    <td>
                        <select class="form-control" name="dep">
                            <option value="Hành chính" <?php if(isset($_POST['dep']) && $_POST['dep']=="Hành chính") echo "selected='1'" ?>>
                                Hành chính
                            </option>
                            <option value="Kế toán" <?php if(isset($_POST['dep']) && $_POST['dep']=="Kế toán") echo "selected='1'" ?>>
                                Kế toán
                            </option>
                            <option value="Kế hoạch" <?php if(isset($_POST['dep']) && $_POST['dep']=="Kế hoạch") echo "selected='1'" ?>>
                                Kế hoạch
                            </option>
                        </select>
                    </td>
                    <td class="text-right">Lớp:</td>
                    <td><input class="form-control" name="cls" type="text" value="<?php if(isset($_POST['cls']) && $t==1) echo $cb->getLop() ?>"/></td>
                </tr>
                <tr><td class="text-center" colspan="4"><input class="btn btn-info" name="submit" type="submit" value="Lưu cán bộ"/></td></tr>
            </table>
        </form>
    </body>
</html>
