<?php
/**
 * Created by PhpStorm.
 * User: ComGeek
 * Date: 02/09/2018
 * Time: 18:00
 */

session_start();

if (!isset($_POST['adminBtn'])){
    header('location: index.php?=keep&off');
    exit();
}else {

    if (empty($_POST['admin']) || empty($_POST['adminpwd'])){
        header('location: index.php?=empty&field');
        exit();

    }else{

        $conn = mysqli_connect('localhost', 'root', '', 'events');

        $admin = $_POST['admin'];
        $pwd = $_POST['adminpwd'];

        $select = "SELECT * FROM admin WHERE adminName = '$admin' AND adminpwd = '$pwd'";
        $runSelect = mysqli_query($conn, $select);

        $runResult = mysqli_fetch_assoc($runSelect);


        if ($runResult['adminName'] != $admin && $runResult['adminpwd'] != mysqli_real_escape_string($con, $pwd)){
            header('location: index.php?=mismatch&credatials');
            exit();
        }elseif($runResult['adminName'] == mysqli_real_escape_string($conn, $admin) && $runResult['adminpwd'] === mysqli_real_escape_string($conn, $pwd)){
            $_SESSION['Admin'] = $runResult['adminName'];
            header('location: admin.php?=form&homepage');
            exit();
        }else{
            header('location: index.php?=contact&admin');
            exit();
        }
    }


}





