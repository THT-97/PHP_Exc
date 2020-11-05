<html>
    <?php $page_title='Edit user'; include ('includes/headtag.html')?>
    <body style="background-color: darkseagreen">
        <?php
            include ('includes/header.php');
            $id = $_GET['id'];
            if(!isset($cId)) header("Location:login.php");
            if($cRole!='mngr') header("Location:view_users.php"); //if user is not manager
            require 'conn.php';
            $query = "SELECT DISTINCT * FROM user, user_type WHERE userID='$id' AND type=typeID";
            $result = mysqli_query($conn, $query);
            $acc = mysqli_fetch_array($result);
            $adminpass = mysqli_fetch_array(mysqli_query($conn, "SELECT password FROM user WHERE userID='$cId'"))[0];
            $role = $acc['type'];
            $pic = $acc['pic'];
            $valid = true;
            $count = 0;
            if(isset($_POST['save'])){
                if($_POST['pass']!=$adminpass){
                    $pasw = 'Password không đúng';
                    $valid = false;
                }
                $usn = trim($_POST['usn']);
                $name = $_POST['name'];
                $gender = $_POST['gender'];
                $dob = $_POST['dob'];
                $mail = $_POST['mail'];
                $phone = $_POST['phone'];
                $role = $_POST['type'];
               
                $pic = $_FILES['pic']['name'];
                if($_FILES['pic']['name']!=NULL){
                    $t = substr($_FILES['pic']['type'],6);
                    $s = $_FILES['pic']['size']/1024;
                    if(($t!='png' && $t!='jpg' && $t!='jpeg' && $t!='gif')||$s>1024){
                        $picw = 'Chỉ chọn file có định dạng png/jpg/jpeg/gif và có kích thước tối đa 2MB';
                        $valid = false;
                    }
                    else{
                        $pic = $id.".$t";
                        $count++;
                    }
                } 
                
                if ($usn != '') {
                    $rn = mysqli_query($conn, "SELECT userName FROM user WHERE userName='$usn'");
                    if (mysqli_num_rows($rn) > 0 && $usn!=$acc['userName']){
                        $usnw = 'Username trùng';
                        $valid = false;
                    }
                    else if($usn!=$acc['userName']) $count++;
                }
                if($role!=$acc['type']) $count++;
                if($name!=$acc['name']) $count++;
                if($dob!=$acc['dob']) $count++;
                
                if ($mail != '') {
                    $rn = mysqli_query($conn, "SELECT userName FROM user WHERE email='$mail'");
                    if (mysqli_num_rows($rn) > 0 && $mail!=$acc['email']){
                        $mailw = 'Email trùng';
                        $valid = false;
                    }
                    else if($mail!=$acc['email']) $count++;
                }
                
                if ($phone != '') {
                    $rp = mysqli_query($conn, "SELECT userName FROM user WHERE phone='$phone'");
                    if (mysqli_num_rows($rp) > 0 && $phone!=$acc['phone']){
                        $cellw = 'Số điện thoại trùng';
                        $valid = false;
                    }
                    else if($phone!=$acc['phone']) $count++;
                }
                if($gender!=$acc['gender']) $count++;
                if($valid){
                    if($count>0){
                        $query = "UPDATE user SET ";
                        if($usn != $acc['userName']){
                            $query .= "userName='$usn'";
                            $count--;
                            if($count>0) $query .= ',';
                        }
                        if($role!=$acc['type']){
                            $query .= "type='$role'";
                            $count--;
                            if($count>0) $query .= ',';
                        }
                        
                        if($name!=$acc['name']){
                            $query .= "name='$name'";
                            $count--;
                            if($count>0) $query .= ',';
                        }
                        if($gender!=$acc['gender']){
                            $query .= "gender=$gender";
                            $count--;
                            if($count>0) $query .= ',';
                        }
                        if($dob!=$acc['dob']){
                            $query .= "dob='$dob'";
                            $count--;
                            if($count>0) $query .= ',';
                        }
                        if($mail!=$acc['email']){
                            $query .= "email='$mail'";
                            $count--;
                            if($count>0) $query .= ',';
                        }
                        if($phone!=$acc['phone']){
                            $query .= "phone='$phone'";
                            $count--;
                            if($count>0) $query .= ',';
                        }
                        if($pic!=''){
                            $query .= "pic='$pic'";
                            $count--;
                            if($count>0) $query .= ',';
                        }
                        $query .= " WHERE userID='$acc[userID]'";
                        $result = mysqli_query($conn, $query);
                        move_uploaded_file($_FILES['pic']['tmp_name'], "includes/img/".$pic);
                        if($result!=false){
                            header("Location:#");
                        }
                    }
                }
            }
        ?>
        <div style="margin-bottom: 5%">
            <h1 class="text-center text-warning">Edit profile</h1>
            <form action="" method="POST" enctype="multipart/form-data">
                <table style="margin-top: 1%; font-size: 120%; font-family: sans-serif" align="center" class="table-condensed table-info">
                    <tr bgcolor="green">
                       <th colspan="4"><h1 class="text-warning text-center" style="margin-left: 10%"><b>Thông tin tài khoản</b></h1></th>
                    </tr>
                    <tr><td rowspan="11"><img src="includes/img/<?php echo $acc['pic'] ?>" width="300px" height="400px" /></td></tr>
                    <tr>
                        <th>Username:</th>
                        <td><input class="form-control" type="text" minlength="4" name="usn" value="<?php echo $acc['userName'] ?>" required/></td>
                        <th class="text-danger"><?php if(isset($usnw)) echo $usnw ?></th>
                    </tr>
                    <tr>
                        <th>Bậc:</th>
                        <td>
                             <select class="form-control" name="type">
                                <?php
                                    if($cId=='u0000' && $id!='u0000'){
                                        $roles = mysqli_query($conn, "SELECT * FROM user_type");
                                        while($r = mysqli_fetch_array($roles)){
                                            echo "<option value='$r[typeID]' ";
                                            if($role ==$r['typeID']) echo "selected='1'";
                                            echo ">$r[role]</option>";
                                        }
                                    }
                                    else echo "<option>$acc[role]</option>";
                                ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th>Họ tên:</th>
                        <td><input class="form-control" type="text" minlength="5" name="name" value="<?php echo $acc['name'] ?>" required/></td>
                    </tr>
                    <tr>
                        <th>Giới tính:</th>
                        <td>
                            <input type="radio" name="gender" value="0" <?php if($acc['gender']==0) echo "checked='1'" ?>/>
                            Nam
                            <input type="radio" name="gender" value="1" <?php if($acc['gender']==1) echo "checked='1'" ?>/>Nữ
                        </td>
                    </tr>
                    <tr>
                        <th>Ngày sinh:</th>
                        <td><input class="form-control" type="date" name="dob" value="<?php echo $acc['dob'] ?>" required/></td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td><input class="form-control" type="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" minlength="3" name="mail" value="<?php echo $acc['email'] ?>" required/></td>
                        <th class="text-danger"><?php if(isset($mailw)) echo $mailw ?></th>
                    </tr>
                    <tr>
                        <th>SĐT</th>
                        <td><input class="form-control" type="tel" pattern="[0-9]+" minlength="10" maxlength="11" name="phone" value="<?php echo $acc['phone'] ?>" required/></td>
                        <th class="text-danger"><?php if(isset($cellw)) echo $cellw ?></th>
                    </tr>
                    <tr>
                        <th>Ảnh:</th>
                        <td><input type="file" name="pic" value="<?php echo $pic ?>"/></td>
                        <th class="text-danger"><?php if(isset($picw)) echo $picw ?></th>
                    </tr>
                    <tr>
                        <th>Admin password:</th>
                        <td><input class="form-control" type="password" minlength="6" name="pass" value="pass" required/></td>
                        <th class="text-danger"><?php if(isset($pasw)) echo $pasw ?></th>
                    </tr>
                    <tr>
                        <td>
                            <a class="btn btn-primary" href="view_users.php">Danh sách</a>
                            <input class="btn btn-warning" type="submit" name="save" value="Lưu thay đổi" />
                        </td>
                    </tr>
                </table>
            </form>
        </div>
        <?php
            include ('includes/footer.html');
            //redirect to index if user is not manager
            if(!isset($_SESSION['cRole']) || $_SESSION['cRole']!='mngr') header("Location:index.php");
        ?>
    </body>
</html>