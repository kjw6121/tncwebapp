<?php
session_start();
if($_SESSION['valid_user']!=true){
    header('Location: error.html');
    die();
}
?>