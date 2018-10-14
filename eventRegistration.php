<?php
/**
 * Created by PhpStorm.
 * User: ComGeek
 * Date: 03/09/2018
 * Time: 23:03
 */
session_start();

if (!isset($_POST['register'])){
    header('location: index.php?=keep&off');
    exit();
}else {

    if (empty($_POST['uname']) || empty($_POST['email']) || empty($_POST['utel']) || empty($_POST['upwd']) || empty($_POST['confirpwd'])){
        $_SESSION['register'] = 'Empty field(s)';
        header('location: index.php?=empty&field');
        exit();
    }else{

        $pwd = $_POST['upwd'];
        $cpwd = $_POST['confirpwd'];

        if ($pwd != $cpwd){

            $_SESSION['register'] = 'Password mismatch';
            header('location: index.php?=pwd&mismatch');
            exit();
        }elseif($pwd === $cpwd) {

            $uname = $_POST['uname'];
            $email = $_POST['email'];
            $utel = $_POST['utel'];

            $conn = mysqli_connect('localhost', 'root', '', 'events');

            $insert = "INSERT INTO registers (uname, email, tel, pwd) VALUES ('$uname', '$email', '$utel', '$pwd')";
            $runInsert = mysqli_query($conn, $insert);

            if (!isset($runInsert)) {
                $_SESSION['register'] = 'Unsuccessful registion. Contact admin please!';
                header('location: index.php?=db&problem');
                exit();
            } elseif (isset($runInsert)) {
                $_SESSION['register'] = 'Wait for admin confirmation!';
                header('location: index.php?=admin&confirmation');
                exit();
            } else {
                $_SESSION['register'] = 'Problem, Contact admin!';
                header('location: index.php?=contact&admin');
                exit();
            }
        }else{
            $_SESSION['register'] = 'Unsuccessful registion. Contact admin please!';
            header('location: index.php?=db&problem');
            exit();
        }
    }
}