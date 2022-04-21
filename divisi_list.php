<?php

include("class/DB.php");
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
    $divisi = new divisi();
    $divisi->open();
?>

<main>
    <div class="container col-lg-8">
        <h3 class="text-center mt-3">Divisi</h3>
        <?php if(isset($_GET['id'])){ 
            $divisi->get_divisi_byId($_GET['id']);
            list($id_get, $namaDivisi_get) = $divisi->getResult(); ?>
        <form action="alter_divisi.php?id=<?php echo $id_get; ?>" method="post">
            <label for="divisi" class="form-label">Edit : <?php echo $namaDivisi_get; ?></label>
            <div class="mb-3 d-flex">
                <input required type="text" class="form-control rounded-0" id="divisi" name="divisi" placeholder="Ubah nama divisi" value="<?php echo $namaDivisi_get; ?>">
                <a href="divisi_list.php" class="btn btn-outline-danger rounded-0" type="submit" id="submit" name="submit">Cancel</a>
                <button class="btn btn-primary rounded-0" type="submit" id="submit" name="submit">Update</button>
            </div>
        </form>
        <?php }else{ ?>
        <form action="add_divisi.php" method="post">
            <label for="divisi" class="form-label">Tambah Divisi</label>
            <div class="mb-3 d-flex">
                <input required type="text" class="form-control rounded-0" id="divisi" name="divisi" placeholder="Masukkan nama divisi">
                <button class="btn btn-primary col-2 rounded-0" type="submit" id="submit" name="submit">Add</button>
            </div>
        </form>
        <?php } ?>
        
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>No</th>
                    <th class="col-8">Nama Divisi</th>
                    <th>Info</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $divisi->get_AllDivisi();
                $inc = 1;
                while (list($id, $namaDivisi) = $divisi->getResult()) {
                    echo '<tr>';
                        echo'<th>'.$inc.'</th>';
                        echo '<td>'.$namaDivisi.'</td>';
                        echo '<td><a href="bidang_list.php?id_divisi='.$id.'" class="btn btn-sm btn-outline-primary">Bidang</a></td>';
                        echo '<td class="d-flex justify-content-center">';
                            echo '<a href="divisi_list.php?id='.$id.'" class="btn w-100 btn-sm btn-success me-1">Edit</a>';
                            echo '<a href="delete_divisi.php?id='.$id.'" class="btn w-100 btn-sm btn-danger ms-1">Delete</a>';
                        echo '</td>';
                    echo '</tr>';
                    $inc ++; 
                }
                ?>
            </tbody>
        </table>
    </div>
    
  
</main>

<?php
    $divisi->close();
?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>