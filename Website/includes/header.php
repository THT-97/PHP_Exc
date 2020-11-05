<?php
    if(session_status()==PHP_SESSION_NONE) session_start();
    if(isset($_SESSION['sessionStart'])){
        $timeLimit = 300; //login lasts 5 mins
        $start = $_SESSION['sessionStart'];
        $cUser = $_SESSION['cUser'];
        $cId = $_SESSION['cID'];
        $cRole = $_SESSION['cRole'];
        if(isset($_POST['logout']) || (time()-$start)>$timeLimit){
            session_destroy();
            header("Location:http://localhost:7000/baitap/Website/index.php");
        }
    }  
?>
<div>
    <div id="top" class="text-center  col-12 float-left" style="background: url('http://localhost:7000/baitap/Website/includes/img/headerbg.png') no-repeat; background-size: 100% 100%">
        <h1 class="text-uppercase text-warning" style="font-family: 'Lucida Console'; text-shadow: 2px 3px 2px yellow">hello there</h1>
        <h2 class="text-left text-uppercase" style="font-family: Impact; color: cadetblue; text-shadow: 2px 1px 1px yellow">the future is now</h2>
    </div>
    <div class=" btn-group" style="width: 100%">
        <a class="btn btn-primary" <?php if($page_title=='Index') echo "style='background-color: darkseagreen'" ?> href="http://localhost:7000/baitap/Website/index.php">Home Page</a>                              
        <button class="btn btn-success dropdown-toggle" <?php if($page_title=='Products') echo "style='background-color: darkseagreen'" ?> data-toggle="dropdown">Products</button>
        <div class="dropdown dropdown-menu">
           <a class="dropdown-item" href="http://localhost:7000/baitap/Website/forms.php">Forms</a>
            <a class="dropdown-item" href="http://localhost:7000/baitap/Website/array_string.php">String & Array</a>
            <a class="dropdown-item" href="http://localhost:7000/baitap/Website/oop.php">OOP</a>
        </div>
        <a class="btn btn-danger" <?php if($page_title=='Users') echo "style='background-color: darkseagreen'" ?> href="http://localhost:7000/baitap/Website/view_users.php">Users</a>
        <a class="btn btn-info" <?php if($page_title=='About') echo "style='background-color: darkseagreen'" ?> href="http://localhost:7000/baitap/Website/about.php">About</a>
    </div>
    <div class="col-12 float-right">
        <div class="btn-group" style="position: fixed; right: 0; top: 0">
            <?php
                if (isset($_SESSION['cUser'])) {
                    var_dump($cId);
                    echo "<form class='btn-group' action='' method='POST'>"
                    . "<a class='btn btn-primary' href='http://localhost:7000/baitap/Website/user_details.php?id=$cId'>$cUser</a>"
                    . "<button class='btn btn-danger' type='submit' name='logout'><i class='fa fa-sign-out' aria-hidden='true'></i>Logout</button></form>";
                }
                else{
                    echo "<a class='btn btn-primary' href='http://localhost:7000/baitap/Website/login.php'>"
                    . "<i class='fa fa-sign-in' aria-hidden='true'></i> Login</a>";
                    echo "<a class='btn btn-light' href='http://localhost:7000/baitap/Website/register.php'><i class='fa fa-user-plus text-success' aria-hidden='true'></i> Register</a>";
                }
            ?>
        </div>
    </div>
</div>
