<html>
    <table border="1">
        <tr width="100%">
            <?php
                for($i = 2; $i <= 10; $i++){
                    echo "<td width='11%' align='center'>";
                    for ($j = 1; $j <= 10; $j++) {
                        printf("%d x %d = %d",$i, $j, $i*$j);
                        echo '<br/>';
                    }
                    echo "</td>";
                }
            ?>
        </tr>
    </table>
</html>

