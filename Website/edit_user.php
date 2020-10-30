<html>
    <?php $page_title='Edit profile'; include ('includes/headtag.html')?>
    <body style="background-color: darkseagreen">
        <?php 
            include ('includes/header.php');
            if(!isset($cUser)) header("Location:login.php");
        ?>
        <h1>Edit profile</h1>
        <?php
            include ('includes/footer.html');
            //redirect to index if user is not manager
            if(!isset($_SESSION['cRole']) || $_SESSION['cRole']!='mngr') header("Location:index.php");
        ?>
    </body>
</html>