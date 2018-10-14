<?php
/**
 * Created by PhpStorm.
 * User: ComGeek
 * Date: 03/09/2018
 * Time: 00:52
 */
session_start();
//
//if (!isset($_POST['adminpage']) || !isset($_POST['homepage'])){
//    header('location: alterEvent.php?=keep&off');
//    exit();
//}elseif (isset($_POST['adminpage'])){
//    header('location: admin.php?=from&admin&page');
//    exit();
//}else{
//        header('location: index.php?=from&index&page');
//        exit();
//    }
//

    if (isset($_POST['adminpage'])){
        header('location: admin.php?=keep&off');
        exit();
    }elseif(isset($_POST['homepage'])){
        header('location: index.php?=from&index&page');
        exit();
    }else{
        header('location: alterEvent.php?=keep&off');
        exit();
    }