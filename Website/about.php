<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <?php $page_title="About"; include ('includes/headtag.html')?>
    <body style="background-color: darkseagreen">
        <?php
            include ('includes/header.php');
            require './conn.php';
            $query = "SELECT * FROM user WHERE userID='u0000'";
            $result = mysqli_query($conn, $query);
            $acc = mysqli_fetch_array($result);
        ?>
        
        <table style="margin-top: 1%; font-size: 200%; font-family: sans-serif" align="center" class="table-condensed table-info">
            <tr bgcolor="green">
                <th colspan="2"><h1 class="text-warning text-center" style="margin-left: 10%"><b>TÁC GIẢ</b></h1></th>
            </tr>
            <tr>
                <td><img alt="authorPic" src="includes/img/<?php echo $acc['pic'] ?>" width="300px" height="400px" /></td>
                <td>
                    <b>
                       <p>Họ tên: <?php echo $acc['name'] ?></p>
                       <p>Giới tính: <?php echo ($acc['gender']==0)?'Nam':'Nữ'; ?></p>
                       <p>Ngày sinh: <?php echo date_format(date_create($acc['dob']),'d/m/Y')  ?></p>
                       <p>Email: <?php echo $acc['email'] ?></p>
                       <p>SĐT: <?php echo $acc['phone'] ?></p>   
                    </b>  
                </td>
            </tr>
        </table>
        <?php mysqli_close($conn); include '../Website/includes/footer.html'; ?>
    </body>
</html>
