<?php

include("class/DB.php");
include("class/pengurus.php");

if(isset($_POST['submit'])){
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $semester = $_POST['semester'];
    $id_bidang = $_POST['jabatan'];

    $pengurus = new pengurus();
    $pengurus->open();
    $pengurus->execute("SELECT nim FROM pengurus WHERE nim='$nim'");
    $res_nim = $pengurus->getResult();

    if($res_nim == null){
        $pengurus->execute("INSERT INTO pengurus (nim, nama, semester, id_bidang) VALUES ('$nim', '$nama', '$semester', '$id_bidang')");
        $pengurus->close();
        header('location:index.php');
    }else{
        $pengurus->close();
        header('location:form_pengurus.php?status=nim_already_exist');
    }

    $pengurus->close();
}

?>