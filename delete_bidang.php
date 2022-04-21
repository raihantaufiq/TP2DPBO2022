<?php

include("class/DB.php");
include("class/bidang_divisi.php");

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $id_divisi = $_GET['id_divisi'];

    $bidang = new bidang_divisi();
    $bidang->open();
    $bidang->execute("DELETE FROM bidang_divisi WHERE id_bidang=$id");
    
    $bidang->close();
}

header('location:bidang_list.php?id_divisi='.$id_divisi);

?>