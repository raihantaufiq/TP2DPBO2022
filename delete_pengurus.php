<?php

include("class/DB.php");
include("class/pengurus.php");

if(isset($_GET['nim'])){

    $nim = $_GET['nim'];
    
    $pengurus = new pengurus();
    $pengurus->open();
    $pengurus->execute("DELETE FROM pengurus WHERE nim=$nim");

    $pengurus->close();

}

header('location:index.php');

?>