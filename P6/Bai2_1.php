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
    </head>
    <body>
        <?php
            include 'connect.php';
            $query = 'SELECT * FROM hang_sua';
            $result = mysqli_query($conn, $query);
            echo "<h2 align='center'><i> THÔNG TIN HÃNG SỮA</i></h2>";
            echo "<table align='center' width='700' border='1' cellpadding='2' cellspacing='2' style='border-collapse:collapse'>";
            echo '<tr>'
            . '<th width="50">STT</th><th width="50">Mã hãng sữa</th><th width="150">Tên hãng sữa</th><th width="200">Địa chỉ</th>'
            .'<th width="100">Địện thoại</th><th width="100">Email</th>'
            . '</tr>';
            if(mysqli_num_rows($result)<>0){
                $stt= 1;
                while($arr= mysqli_fetch_array($result)){
                    echo "<tr>";
                    echo "<td>$stt</td>";
                    echo"<td>$arr[Ma_hang_sua]</td>";
                    echo "<td>$arr[Ten_hang_sua]</td>";
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
