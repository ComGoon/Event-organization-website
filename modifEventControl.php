<?php
/**
 * Created by PhpStorm.
 * User: ComGeek
 * Date: 03/09/2018
 * Time: 12:51
 */

if (!isset($_POST['modif'])){
    header('location: admin.php?=keep&off');
    exit();
}elseif (isset($_POST['modif'])){

    $conn = mysqli_connect('localhost', 'root', '', 'events');

    $id = $_POST['id'];
    $var = $_POST['select'];
    $newVar = $_POST['newValue'];

    if($_POST['select'] == 'location'){
//UPDATE EVENTS SET location = 'location' WHERE id = 2 AND location = location
        $update = "UPDATE events SET location = '$newVar' WHERE id = '$id'";
        $runUpdate = mysqli_query($conn, $update);

        if (isset($runUpdate)){
            header('location: admin.php?=success&update');
            exit();
        }else{
        header('location: admin.php?=failed&update');
        exit();
        }
    }


//    UPDATE table_name
//SET column1 = value1, column2 = value2, ...
//WHERE condition;





}else{



}
