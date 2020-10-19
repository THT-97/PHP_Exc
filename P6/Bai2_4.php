<html>
    <head>
        <meta charset="UTF-8">
        <title>Quản lý bán sữa</title>
    </head>
    <body>
        <?php
            include 'connect.php';
            $rowsPerPage=5; //số mẩu tin trên mỗi trang
            if (!isset($_GET['page'])){$_GET['page'] = 1;}//vị trí của mẩu tin đầu tiên trên mỗi trang
            $offset =($_GET['page']-1)*$rowsPerPage; //lấy $rowsPerPage mẩu tin, bắt đầu từ vị trí $offset
            $query = "SELECT Ten_Sua, Ten_hang_sua, Ten_loai, Trong_luong, Don_gia"
                    . " FROM sua, hang_sua, loai_sua"
                    . " WHERE sua.Ma_hang_sua = hang_sua.Ma_hang_sua AND sua.Ma_loai_sua = loai_sua.Ma_loai_sua"
                    . " LIMIT $offset, $rowsPerPage";
            $result = mysqli_query($conn, $query);
            $length = mysqli_num_rows($result);
            echo "<h2 style=color:brown align=center><i> THÔNG TIN SỮA</i></h2>";
            echo "<table align='center' width='700' border='1' cellpadding='2' cellspacing='2' style='border-collapse:collapse'>";
            echo "<tr bgcolor=pink style='color:brown'><th>Số TT</th>><th>Tên sữa</th><th>Hãng sữa</th><th>Loại sữa</th><th>Trọng lượng</th><th>Đơn giá</th></tr>";
            if($length<>0){
                $stt = 1;
                while($arr = mysqli_fetch_array($result)){
                    echo '<tr ';
                    if($stt%2==0) echo 'bgcolor=pink';
                    else echo "style='color:brown'";
                    echo '>';
                    echo "<td align=center>$stt</td>";
                    echo "<td>$arr[Ten_Sua]</td>";
                    echo "<td>$arr[Ten_hang_sua]</td>";
                    echo "<td>$arr[Ten_loai]</td>";
                    echo "<td>$arr[Trong_luong]</td>";
                    echo "<td>$arr[Don_gia]</td>";
                    $stt++;
                    echo '</tr>';
                }
                echo '</table>';
                $re = mysqli_query($conn, 'select Ma_sua from sua');
                //tổng số mẩu tin cần hiển thị
                $numRows= mysqli_num_rows($re);
                //tổng số trang
                $maxPage = floor($numRows/$rowsPerPage) + 1;
                //tạo link tương ứng tới các trang
                echo '<p align="center">';
                //gắn thêm nút First
                echo "<a href=" .$_SERVER['PHP_SELF']."?page=1><<</a> ";
                //gắn thêm nút Back
                if($_GET['page']>1) echo "<a href=" .$_SERVER['PHP_SELF']."?page=".($_GET['page']-1)."><</a> ";  
                echo 'Trang ';
                for ($i=1 ; $i<=$maxPage ; $i++){
                    if ($i == $_GET['page']) echo '<b>'.$i.'</b> '; //trang hiện tại sẽ được bôi đậm 
                    else echo "<a href=" .$_SERVER['PHP_SELF']."?page=".$i.">".$i."</a> ";
                }
                //gắn thêm nút Next
                if($_GET['page']<$maxPage) echo "<a href=". $_SERVER['PHP_SELF']."?page=".($_GET['page']+1).">></a> ";
                //gắn thêm nút Last
                echo "<a href=". $_SERVER['PHP_SELF']."?page=".$maxPage.">>></a>";
                echo '</p>';
            }
        ?>
    </body>
</html>
