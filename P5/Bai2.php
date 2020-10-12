<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Phân số</title>
    </head>
    <body>
        <?php
            class PhanSo{
                private $t, $m;

                private function UCLN()
                {
                    $x = $this->t;
                    $y = $this->m;
                    
                    if($x%$y==0) return $y;
                    if($y%$x==0) return $x;
                    while($x%$y>0 || $y%$x>0){
                        if($x>$y) $x = $x%$y;
                        else $y = $y%$x;
                        if($x%$y==0) return $y;
                        if($y%$x==0) return $x;
                    }
                }

                public function getT(){
                    return $this->t;
                }
                public function getM(){
                    return $this->m;
                }
                public function setT($t) {
                    if($t=="") $t = 0;
                    $this->t = $t;
                }
                public function setM($m) {
                    if($m=="") $m = 1;
                    $this->m = $m;
                }
                public function toString(){
                    return $this->t.'/'.$this->m;
                }
                
                public function rutGon(){
                    $d = $this->UCLN($this->t, $this->m);
                    $this->t /= $d;
                    $this->m /= $d;
                }

                function operate(PhanSo $p, $op){
                    $r = new PhanSo();
                    switch ($op){
                        case 1:{
                            $r->setT(($this->t*$p->getM())+($this->m*$p->getT()));
                            $r->setM($this->m*$p->getM());
                            break;
                        }
                        case 2:{
                            $r->setT(($this->t*$p->getM())-($this->m*$p->getT()));
                            $r->setM($this->m*$p->getM());
                            break;
                        }
                        case 3:{
                            $r->setT(($this->t*$p->getT()));
                            $r->setM($this->m*$p->getM());
                            break;
                        }
                        case 4:{
                            $r->setT(($this->t*$p->getM()));
                            $r->setM($this->m*$p->getT());
                            break;
                        }
                    }
                    return $r;
                }
            };
            
            $result = "";
            if(isset($_POST['submit'])){
                $a = new PhanSo();
                $a->setT($_POST['t1']);
                $a->setM($_POST['m1']);
                $b = new PhanSo();
                $b->setT($_POST['t2']);
                $b->setM($_POST['m2']);
                $op = $_POST['operator'];
                
                if($op==4 && $b->getT()==0){
                    $result = "Không thể chia";
                }
                else{
                    $c = new PhanSo();
                    $c = $a->operate($b, $op);
                    if($c->getT()!=0) $c->rutGon();
                    $result = $a->toString();
                    switch ($op){
                     case 1: $result.=" + "; break;
                     case 2: $result.=" - "; break;
                     case 3: $result.=" * "; break;
                     case 4: $result.=" / "; break;
                 }
                 $result .= $b->toString();
                 $result .= ' = '.$c->toString();
                }
            }
        ?>
        <h1 style="color: purple" class="text-uppercase">Chọn phép tính trên phân số</h1>
        <form action="" method="POST">
            <table>
                <tr>
                    <th>Nhập phân số 1:</th>
                    <td>Tử số:<input class="form-control" name="t1" type="number" min="0" value="<?php if(isset($_POST['t1'])) echo $a->getT() ?>"/></td>
                    <td>Mẫu số:<input class="form-control" name="m1" type="number" min="1" value="<?php if(isset($_POST['m1'])) echo $a->getM() ?>"/></td>
                </tr>
                <tr>
                    <th>Nhập phân số 2:</th>
                    <td>Tử số:<input class="form-control" name="t2" type="number" min="0" value="<?php if(isset($_POST['t2'])) echo $b->getT() ?>"/></td>
                    <td>Mẫu số:<input class="form-control" name="m2" type="number" min="1" value="<?php if(isset($_POST['m2'])) echo $b->getM() ?>"/></td>
                </tr>
            </table>
            <fieldset>
                <legend>Chọn phép tính:</legend>
                <p>
                    <input name="operator" type="radio" value="1" <?php if(isset($_POST["operator"]) && $op==1) echo "checked=checked"?> checked/>
                    Cộng
                    <input name="operator" type="radio" value="2" <?php if(isset($_POST["operator"]) && $op==2) echo "checked=checked"?>/>
                    Trừ
                    <input name="operator" type="radio" value="3" <?php if(isset($_POST["operator"]) && $op==3) echo "checked=checked"?>/>
                    Nhân
                    <input name="operator" type="radio" value="4" <?php if(isset($_POST["operator"]) && $op==4) echo "checked=checked"?>/>
                    Chia
                </p> 
            </fieldset>
            <input name="submit" type="submit" value="Kết quả"/>
            <p>
                <?php echo $result ?>
            </p>
        </form>
    </body>
</html>
