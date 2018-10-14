<?php
/**
 * Created by PhpStorm.
 * User: ComGeek
 * Date: 08/09/2018
 * Time: 03:10
 */
session_start();

if (!$_POST['logout']){
    header('location: index.php?=session&killed');
    exit();
}elseif ($_SESSION['Admin']){
    session_destroy();
    header('location: index.php?=session&kill');
    exit();
}else{
    header('location: index.php?=session&killed');
    exit();
}