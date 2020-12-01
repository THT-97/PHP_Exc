<html>
    <head>
        <meta charset="UTF-8">
        <title>Thi - Quản lý bán sữa</title>
    </head>
    <body>
        <?php
            include 'connect.php';
            $rowsPerPage=2; //số mẩu tin trên mỗi trang
            if (!isset($_GET['page'])){$_GET['page'] = 1;}//vị trí của mẩu tin đầu tiên trên mỗi trang
            $offset =($_GET['page']-1)*$rowsPerPage; //lấy $rowsPerPage mẩu tin, bắt đầu từ vị trí $offset
            $query = "SELECT * FROM khach_hang LIMIT $offset, $rowsPerPage";
            $result = mysqli_query($conn, $query);
            $length = mysqli_num_rows($result);
            echo "<table align='center' width='50%' border='2' cellpadding='2' cellspacing='2' style='border-collapse:collapse'>";
            echo "<tr bgcolor=pink><th colspan=4><h2 style=color:orange align=center><i> THÔNG TIN KHÁCH HÀNG</i></h2></th></tr>";
            if($length<>0){
                
                while($arr = mysqli_fetch_array($result)){
                    $phai = 'Nam';
                    if($arr['Phai']==1) $phai = 'Nữ';
                    echo "<tr><td><img src='images/$arr[anh]'/></td>";
                    echo "<td align='left'><p><b>Họ tên: $arr[Ten_khach_hang]</b></p>"
                            ."<p>Phái: $phai</p>"
                            . "<p>Địa chỉ: $arr[Dia_chi]</p>"
                            . "<p>Điện thoại: $arr[Dien_thoai]</p>"
                            . "<p>Email: $arr[Email]</p>";
                    echo "</td></tr>";
                }
                
                echo '</table>';
                $re = mysqli_query($conn, 'select Ma_khach_hang from khach_hang');
                //tổng số mẩu tin cần hiển thị
                $numRows= mysqli_num_rows($re);
                //tổng số trang
                if($numRows%$rowsPerPage!=0) $maxPage = floor($numRows/$rowsPerPage) + 1;
                else $maxPage =$numRows/$rowsPerPage;
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
