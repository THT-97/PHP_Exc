<html>
    <head>
        <meta charset="UTF-8">
        <title>Quản lý bán sữa</title>
    </head>
    <body>
        <?php
            include 'connect.php';
            $query = 'SELECT Hinh, Ten_Sua, Trong_luong, Don_gia, Ten_loai, Ten_hang_sua'
                    . ' FROM sua, loai_sua as loai, hang_sua as hang '
                    . 'WHERE sua.Ma_loai_sua = loai.Ma_loai_sua AND sua.Ma_hang_sua = hang.Ma_hang_sua ';
            $result = mysqli_query($conn, $query);
            echo "<table align='center' width='700' border='1' cellpadding='2' cellspacing='2' style='border-collapse:collapse'>";
            echo '<tr bgcolor="pink"><th colspan=2><h2 style="color:orange" align="center"><i> THÔNG TIN CÁC SẢN PHẨM</i></h2></th></tr>';
            if(mysqli_num_rows($result)<>0){
                $stt= 1;
                while($arr= mysqli_fetch_array($result)){
                    echo "<tr>";
                    echo "<td align='center'><img src='images/$arr[Hinh]' width='150' height='150'/></td>";
                    echo "<td>"
                    . "<p><b>$arr[Ten_Sua]</b></p>"
                    . "<p>Nhà sản xuất: $arr[Ten_hang_sua]<br/>"
                    . "$arr[Ten_loai] - $arr[Trong_luong] - $arr[Don_gia] VNĐ</p>"
                    . "</td>";
                    echo "</tr>";
                }
            }
        ?>
    </body>
</html>
