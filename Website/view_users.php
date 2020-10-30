<html>
    <?php $page_title='Users'; include ('includes/headtag.html')?>
    <body style="background-color: darkseagreen">
        <?php
            include ('includes/header.php');
            if(!isset($cUser)) header("Location:login.php");
        ?>
        <h1>Registered Users</h1>
        <?php include ('includes/footer.html')?>
    </body>
</html>
