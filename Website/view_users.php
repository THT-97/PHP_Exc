<html>
    <?php $page_title='Users'; include ('includes/headtag.html')?>
    <body style="background-color: darkseagreen">
        <?php
            include ('includes/header.php');
            if(!isset($cUser)){
                header("Location:login.php");
                exit();
            }
            $rowsPerPage=3; //số mẩu tin trên mỗi trang
            if (!isset($_GET['page'])){$_GET['page'] = 1;}//vị trí của mẩu tin đầu tiên trên mỗi trang
            $offset =($_GET['page']-1)*$rowsPerPage; //lấy $rowsPerPage mẩu tin, bắt đầu từ vị trí $offset
        ?>
        <h1 class="text-center text-danger">DANH SÁCH THÀNH VIÊN</h1>
        <?php
            require 'conn.php';
            $query = "SELECT DISTINCT * FROM user, user_type WHERE type=typeID LIMIT $offset, $rowsPerPage";
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
            $re = mysqli_query($conn, 'select userID from user');
                //tổng số mẩu tin cần hiển thị
                $numRows= mysqli_num_rows($re);
                //tổng số trang
                if($numRows%$rowsPerPage!=0) $maxPage = floor($numRows/$rowsPerPage) + 1;
                else $maxPage =$numRows/$rowsPerPage;
                //tạo link tương ứng tới các trang
                echo "<tr bgcolor='white'><td colspan='8' class='text-center'>";
                //gắn thêm nút First & Back
                if($_GET['page']>1){
                    echo "<a href=" .$_SERVER['PHP_SELF']."?page=1><<</a> ";
                    echo "<a href=" .$_SERVER['PHP_SELF']."?page=".($_GET['page']-1)."><</a> ";  
                }
                echo 'Trang ';
                for ($i=1 ; $i<=$maxPage ; $i++){
                    if ($i == $_GET['page']) echo '<b>'.$i.'</b> '; //trang hiện tại sẽ được bôi đậm 
                    else echo "<a href=" .$_SERVER['PHP_SELF']."?page=".$i.">".$i."</a> ";
                }
                //gắn thêm nút Next & Last
                if($_GET['page']<$maxPage){
                    echo "<a href=". $_SERVER['PHP_SELF']."?page=".($_GET['page']+1).">></a> ";
                    echo "<a href=". $_SERVER['PHP_SELF']."?page=".$maxPage.">>></a>";
                }
                echo '</td></tr>';
                include ('includes/footer.html')
        ?>
    </body>
</html>
