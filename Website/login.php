<?php
    session_set_cookie_params(3600,"/");
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <?php $page_title="Login"; include ('includes/headtag.html')?>
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
                $query = "SELECT userName, password, name, type FROM user WHERE userName='$user' AND password='$pass'";
                $result = mysqli_query($conn, $query);
                if(mysqli_num_rows($result)>0){
                    $acc = mysqli_fetch_array($result);
                    $_SESSION['cUser'] = $acc['name'];
                    $_SESSION['cRole'] = $acc['type'];
                    header("Location:index.php");
                }
                else $warning = 'Incorrect username or password';
            }
        ?>
        <form action="" method="POST">
            <table align='center' class="table-condensed">
                <tr>
                    <th>Username</th>
                    <td><input class="form-control" type="text" name="user" value="<?php if(isset($_POST['user'])) echo $user; else echo 'user' ?>"/></td>
                </tr>
                <tr>
                    <th>Password</th>
                    <td><input class="form-control" type="password" name="pass" value="<?php if(isset($_POST['pass'])) echo $pass ?>"/></td>
                </tr>
                <tr><td colspan="2"><input class="btn btn-primary" name="submit" type="submit" value="Login"/></td></tr>
            </table>
            <p class="text-center text-danger"><?php echo $warning ?></p>
        </form>
        <?php include ('includes/footer.html')?>
    </body>
</html>
