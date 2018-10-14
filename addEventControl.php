<?php
/**
 * Created by PhpStorm.
 * User: ComGeek
 * Date: 02/09/2018
 * Time: 23:44
 */


if (!isset($_POST['add'])){
    header('location: admin.php?=keep&off');
    exit();
}else {

    if (empty($_POST['name']) || empty($_POST['startD']) || empty($_POST['endD']) || empty($_POST['name']) || empty($_POST['place']) || empty($_POST['nbr-place'])){
        header('location: admin.php?=empty&fields');
        exit();

    }else{

        $conn = mysqli_connect('localhost', 'root', '', 'events');

        $name = $_POST['name'];
        $place = $_POST['place'];
        $startD = $_POST['startD'];
        $endD = $_POST['endD'];
        $nbrPlace = $_POST['nbr-place'];

        $insert = "INSERT INTO events (evName, location, evStartD, evEndD, nbrPlace) VALUES ('$name', '$place', '$startD', '$endD', '$nbrPlace')";
        $runInsert = mysqli_query($conn, $insert);

        header('location: admin.php?=added');
        exit();

    }
}





