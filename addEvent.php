<?php
/**
 * Created by PhpStorm.
 * User: ComGeek
 * Date: 07/09/2018
 * Time: 15:19
 */
?>
<form action="addEventControl.php" method="post">
    <input type="text" name="name" placeholder="Event label" style="background: black; margin-left: 15px; margin-top: 10px">

    <input type="text" name="place" placeholder="Location" style="background: black; margin-left: 15px">

    <input type="date" name="startD" placeholder="Starting date:" style="background: black; margin-left: 15px">

    <input type="date" name="endD" placeholder="Endding date:" style="background: black; margin-left: 15px">

    <input type="number" name="nbr-place" placeholder="Number of place:" style="background: black; margin-left: 15px">

    <input type="submit" name="add" value="Add" style="background: black; margin-left: 15px; margin-top: 10px"><br><br>
</form>
