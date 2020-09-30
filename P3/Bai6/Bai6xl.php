<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Phép tính trên hai số</title>
        <link rel="stylesheet" href="../../bootstrap.min.css"/>
    </head>
    <body>
        <?php
            $a = $_POST["A"];
            $b = $_POST["B"];
            $op = $_POST["operator"];
            $result = "";
            if($a == "") $a = 0;
            if($b == "") $b = 0;
            switch ($op){
                case 1: $result = $a + $b; break;
                case 2: $result = $a - $b; break;
                case 3: $result = $a * $b; break;
                case 4: if($b!=0) $result = $a / $b; else $result = "Không thể chia"; break;
            }
        ?>
        <table class="table-condensed col-6" style="margin-left: auto; margin-right: auto">
                <tr>
                    <th colspan="2">
                        <h2 class="text-primary">PHÉP TÍNH TRÊN HAI SỐ</h2>
                    </th>
                </tr>
                <tr>
                    <td class="text-left" width="40%"><b class="text-primary">Số thứ nhất:</b></td>
                    <td><?php if(isset($_POST["A"])) echo $a ?></td>
                </tr>
                <tr>
                    <td class="text-left" width='40%'><b class="text-warning">Chọn phép tính:</b></td>
                    <td>
                        <b class="text-danger">
                           <?php
                                switch ($op){
                                    case 1: echo 'Cộng'; break;
                                    case 2: echo 'Trừ'; break;
                                    case 3: echo 'Nhân'; break;
                                    case 4: echo 'Chia'; break;
                                }
                            ?> 
                        </b>
                    </td>
                </tr>
                <tr>
                    <td class="text-left" width='40%'><b class="text-primary">Số thứ hai:</b></td>
                    <td><?php if(isset($_POST["B"])) echo $b ?></td>
                </tr>
                <tr>
                    <td class="text-left" width='40%'><b class="text-primary">Kết quả:</b></td>
                    <td><?php if(isset($_POST["A"])) echo $result ?></td>
                </tr>
                <tr class="bg-success">
                    <td colspan="2" align='center'><a class="btn btn-default" href="javascript:window.history.back(-1);">Quay lại</a></td>
                </tr>
            </table>
    </body>
</html>
