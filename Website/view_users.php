<html>
    <?php include ('includes/headtag.html')?>
    <body style="background-color: darkseagreen">
        <?php
            include ('includes/header.php');
            if($_SESSION['cRole']!='mngr') header("Location:login.php");
        ?>
        <h1>Registered Users</h1>
        <?php include ('includes/footer.html')?>
    </body>
</html>
