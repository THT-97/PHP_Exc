<html>
    <?php $page_title='Users'; include ('includes/headtag.html')?>
    <body style="background-color: darkseagreen">
        <?php
            include ('includes/header.php');
            if(!isset($cUser)){
                header("Location:login.php");
                exit();
            }
        ?>
        <h1 class="text-danger">Registered Users</h1>
        <?php
            require 'conn.php';
            $query = "SELECT DISTINCT * FROM user, user_type WHERE type=typeID";
            $result = mysqli_query($conn, $query);
            $l = mysqli_num_rows($result);
            if($l>0){
                echo "<table class='table table-stripped table-info col-10' align='center'>"
                . "<tr class='text-center text-primary' bgcolor='cyan'>"
                        . "<th>Username</th><th>Bậc</th><th>Họ tên</th><th>Giới tính</th><th>Ngày sinh</th><th>Email</th><th>SĐT</th>";
                echo '<th>Chức năng</th>';
                echo '</tr>';
                while($ar = mysqli_fetch_array($result)){
                    $d = date_format(date_create($ar['dob']), 'd/m/Y');
                    echo "<tr class='text-center'>";
                    echo "<td>$ar[userName]</td>";
                    echo "<td>$ar[role]</td>";
                    echo "<td>$ar[name]</td>";
                    if($ar['gender']==0) echo '<td>Nam</td>';
                    else echo '<td>Nữ</td>';
                    echo "<td>$d</td>";
                    echo "<td>$ar[email]</td>";
                    echo "<td>$ar[phone]</td>";
                    echo "<td style='font-size:120%'>"
                        . "<a href='user_details.php?id=$ar[userID]'>Chi tiết <i class='fa fa-info-circle text-info' aria-hidden='true'></i></a></td>";
                }
            }
        ?>
        <?php include ('includes/footer.html')?>
    </body>
</html>
