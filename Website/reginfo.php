<html>
    <?php $page_title='Register'; include ('includes/headtag.html')?>
    <body style="background-color: darkseagreen">
        <?php
            include ('includes/header.php');
            require './conn.php';
            $usn = $_GET['userName'];
            $query = "SELECT * FROM user WHERE userName='$usn'";
            $result = mysqli_query($conn, $query);
            $acc = mysqli_fetch_array($result);
        ?>
        <table style="margin-top: 1%; font-size: 200%; font-family: sans-serif" align="center" class="table-condensed table-info">
            <tr bgcolor="green">
                <th colspan="2"><h1 class="text-warning text-center" style="margin-left: 10%"><b>Thông tin đăng nhập</b></h1></th>
            </tr>
            <tr>
                <td><img src="includes/img/<?php echo $acc['pic'] ?>" width="300px" height="400px" /></td>
                <td>
                    <b>
                       <p>Username: <?php echo $acc['userName'] ?></p>
                       <p>Họ tên: <?php echo $acc['name'] ?></p>
                       <p>Giới tính: <?php echo ($acc['gender']==0)?'Nam':'Nữ'; ?></p>
                       <p>Ngày sinh: <?php echo date_format(date_create($acc['dob']),'d/m/Y')  ?></p>
                       <p>Email: <?php echo $acc['email'] ?></p>
                       <p>SĐT: <?php echo $acc['phone'] ?></p> 
                    </b>  
                </td>
            </tr>
            <tr>
                <td class="btn-group">
                    <a class="btn btn-primary" href="login.php">Đăng nhập</a>
                    <a class="btn btn-warning" href="index.php">Trang chủ</a>
                </td>
            </tr>
        </table>
        <?php include ('includes/footer.html')?>
    </body>
</html>
