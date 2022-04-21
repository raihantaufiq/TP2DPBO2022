<?php

include("class/DB.php");
include("class/divisi.php");

if(isset($_POST['submit'])){
    $namaDivisi = $_POST['divisi'];
    $id = $_GET['id'];

    $divisi = new divisi();
    $divisi->open();
    $divisi->execute("UPDATE divisi SET nama_divisi='$namaDivisi' WHERE id_divisi='$id'");
    
    $divisi->close();
}

header('location:divisi_list.php');

?>