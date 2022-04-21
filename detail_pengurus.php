<?php

include("class/DB.php");
include("class/pengurus.php");
include("class/bidang_divisi.php");
include("class/divisi.php");

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
                <li><a href="divisi_list.php" class="nav-link px-3 text-white">Divisi</a></li>
            </ul>
        </div>
    </div>
</nav>

<?php
    if(isset($_GET['nim'])){
      $get_nim = $_GET['nim'];
    }else{
      header('location:index.php');
    }

    $pengurus = new pengurus();
    $bidang = new bidang_divisi();
    $divisi = new divisi();
    $pengurus->open();
    $bidang->open();
    $divisi->open();

    $pengurus->get_pengurus_byNIM($get_nim);
    list($nim, $namaPengurus, $semester, $idBidang_inpengurus) = $pengurus->getResult();
?>

<main>
    
    <div class="py-5 bg-light">
        <div class="container w-25">
    
          <div class="d-flex justify-content-center">
            
            <div class="d-flex justify-content-center">
                <div class="card text-center text-dark">
                  <img src="images/profile_blank.jpg" width="auto" height="auto" alt="foto" class="img-thumbnail">
                  <?php
                    $bidang->get_bidang_byId($idBidang_inpengurus);
                    list($idBidang, $jabatan, $idDivisi_inbidang) = $bidang->getResult();

                    $divisi->get_divisi_byId($idDivisi_inbidang);
                    list($idDivisi, $namaDivisi) = $divisi->getResult();
                  ?>
                  <div class="card-body">
                    <h5 class="card-text px-2"><?php echo $namaPengurus ?></h5>
                    <p class="card-text px-2"><?php echo $namaDivisi?></p>
                    <p class="card-text px-2 fs-5"><?php echo $jabatan?></p>
                  </div>
                </div>
            </div>
          </div>

          <div class="d-flex justify-content-center">
            <a href="form_pengurus.php?nim=<?php echo $nim ?>" class="btn btn-primary mx-3 mt-3">Edit</a>
            <a href="delete_pengurus.php?nim=<?php echo $nim ?>" class="btn btn-primary mx-3 mt-3">Hapus</a>
          </div>

        </div>
      </div>
    
  
</main>

<?php
    $pengurus->close();
    $bidang->close();
    $divisi->close();
?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>