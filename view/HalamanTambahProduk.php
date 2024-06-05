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
    <title>Tambah Produk</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        form{
            margin: 0 20%;
        }
        .tombol {
            display: flex;
            justify-content: center;
        }

        .tombol .btn {
            width: 50%;
        }
    </style>
</head>

<body style="background:#f2f2f2;">
    <div class="container">
        <br>
        <h1 class="text-center"><b>Tambah Produk</b></h1>
        <hr>
        <br>
        <form action="../controller/proses.php?aksi=tambah-produk" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label><b> Id Produk :</b></label>
                <input type="text" class="form-control" name="id">
            </div>
            <br>
            <div class="form-group">
                <label><b> Nama Produk :</b></label>
                <input type="text" class="form-control" name="nama">
            </div>
            <br>
            <div class="form-group">
                <label><b> Harga Produk :</b></label>
                <input type="text" class="form-control" name="harga">
            </div>
            <br>
            <div class="form-group">
                <label><b> Satuan Produk :</b></label>
                <input type="text" class="form-control" name="satuan">
            </div>
            <br>
            <div class="form-group">
                <label><b>Ketersediaan Produk :</b></label><br>
                <input type="radio" name="status" value="Tersedia" checked> Tersedia<br>
                <input type="radio" name="status" value="Tidak Tersedia"> Tidak Tersedia
            </div>
            <br>
            <div class="form-group">
                <label><b>Rekomendasi :</b></label><br>
                <input type="radio" name="rekom" value="Ya">Ya<br>
                <input type="radio" name="rekom" value="Tidak" checked> Tidak
            </div>
            <br>
            <div class="form-group">
                <label><b>Gambar Produk :</b></label><br>
                <input type="file" class="form-control" name="gambar" enctype="multipart/form-data">
            </div>
            <br>
            <div class="form-group">
                <label><b> Deskripsi Produk :</b></label>
                <textarea class="form-control" rows="4" name="des"></textarea>
            </div>
            <br> 
            <div class="tombol">
                <input class="btn btn-success" type="submit" value="Tambah">
            </div>
        </form>
        <br><br>
    </div>
</body>

</html>