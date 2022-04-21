<?php

include("class/DB.php");
include("class/divisi.php");

if(isset($_POST['submit'])){
    $namaDivisi = $_POST['divisi'];

    $divisi = new divisi();
    $divisi->open();
    $divisi->execute("INSERT INTO divisi (nama_divisi) VALUES ('$namaDivisi')");
    
    $divisi->close();
}

header('location:divisi_list.php');

?>