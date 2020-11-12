<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <?php $page_title="User"; include ('includes/headtag.html')?>
    <body style="background-color: darkseagreen">
        <?php
            include ('includes/header.php');
            require './conn.php';
            $id = $_GET['id'];
            $query = "SELECT DISTINCT * FROM user, user_type WHERE userID='$id' AND type=typeID";
            $result = mysqli_query($conn, $query);
            $acc = mysqli_fetch_array($result);
        ?>
        
        <table style="margin-top: 1%; font-size: 200%; font-family: sans-serif" align="center" class="table-condensed table-info">
            <tr bgcolor="green">
                <th colspan="3"><h1 class="text-warning text-center" style="margin-left: 10%"><b>THÀNH VIÊN</b></h1></th>
            </tr>
            <tr><td rowspan="8"><img alt="userPic" src="includes/img/<?php echo $acc['pic'] ?>" width="300px" height="450px" /></td></tr>
            <tr><td>Username: <?php echo $acc['userName'] ?><td>
            <tr><td>Bậc: <?php echo $acc['role'] ?></td></tr>
            <tr><td>Họ tên: <?php echo $acc['name'] ?></td></tr>
            <tr><td>Giới tính: <?php echo ($acc['gender']==0)?'Nam':'Nữ'; ?></td></tr>
            <tr><td>Ngày sinh: <?php echo date_format(date_create($acc['dob']),'d/m/Y')  ?></td></tr>
            <tr><td>Email: <?php echo $acc['email'] ?></td></tr>
            <tr><td>SĐT: <?php echo $acc['phone'] ?></td></tr>
            <tr>
                <td><a class="btn btn-primary" href="view_users.php">Quay lại</a></td>
                <td>
                    <?php
                    if(($cRole=='mngr' && $acc['type']!='mngr') || $cId=='u0000' || $cId==$id) {
                        echo "<a class='btn btn-warning' href='";
                        if($cId!=$id) echo "edit_user.php?id=$id";
                        else echo "password.php";
                        echo "'>Sửa</a>";
                    }
                    if($cRole=='mngr' && $acc['type']!='mngr' || $cId=='u0000') echo "<a class='btn btn-danger' href='delete_user.php?id=$id'>Xóa</a>";
                    ?>   
                </td>
            </tr>
        </table>
        <?php include ('includes/footer.html')?>
    </body>
</html>
