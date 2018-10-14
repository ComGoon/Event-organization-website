<?php
/**
 * Created by PhpStorm.
 * User: ComGeek
 * Date: 03/09/2018
 * Time: 15:20
 */
session_start();
//
//echo "hey";
//print_r($_POST['del']);
//die();

if (!isset($_POST['del'])){
    header('location: admin.php?=what&the&heck&you&wanna&do');
    exit();
}else{

        $conn = mysqli_connect('localhost', 'root', '', 'events');

        $nbr = $_POST['del'];

        $delete = "DELETE FROM events WHERE id = '$nbr'";
        $runDelete = mysqli_query($conn, $delete);

        header('location: admin.php?=success&delete');
        exit();
}