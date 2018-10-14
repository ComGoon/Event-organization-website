<?php
/**
 * Created by PhpStorm.
 * User: ComGeek
 * Date: 03/09/2018
 * Time: 15:32
 */

session_start();

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Delete Event</title>
</head>

<body>
<form action="delEventControl.php" method="post" >

    <fieldset>
        <?php
            if (isset($_SESSION['del'])){?>
        <h3 style="color: tomato"><?=$_SESSION['del']?></h3>
           <?php
            session_destroy();
            }
        ?>
        <legend>Event:</legend>

        <label>Event Id:</label>
        <input type="number" name="nbr"><br><br>

        <input type="submit" name="del" value="Delete">

    </fieldset>

</form>


<form action="admin.php" method="post">
    <input class="input-ev" type="submit" value="Admin Page" name="add"><br><br><br>
</form>


</body>
</html>