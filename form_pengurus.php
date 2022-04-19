<?php

include("class/DB.php");
include("class/pengurus.php");
include("class/bidang_divisi.php");
include("class/divisi.php");

if(isset($_GET['nim'])){

    $get_nim = $_GET['nim'];
    
    $pengurus = new pengurus();
    $pengurus->open();
    $pengurus->get_pengurus_byNIM($get_nim);
    list($nim, $namaPengurus, $semester, $idBidang_inpengurus) = $pengurus->getResult();

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Ormawa</title>
</head>
<body>

<nav class="p-2 bg-dark text-white">
    <div class="container">
        <div class="d-flex align-items-center justify-content-start">
            <img src="images/GnK.png" alt="logo" height="40px" width="auto" class="pe-3">
            <ul class="nav col-12">
                <li><a href="index.php" class="nav-link px-3 text-white">Home</a></li>
                <li><a href="form_pengurus.php" class="nav-link px-3 text-white">Tambah Pengurus</a></li>
            </ul>
        </div>
    </div>
</nav>

<?php
    $bidang = new bidang_divisi();
    $divisi = new divisi();
    $bidang->open();
    $divisi->open();
?>

<main>

<?php
if(isset($_GET['status'])){
    if($_GET['status'] == "nim_already_exist"){ ?>
        <div class="container">
            <div class="alert alert-danger fw-bold text-center" role="alert">
                Alert: NIM telah terdaftar, masukkan nim lain
            </div>
        </div>
<?php }
}?>

<div class="container p-5 border rounded-3 shadow my-5">
    <form action="<?php if(isset($_GET['nim'])){echo 'alter_pengurus.php';}else{echo 'add_pengurus.php';} ?>" method="POST">
        <div class="mb-3">
            <label for="nim" class="form-label">NIM</label>
            <input required type="number" class="form-control" id="nim" name="nim" <?php if(isset($_GET['nim'])){echo 'readonly value="'.$nim.'"';} ?> >
        </div>
        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input required type="text" class="form-control" id="nama" name="nama" <?php if(isset($_GET['nim'])){echo 'value="'.$namaPengurus.'"';} ?>>
        </div>
        <div class="mb-3">
            <label for="semester" class="form-label">Semester</label>
            <input required type="number" class="form-control" id="semester" name="semester" <?php if(isset($_GET['nim'])){echo 'value="'.$semester.'"';} ?>>
        </div>
        <div class="mb-3">
            <label for="jabatan" class="form-label">Jabatan</label>
            <select required class="form-select" id="jabatan" name="jabatan">
                <?php
                if(isset($_GET['nim'])){
                    echo '<option disabled value=""></option>';
                }else{
                    echo '<option selected disabled value=""></option>';
                }
                $bidang->get_AllBidang();
                while (list($idBidang, $jabatan, $idDivisi_inbidang) = $bidang->getResult()){
                    $divisi->execute("SELECT nama_divisi FROM divisi WHERE id_divisi=$idDivisi_inbidang");
                    list($namaDivisi) = $divisi->getResult();
                    if($idBidang_inpengurus == $idBidang){
                        echo "<option selected value='".$idBidang."'>".$namaDivisi." - ".$jabatan."</option>";
                    }else{
                        echo "<option value='".$idBidang."'>".$namaDivisi." - ".$jabatan."</option>";
                    }
                }
                ?>
            </select>
        </div>
        <div class="mt-4">
            <?php
            if(isset($_GET['nim'])){
                echo '<button class="btn btn-primary col-12" type="submit" id="update" name="update">Update</button>';
            }else{
                echo '<button class="btn btn-primary col-12" type="submit" id="submit" name="submit">Submit</button>';
            }
            ?>
        </div>
    </form>
</div>
  
</main>

<?php
    if(isset($_GET['nim'])){
        $pengurus->close();
    }
    $bidang->close();
    $divisi->close();
?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>