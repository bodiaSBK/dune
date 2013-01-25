<?php
session_start();

if($_SESSION['user1'] == NULL){
$_SESSION['user1'] = $_POST['user1'];
     if($_POST['user1'] == NULL){
     $_SESSION['user1'] = 'Игрок №1';
     }
}
if($_POST['user1'] != NULL){
$_SESSION['user1'] = $_POST['user1'];
}

if($_SESSION['user2'] == NULL){
$_SESSION['user2'] = $_POST['user2'];
     if($_POST['user2'] == NULL){
     $_SESSION['user2'] = 'Игрок №2';
     }
}
if($_POST['user2'] != NULL){
$_SESSION['user2'] = $_POST['user2'];
}

if($_SESSION['user3'] == NULL){
$_SESSION['user3'] = $_POST['user3'];
     if($_POST['user3'] == NULL){
     $_SESSION['user3'] = 'Игрок №3';
     }
}
if($_POST['user3'] != NULL){
$_SESSION['user3'] = $_POST['user3'];
}

if($_SESSION['user4'] == NULL){
$_SESSION['user4'] = $_POST['user4'];
     if($_POST['user4'] == NULL){
     $_SESSION['user4'] = 'Игрок №4';
     }
}
if($_POST['user4'] != NULL){
$_SESSION['user4'] = $_POST['user4'];
}

$name1 = $_SESSION['user1'];
$name2 = $_SESSION['user2'];
$name3 = $_SESSION['user3'];
$name4 = $_SESSION['user4'];
?>