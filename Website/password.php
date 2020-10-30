<html>
    <?php $page_title='Edit profile'; include ('includes/headtag.html')?>
    <body style="background-color: darkseagreen">
        <?php 
            include ('includes/header.php');
            if(!isset($cUser)) header("Location:login.php");
        ?>
        <h1>Edit profile</h1>
        <?php include ('includes/footer.html')?>
    </body>
</html>