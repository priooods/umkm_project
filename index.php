<?php
include "service/connection.php";
session_start();
// if(!$_SESSION['user_id']){
//     header('Location: ./auth/login.php');
// }
$page = isset($_GET['page']) ? $_GET['page'] : 'home';

$valid_pages = ['home', 'info', 'about', 'news','detail','detailnews','setting','edit'];
if (!in_array($page, $valid_pages)) {
    $page = 'home';
}

include 'includes/header.php';
include 'includes/navigasi.php';
include "pages/$page.php";
include 'includes/footer.php';
?>
