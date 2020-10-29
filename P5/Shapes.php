<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">

<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Tinh chu vi va dien tich</title>
<style>
fieldset {
  background-color: #eeeeee;
}
legend {
  background-color: gray;
  color: white;
  padding: 5px 10px;
}
</style>
</head>

<body>
<?php 
$str=NULL;
if(isset($_POST['tinh'])){
    abstract class Hinh{
	protected $ten, $dodai;
	public function setTen($ten){
		$this->ten=$ten;
	}
	public function getTen(){
		return $this->ten;
	}
	public function setDodai($doDai){
		$this->dodai=$doDai;
	}
	public function getDodai(){
		return $this->dodai;
	}
	abstract public function tinh_CV();
	abstract public function tinh_DT();
    }

    class HinhTron extends Hinh{
            const PI=3.14;
            function tinh_CV(){
                    return $this->dodai*2*self::PI;
            }
            function tinh_DT(){
                    return pow($this->dodai,2)*self::PI;
            }
    }

    class HinhVuong extends Hinh{
            public function tinh_CV(){
                    return $this->dodai*4;
            }
            public function tinh_DT(){
                    return pow($this->dodai,2);
            }
    }

    class HinhTamGiacDeu extends Hinh{
            public function tinh_CV(){
                    return $this->dodai*3;
            }
            public function tinh_DT(){
                    return round(sqrt(3)*pow($this->dodai,2)/4, 2);
            }
    }
	if(isset($_POST['hinh']) && ($_POST["dodai"]>0)){
            if(($_POST['hinh'])=="hv"){
                $hv=new HinhVuong();
		$hv->setTen($_POST['ten']);
		$hv->setDodai($_POST['dodai']);
		$str= "Diện tích hình vuông ".$hv->getTen()." là : ".$hv->tinh_DT()." \n".
				"Chu vi của hình vuông ".$hv->getTen()." là : ".$hv->tinh_CV();
            }
            if(($_POST['hinh'])=="ht"){
                $ht=new HinhTron();
		$ht->setTen($_POST['ten']);
		$ht->setDodai($_POST['dodai']);
		$str= "Diện tích của hình tròn ".$ht->getTen()." là : ".$ht->tinh_DT()." \n".
				"Chu vi của hình tròn ".$ht->getTen()." là : ".$ht->tinh_CV();
            }
            if(($_POST['hinh'])=="htg"){
                $htg=new HinhTamGiacDeu();
		$htg->setTen($_POST['ten']);
		$htg->setDodai($_POST['dodai']);
		$str= "Diện tích của hình tam giác đều ".$htg->getTen()." là : ".$htg->tinh_DT()." \n".
				"Chu vi của hình tam giác đều ".$htg->getTen()." là : ".$htg->tinh_CV();
            }
	}
        else $str = "Nhập số dương";
}
?>
    <form action="#shapes" method="post" id="shapes">
        <fieldset class="col-6">
            <legend class="col-9">Tính chu vi và diện tích các hình học đơn giản</legend>
            <table border='0'>
                <tr>
                    <td>Chọn hình</td>
                    <td>
                        <input type="radio" name="hinh" value="hv" <?php if(isset($_POST['hinh'])&&($_POST['hinh'])=="hv") echo 'checked="checked"'?>/>Hình vuông
                        <input type="radio" name="hinh" value="ht"<?php if(isset($_POST['hinh'])&&($_POST['hinh'])=="ht") echo 'checked="checked"'?>/>Hình tròn
                        <input type="radio" name="hinh" value="htg"<?php if(isset($_POST['hinh'])&&($_POST['hinh'])=="htg") echo 'checked="checked"'?>/>Hình tam giác đều
                    </td>
                </tr>
                <tr><td>Nhập tên:</td><td><input type="text"  name="ten" value="<?php if(isset($_POST['ten'])) echo $_POST['ten'];?>"/></td></tr>
                <tr><td>Nhập độ dài:</td><td><input type="number" name="dodai" value="<?php if(isset($_POST['dodai'])) echo $_POST['dodai'];?>"/></td></tr>
                <tr>
                    <td>Kết quả:</td>
                    <td><textarea name="ketqua" cols="70" rows="4" disabled="disabled"><?php echo $str;?></textarea></td></tr>
                   <tr><td colspan="2" align="center"><input type="submit" name="tinh" value="TÍNH"/></td></tr>
            </table>
        </fieldset>
    </form>
</body>
</html>