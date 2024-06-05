<?php
session_start();
        if (!isset($_SESSION['login'])) {
            header("location:HalamanLoginAdmin.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=1024">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css"
        integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/pesan-admin.css">
    <link rel="stylesheet" href="css/produk-admin.css">
    <title>Kelola Akun</title>
    <style>
        a:hover{
            color: white;
        }
    </style>
</head>
<body>
    <div class="row">
        <div class="col-1">
            <nav>
                <div><a href="HalamanPemesananAdmin.php"><i class="fa-solid fa-store"></i></a>
                </div>
                <div ><a href="HalamanRiwayatAdmin.php" ><i
                            class="fa-solid fa-clock-rotate-left"></i></a></div>
                <div><a href="HalamanProdukAdmin.php"><i class="fa-solid fa-square-plus"></i></a></div>
                <div class="active"><a href="HalamanAkunAdmin.php" class="active"><i class="fa fa-user"></i></a></div>

            </nav>
        </div>
        <div class="col-1"></div>
        <div class="col-9">
            <br>
            <h1 class="text-center"><b>Kelola Akun</b></h1>
            <br><br>
            <div class="text-center">
                <a class="btn" href="HalamanTambahAdmin.php">Tambah Akun</a>
                </div>
                <br><br>
                <div class="text-center">
                <a class="btn" href="HalamanEditAdmin.php?id=<?=$_SESSION['id']?>">Ganti Password</a>
                </div>
                <br><br>
                <div class="text-center">
                <a class="btn" href="../controller/proses.php?aksi=logout">Log Out</a>
                </div>

        </div>
</body>
</html>