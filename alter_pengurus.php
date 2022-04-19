<?php

include("class/DB.php");
include("class/pengurus.php");

if(isset($_POST['update'])){

    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $semester = $_POST['semester'];
    $id_bidang = $_POST['jabatan'];

    $pengurus = new pengurus();
    $pengurus->open();
    $pengurus->execute("UPDATE pengurus SET nama='$nama', semester='$semester', id_bidang='$id_bidang' WHERE nim='$nim'");

    $pengurus->close();
    
}

header('location:index.php');

?>