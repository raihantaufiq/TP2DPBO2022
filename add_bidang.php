<?php

include("class/DB.php");
include("class/bidang_divisi.php");

if(isset($_POST['submit'])){
    $jabatan = $_POST['bidang'];
    $id_divisi = $_GET['id_divisi'];

    $bidang = new bidang_divisi();
    $bidang->open();
    $bidang->execute("INSERT INTO bidang_divisi (jabatan, id_divisi) VALUES ('$jabatan', '$id_divisi')");
    
    $bidang->close();
}

header('location:bidang_list.php?id_divisi='.$id_divisi);

?>