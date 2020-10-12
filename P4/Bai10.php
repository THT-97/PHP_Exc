<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Mua hoa</title>
        <link rel="stylesheet" href="../bootstrap.min.css"/>
    </head>
    <body>
        <?php
            $flowers = [];
            if(trim($_POST['cart'])!="") $flowers = explode(" -- ", trim($_POST['cart']));
            $cart = "";
            $warning="";
            $f = "";
            function addToCart($flower){
                global $flowers;
                global $warning;
                if(in_array($flower, $flowers)) $warning = "Hoa đã có trong giỏ";
                else if($flower!="") $flowers[] = $flower;
            }

            if(isset($_POST['submit'])){
                $f = trim($_POST['f']);
                addToCart($f);
                $cart .= implode(" -- ", $flowers);
            }
        ?>
        <form action="" method="POST">
            <table align="center" class="table-condensed">
                <tr bgcolor="khaki">
                    <th class="text-center" colspan="3" style="color: crimson">
                        <h3 class="text-uppercase" style="font-family:'Comic Sans MS'">Mua hoa</h3>
                    </th>
                </tr>
                <tr class="bg-danger">
                    <th style="color:crimson">Loại hoa bạn chọn:</th>
                    <td><input class="form-control" name="f" type="text" value="<?php if(isset($_POST['f'])) echo $f ?>"/></td>
                    <td class="text-left"><input class="btn btn-warning col-8" name="submit" type="submit" value="Thêm vào giỏ"/></td>
                </tr>
                <tr class="bg-danger">
                    <th style="color:crimson">Giỏ hoa của bạn có:</th>
                    <td colspan="2">
                        <textarea name="cart" class="form-control" cols="50" rows="3">
                            <?php if(isset($_POST['cart'])) echo $cart ?>
                        </textarea>
                    </td>
                </tr>
            </table>
            <p class="text-center text-danger"><?php echo $warning ?></p>
        </form>
    </body>
</html>
