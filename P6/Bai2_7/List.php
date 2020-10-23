<html>
    <head>
        <meta charset="UTF-8">
        <title>Quản lý bán sữa</title>
    </head>
    <body>
        <?php
            include '../connect.php';
            $rowsPerPage=5; //số mẩu tin trên mỗi trang
            if (!isset($_GET['page'])){$_GET['page'] = 1;}//vị trí của mẩu tin đầu tiên trên mỗi trang
            $offset =($_GET['page']-1)*$rowsPerPage; //lấy $rowsPerPage mẩu tin, bắt đầu từ vị trí $offset
            $query = "SELECT Hinh, Ma_Sua, Ten_Sua, Trong_luong, Don_gia FROM sua LIMIT $offset, $rowsPerPage";
            $result = mysqli_query($conn, $query);
            $length = mysqli_num_rows($result);
            echo "<table align='center' width='700' border='1' cellpadding='2' cellspacing='2' style='border-collapse:collapse'>";
            echo "<tr bgcolor=pink><th colspan=$length><h2 style=color:orange align=center><i> THÔNG TIN CÁC SẢN PHẨM</i></h2></th></tr>";
            if($length<>0){
                echo "<tr>";
                while($arr = mysqli_fetch_array($result)){
                    echo "<td align='center'>"
                    . "<a href='Details.php?id=$arr[Ma_Sua]'>$arr[Ten_Sua]</a><br/>";
                    echo "$arr[Trong_luong] gr - $arr[Don_gia] VNĐ</p>"
                    . "<img src='../images/$arr[Hinh]' width='150' height='150'/>";
                    echo "</td>";
                }
                
                echo '</tr></table>';
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
