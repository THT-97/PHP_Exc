<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <?php
        $page_title="Login";
        include ('includes/headtag.html');
    ?>
    <body style="background-color: darkseagreen">
        <?php
            include ('includes/header.php');
            require 'conn.php';
            $warning = '';
            $user = '';
            $pass = '';
            if(isset($_POST['submit'])){
                $user = $_POST['user'];
                $pass = $_POST['pass'];
                $query = "SELECT userID, userName, password, name, type FROM user WHERE userName='$user' AND password='$pass'";
                $result = mysqli_query($conn, $query);
                if(mysqli_num_rows($result)==1){
                    $acc = mysqli_fetch_array($result);
                    $_SESSION['cID'] = $acc['userID'];
                    $_SESSION['cUser'] = $acc['userName'];
                    $_SESSION['cRole'] = $acc['type'];
                    $_SESSION['sessionStart'] = time();
                    mysqli_close($conn);
                    header('Location:index.php');
                    exit();
                }
                else $warning = 'Username hoặc Password không đúng';
            }
        ?>
        <form action="" method="POST">
            <table align='center' class="table-condensed table-info mt-5">
                <tr><th colspan="3"><h1 class="text-center text-uppercase text-primary">Đăng nhập</h1></th></tr>
                <tr>
                    <th>Username</th>
                    <td><input class="form-control" type="text" name="user" onfocus="this.value=''" value="username" required/></td>
                </tr>
                <tr>
                    <th>Password</th>
                    <td><input class="form-control" type="password" name="pass" value="<?php if(isset($_POST['pass'])) echo $pass ?>" required/></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input class="btn btn-primary" name="submit" type="submit" value="Đăng nhập"/>
                        <a class="btn btn-warning" href="javascript:window.history.back(-1);">Quay lại</a>
                    </td>
                </tr>
            </table>
            <p class="text-center text-danger"><?php echo $warning ?></p>
        </form>
        <?php include ('includes/footer.html')?>
    </body>
</html>
