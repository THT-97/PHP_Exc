<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <?php $page_title="About"; include ('includes/headtag.html')?>
    <body style="background-color: darkseagreen">
        <?php
            include ('includes/header.php');
            if(!isset($cUser)){
                header("Location:login.php");
                exit();
            }
            if ($cRole != 'mngr') {
                header("Location:view_users.php");
                exit();
            }
            require './conn.php';
            $id = $_GET['id'];
            $query = "SELECT * FROM user WHERE userID='$id'";
            $result = mysqli_query($conn, $query);
            $acc = mysqli_fetch_array($result);
            if(isset($_POST['delete'])){
                $result = mysqli_query($conn, "DELETE FROM user WHERE userID='$id'");
                if($result!=false){
                    header("Location:view_users.php");
                    exit();
                }
            }
        ?>
        <h1 class="text-danger text-center">XÁC NHẬN XÓA</h1>
        <form action="" method="POST">
            <table style="margin-top: 1%; font-size: 200%; font-family: sans-serif" align="center" class="table-condensed table-info">
                <tr bgcolor="green">
                    <th colspan="2"><h1 class="text-warning text-center" style="margin-left: 10%"><b>THÔNG TIN TÀI KHOẢN</b></h1></th>
                </tr>
                <tr>
                    <td><img alt="authorPic" src="includes/img/<?php echo $acc['pic'] ?>" width="300px" height="400px" /></td>
                    <td>
                        <b>
                           <p>Họ tên: <?php echo $acc['name'] ?></p>
                           <p>Giới tính: <?php echo ($acc['gender']==0)?'Nam':'Nữ'; ?></p>
                           <p>Ngày sinh: <?php echo date_format(date_create($acc['dob']),'d/m/Y')  ?></p>
                           <p>Email: <?php echo $acc['email'] ?></p>
                           <p>SĐT: <?php echo $acc['phone'] ?></p>   
                        </b>  
                    </td>
                </tr>
                <tr>
                    <td>
                        <a class="btn btn-primary" href="view_users.php">Quay lại</a>
                        <input class="btn btn-danger" type="submit" name="delete" value="Xóa" />
                    </td>
                </tr>
            </table>
        </form>
        <?php include ('includes/footer.html')?>
    </body>
</html>
