<?php
/**
 * Created by PhpStorm.
 * User: ComGeek
 * Date: 02/09/2018
 * Time: 23:15
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
    <title>Alter Events</title>
</head>
<body style="background: bisque;">
<h2 style="text-align: center; text-transform: full-width">ADD EVENTS</h2>

<form action="addEventControl.php" method="post">

    <fieldset>
        <legend>Event:</legend>

    <label>Event name:</label>
    <input type="text" name="name"><br><br>

    <label>Location:</label>
    <input type="text" name="place"><br><br>

    <label>Starting date:</label>
    <input type="date" name="startD"><br><br>

    <label>Endding date:</label>
    <input type="date" name="endD"><br><br>


    <label>Number of place:</label>
    <input type="number" name="nbr-place"><br><br>

    <input type="submit" name="add" value="Add"><br><br>
    </fieldset>
</form>


<form action="home-admin.php" method="post">
    <fieldset style="display: flex; padding-left: 20px">
        <legend>Personalia:</legend>

        <input type="submit" name="adminpage" value="Admin Page"><br><br>
        <input type="submit" name="homepage" value="Home Page"><br><br>

    </fieldset>
</form>

</body>
</html>
