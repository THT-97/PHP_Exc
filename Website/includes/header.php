<?php
    session_start();
    if(isset($_SESSION['cUser'])) $cUser = $_SESSION['cUser'];
    if(isset($_POST['logout'])){
        session_destroy();
        header("Location:#");
    }
?>
<div id="top" class="text-center  col-12 float-left" style="background: url('http://localhost:7000/baitap/Website/includes/img/headerbg.png') no-repeat; background-size: 100% 100%">
    <h1 class="text-uppercase text-warning" style="font-family: 'Lucida Console'; text-shadow: 2px 3px 2px yellow">hello there</h1>
    <h2 class="text-left text-uppercase" style="font-family: Impact; color: cadetblue; text-shadow: 2px 1px 1px yellow">the future is now</h2>
</div>
<div class=" btn-group col-12" style="background-color: darkseagreen">
        <a class="btn btn-primary" href="http://localhost:7000/baitap/Website/index.php">Home Page</a>                              
            <button class="btn btn-success dropdown-toggle" data-toggle="dropdown">Products</button>
            <div class="dropdown dropdown-menu">
                <a class="dropdown-item" href="http://localhost:7000/baitap/Website/forms.php">Forms</a>
                <a class="dropdown-item" href="http://localhost:7000/baitap/Website/array_string.php">String & Array</a>
                <a class="dropdown-item" href="http://localhost:7000/baitap/Website/oop.php">OOP</a>
            </div>
        <a class="btn btn-danger" href="http://localhost:7000/baitap/Website/view_users.php">View Users</a>
	<a class="btn btn-info" href="#">About</a>
</div>
<div class="col-12 float-left">
    <div class="btn-group" style="position: fixed; right: 0; top: 0">
        <?php
        if (isset($_SESSION['cUser'])) {
            echo "<form class='btn-group' action='' method='POST'>"
            . "<a class='btn btn-primary' href='http://localhost:7000/baitap/Website/password.php'>$cUser</a>"
            . "<input class='btn btn-danger' type='submit' name='logout' value='Logout' /></form>";
        }
        else {
            echo "<a class='btn btn-primary' href='http://localhost:7000/baitap/Website/login.php'>"
            . "<i class='fa fa-sign-in' aria-hidden='true'></i> Login</a>";
            echo "<a class='btn btn-light' href='http://localhost:7000/baitap/Website/register.php'>Register</a>";
        }
        ?>
    </div>
</div>