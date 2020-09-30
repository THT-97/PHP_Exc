<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
            if(isset($_POST["Submit"])){
                $name = $_POST["Name"];
                $email = $_POST["Email"];
                $gender = $_POST["Gender"];
                $age = $_POST["Age"];
                $comment = $_POST["Comment"];
            }
        ?>
        <form action="" method="POST" style="width: 80%; margin-left: auto; margin-right: auto">
            <fieldset style="width: 50%">
                <legend>Enter your information in the form below</legend>
                <table>
                    <tr>
                        <td>Name:</td>
                        <td><input name="Name" type="text" value="<?php if(isset($_POST["Name"])) echo "$name" ?>"/></td>
                    </tr>
                    
                </table>
                <p>
                    <label>Email address: </label>
                    <input name="Email" type="text" value="<?php if(isset($_POST["Email"])) echo "$email" ?>"/>
                </p>
                <p>
                    <label>Gender: </label>
                    <input name="Gender" type="radio" value="M" 
                        <?php if(isset($_POST["Gender"]) && $gender=="M") echo 'checked="checked"' ?> checked/>Male
                    <input name="Gender" type="radio" value="F" 
                        <?php if(isset($_POST["Gender"]) && $gender=="F") echo 'checked="checked"' ?>/>Female
                </p>
                <p>
                    <label>Age:</label>
                    <select name="Age">
                        <option value="0-29" <?php if(isset($_POST["Age"]) && $age=="0-29") echo 'selected="selected"'?>>Under 30</option>
                        <option value="30-60" <?php if(isset($_POST["Age"]) && $age=="30-60") echo 'selected="selected"'?> selected>30 to 60</option>
                        <option value="61" <?php if(isset($_POST["Age"]) && $age=="61") echo 'selected="selected"'?>>Above 60</option>
                    </select>
                </p>
                <p>
                    <label>Comment: </label>
                    <textarea name="Comment" rows="5" cols="50">
                        <?php if(isset($_POST["Comment"])) echo "$comment" ?>
                    </textarea>
                </p>
            </fieldset>
            <input name="Submit" type="submit" value="Submit information"/><br/>
            <?php
                if(isset($_POST["Submit"])){
                    if(isset($_POST["Name"]) && $name!="") echo"$name";
                    else echo 'Enter name';
                    echo '<br/>';
                    if(isset($_POST["Email"]) && $email!="") echo"$email";
                    else echo 'Enter email';
                    echo '<br/>';
                    if($gender=="M") echo "Male";
                    else echo "Female";
                    echo '<br/>';
                    if($age == "0-29") echo "Under 30";
                    if($age == "30-60") echo "30 - 60";
                    if($age == "61") echo "Above 60";
                    echo '<br/>';
                    if(isset($_POST["Comment"]) && $comment!="") echo"$comment";
                    else echo 'Enter comment';
                }
            ?>
        </form>
    </body>
</html>
