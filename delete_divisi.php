<?php

include("class/DB.php");
include("class/divisi.php");

if(isset($_GET['id'])){

    $id = $_GET['id'];
    
    $divisi = new divisi();
    $divisi->open();
    $divisi->execute("DELETE FROM divisi WHERE id_divisi=$id");

    $divisi->close();

}

header('location:divisi_list.php');

?>