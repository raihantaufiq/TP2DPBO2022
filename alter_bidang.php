<?php

include("class/DB.php");
include("class/bidang_divisi.php");

if(isset($_POST['submit'])){
    $jabatan = $_POST['bidang'];
    $id_bidang = $_GET['id_bidang'];
    $id_divisi = $_GET['id_divisi'];

    $bidang = new bidang_divisi();
    $bidang->open();
    $bidang->execute("UPDATE bidang_divisi SET jabatan='$jabatan' WHERE id_bidang='$id_bidang'");
    
    
    $bidang->close();
}

header('location:bidang_list.php?id_divisi='.$id_divisi);

?>