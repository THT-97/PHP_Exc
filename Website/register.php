<html>
    <?php $page_title='Register'; include ('includes/headtag.html')?>
    <body style="background-color: darkseagreen">
        <?php
            include ('includes/header.php');
            require 'conn.php';
            $valid = true;
            
            function generateID(){
                global $conn;
                $r = mysqli_query($conn, "SELECT MAX(userID) FROM user ");
                $id = implode(mysqli_fetch_row($r));
                $num = (int)substr($id,1);
                $num += 1;
                $newid = 'u';
                if($num<10) $newid .= "000".$num;
                else if($num<100) $newid .= "00".$num;
                else if($num<1000) $newid .= "0".$num;
                else $newid .= $num;
                return $newid;
            }

            if(isset($_POST['register'])){
                $usn = trim($_POST['usn']);
                $pass = $_POST['pass'];
                $name = $_POST['name'];
                $gender = $_POST['gender'];
                $dob = $_POST['dob'];
                $mail = $_POST['mail'];
                $phone = $_POST['phone'];
                $pic = $_FILES['pic']['name'];
                if($_FILES['pic']['name']!=NULL){
                    $t = substr($_FILES['pic']['type'],6);
                    $s = $_FILES['pic']['size']/1024;
                    if(($t!='png' && $t!='jpg' && $t!='jpeg' && $t!='gif')||$s>1024){
                        $picw = 'Chỉ chọn file có định dạng png/jpg/jpeg/gif và có kích thước tối đa 2MB';
                        $valid = false;
                    }
                }
                else $pic = 'defaultpic.png';
                
                if ($usn != '') {
                    $rn = mysqli_query($conn, "SELECT userName FROM user WHERE userName='$usn'");
                    if (mysqli_num_rows($rn) > 0){
                        $usnw = 'Username trùng';
                        $valid = false;
                    }
                }
                
                if ($mail != '') {
                    $rn = mysqli_query($conn, "SELECT userName FROM user WHERE email='$mail'");
                    if (mysqli_num_rows($rn) > 0){
                        $mailw = 'Email trùng';
                        $valid = false;
                    }
                }
                
                if ($phone != '') {
                    $rn = mysqli_query($conn, "SELECT userName FROM user WHERE phone='$phone'");
                    if (mysqli_num_rows($rn) > 0){
                        $cellw = 'Số điện thoại trùng';
                        $valid = false;
                    }
                }
                if($valid){
                    $id = generateID();
                    if($pic!='defaultpic.png') $pic = $id.".$t";
                    $query = "INSERT INTO user(userID,userName,password,name,dob,gender,email,phone,pic,type) VALUES ("
                            . "'$id','$usn','$pass','$name','$dob',$gender,'$mail','$phone','$pic','usr')";
                    $result = mysqli_query($conn, $query);
                    move_uploaded_file($_FILES['pic']['tmp_name'], "includes/img/".$pic);
//                    mail($mail,"Register successful", "Hello $usn, your account has been registered", "From: tranhuythinh97@gmail.com");
                    if($result!=false) header("Location:reginfo.php?userName=$usn");
                }
            }
        ?>
        <form action="" method="POST" enctype="multipart/form-data">
            <table align="center" class="table-condensed table-light mt-5">
                <tr><th colspan="3"><h1 class="text-uppercase text-center text-success">Đăng ký</h1></th></tr>
                <tr>
                    <td>Username:</td>
                    <td><input class="form-control" type="text" minlength="4" name="usn" onfocus="this.value=''" value="username" required/></td>
                    <th class="text-danger"><?php if(isset($usnw)) echo $usnw ?></th>
                </tr>
                <tr>
                    <td>Password:</td>
                    <td><input class="form-control" type="password" minlength="6" name="pass" value="<?php if(isset($_POST['pass'])) echo $pass ?>" required/></td>
                    <th class="text-danger"><?php if(isset($pasw)) echo $pasw ?></th>
                </tr>
                <tr>
                    <td>Họ tên:</td>
                    <td><input class="form-control" type="text" minlength="5" name="name" value="<?php if(isset($_POST['name'])) echo $name ?>" required/></td>
                    <th class="text-danger"><?php if(isset($namew)) echo $namew ?></th>
                </tr>
                <tr>
                    <td>Giới tính:</td>
                    <td>
                        <input type="radio" name="gender" value="0" <?php if(isset($gender) && $gender==0) echo "checked='1'" ?> checked/>
                        Nam
                        <input type="radio" name="gender" value="1" <?php if(isset($gender) && $gender==1) echo "checked='1'" ?>/>Nữ
                    </td>
                </tr>
                <tr>
                    <td>Ngày sinh:</td>
                    <td><input class="form-control" type="date" name="dob" value="<?php if(isset($_POST['dob'])) echo $dob ?>" required/></td>
                    <th class="text-danger"><?php if(isset($dobw)) echo $dobw ?></th>
                </tr>
                <tr>
                    <td>Email:</td>
                    <td><input class="form-control" type="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" name="mail" minlength="3" value="<?php if(isset($_POST['mail'])) echo $mail ?>" required/></td>
                    <th class="text-danger"><?php if(isset($mailw)) echo $mailw ?></th>
                </tr>
                <tr>
                    <td>Số điện thoại:</td>
                    <td><input class="form-control" type="tel" pattern="[0-9]+" minlength="10" maxlength="11" name="phone" value="<?php if(isset($_POST['phone'])) echo $phone ?>" required/></td>
                    <th class="text-danger"><?php if(isset($cellw)) echo $cellw ?></th>
                </tr>
                <tr>
                    <td>Ảnh:</td>
                    <td><input type="file" name="pic" value="<?php echo $pic ?>"/></td>
                    <th class="text-danger"><?php if(isset($picw)) echo $picw ?></th>
                </tr>
                <tr>
                    <td colspan="2">
                        <input class="btn btn-primary" type="submit" name="register" value="Đăng ký"/>
                        <a class="btn btn-warning" href="javascript:window.history.back(-1);">Quay lại</a>
                    </td>
                </tr>
            </table>
        </form>
        <?php include ('includes/footer.html')?>
    </body>
</html>
