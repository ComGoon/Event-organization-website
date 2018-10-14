<?php
/**
 * Created by PhpStorm.
 * User: ComGeek
 * Date: 05/09/2018
 * Time: 00:18
 */



if (!isset($_POST['confirm']) && !isset($_POST['decline'])){
    header('location: admin.php?=keep&off&from&confirmation');
    exit();
}else{
    if (isset($_POST['confirm'])){

        $confirm = $_POST['confirm'];
        $conn = mysqli_connect('localhost', 'root', '', 'events');

        $var = rtrim($_POST['confirm'],"c");

        $update = "UPDATE registers SET confirmation = 'confirm' WHERE id = '$var'";
        $runUpdate = mysqli_query($conn, $update);

        if (!$runUpdate){
            header('location: admin.php?=check&db');
            exit();
        }elseif ($runUpdate){
            header('location: admin.php?=confirmed');
            exit();
        }
    }elseif (isset($_POST['decline'])){

        $decline = $_POST['decline'];
        $conn = mysqli_connect('localhost', 'root', '', 'events');

        $var = rtrim($_POST['decline'],"d");

        $update = "UPDATE registers SET confirmation = 'decline' WHERE id = '$var'";
        $runUpdate = mysqli_query($conn, $update);

        if (!$runUpdate){
            header('location: admin.php?=check&db');
            exit();
        }elseif ($runUpdate){
            header('location: admin.php?=confirmed');
            exit();
        }
    }else{
        header('location: admin.php?=keep&off&from&confirmation');
        exit();
    }
}