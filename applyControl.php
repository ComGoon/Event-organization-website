<?php
/**
 * Created by PhpStorm.
 * User: ComGeek
 * Date: 07/09/2018
 * Time: 23:30
 */
print_r($_POST['evId']); // event id
echo "<br> hey";
print_r($_POST['applier']); // applier id

if (!isset($_POST['send'])){
    header('location: memberZone.php?=keep&off');
    exit();
}elseif (isset($_POST['send'])) {
    $evId = $_POST['evId'];
    $evApplier = $_POST['applier'];

    $conn = mysqli_connect('localhost', 'root', '', 'events');

    $insert = "UPDATE registers SET evId = $evId WHERE id = '$evApplier'";
    $runInsert = mysqli_query($conn, $insert);
    header('location: memberZone.php?=wait&admin&confirmation');
    exit();
}else{
    header('location: memberZone.php?=what&the&heck');
    exit();
}


?>
