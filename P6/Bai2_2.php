<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Quản lý bán sữa</title>
        <link rel="stylesheet" href="../bootstrap.min.css" />
    </head>
    <body>
        <?php
            require 'connect.php';
            $query = 'SELECT * FROM khach_hang';
            $result = mysqli_query($conn, $query);
            echo "<h2 align='center'><b> THÔNG TIN KHÁCH HÀNG</b></h2>";
            echo "<table align='center' class='table-hover'>";
            echo '<tr>'
            . '<th>STT</th><th width="50">Mã KH</th><th width="150">Tên KH</th><th width="50">Phái</th><th width="200">Địa chỉ</th>'
            .'<th width="100">Địện thoại</th><th width="100">Email</th>'
            . '</tr>';
            if(mysqli_num_rows($result)<>0){
                $stt= 1;
                while($arr= mysqli_fetch_array($result)){
                    echo "<tr ";
                    if($stt%2!=0) echo "class='bg-danger'";
                    echo '>';
                    echo "<td>$stt</td>";
                    echo"<td>$arr[Ma_khach_hang]</td>";
                    echo "<td>$arr[Ten_khach_hang]</td>";
                    if($arr['Phai']==0) echo "<td>Nam</td>";
                    else echo "<td>Nữ</td>";
                    echo "<td>$arr[Dia_chi]</td>";
                    echo "<td>$arr[Dien_thoai]</td>";
                    echo "<td>$arr[Email]</td>";
                    echo "</tr>";
                    $stt+=1;
                }
            }
        ?>
    </body>
</html>
