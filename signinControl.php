<?php
/**
 * Created by PhpStorm.
 * User: ComGeek
 * Date: 06/09/2018
 * Time: 22:37
 */
session_start();

if (!isset($_POST['sign'])){
    header('location: signin.php?=keep&off');
    exit();
}else {
//       uname  email  tel  pwd  cpwd

    if ( empty($_POST['email']) || empty($_POST['pwd']) ){
        header('location: signin.php?=empty&field');
        exit();
    }else{

        $conn = mysqli_connect('localhost', 'root', '', 'events');

        $email = $_POST['email'];
        $pwd = $_POST['pwd'];

        $select = "SELECT * FROM registers WHERE email = '$email' AND pwd = '$pwd'";
        $runSelect = mysqli_query($conn, $select);

        $rowResult = mysqli_num_rows($runSelect);

        if ($rowResult < 1){
            header('location: signin.php?=no&user');
            exit();
        }elseif ($runResult = 1){

            $runCheck = mysqli_fetch_array($runSelect);

            $_SESSION['uname'] = $runCheck['uname'];

            $_SESSION['id'] = $runCheck['id'];

            header('location: memberZone.php?=welcome');
            exit();
        }else{
            header('location: signin.php?=contact&admin');
            exit();
        }
    }

}