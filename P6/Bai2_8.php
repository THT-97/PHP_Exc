<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
            include 'connect.php';
            $rowsPerPage=2; //số mẩu tin trên mỗi trang
            if (!isset($_GET['page'])){$_GET['page'] = 1;}//vị trí của mẩu tin đầu tiên trên mỗi trang
            $offset =($_GET['page']-1)*$rowsPerPage; //lấy $rowsPerPage mẩu tin, bắt đầu từ vị trí $offset
            $query = "SELECT * FROM sua, hang_sua WHERE sua.Ma_hang_sua = hang_sua.Ma_hang_sua LIMIT $offset, $rowsPerPage";
            $result = mysqli_query($conn, $query);
            $length = mysqli_num_rows($result);
        ?>
        <table align="center" width=50% border="1">
            <?php
                if($length<>0){
                    while($arr = mysqli_fetch_array($result)){
                        $dg = $arr['Don_gia'];
                        echo "<tr bgcolor=pink><th style='color: brown' colspan=2><h2><i>$arr[Ten_sua] - $arr[Ten_hang_sua]</i></h2></th></tr>";
                        echo "<tr>";
                        echo "<td><img src='images/$arr[Hinh]' width=150, height=200/></td>";
                        echo "<td width=80% word-wrap=break-word>
                                <b>Thành phần dinh dưỡng:</b><br/>
                                $arr[TP_Dinh_Duong]<br/>
                                <b>Lợi ích:</b><br/>
                                $arr[Loi_ich]
                                <p><b>Trọng lượng: </b><span style='color:red'>$arr[Trong_luong] gr</span>
                                  - <b>Đơn giá: </b><span style='color:red'>".number_format($dg,0,",",".")." VNĐ</span></p>
                            </td>";
                        echo '</tr>';
                    }
                }
            ?>
        </table>
        <?php
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
        ?>
    </body>
</html>
