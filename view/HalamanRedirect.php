<?php
if(isset($_GET['total'])){
    $total = $_GET['total'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Redirect</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/style_produk.css">
    <link rel="stylesheet" href="css/pesan-admin.css">
    <link rel="stylesheet" href="css/produk-admin.css">
    <style>
        body{
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <br><br>
    <div class="container text-center">
    <h2 ><b>No Rekening :  afsdafdsfsdfds</b></h2>
    <h2 ><b>Atas Nama :  afsdafdsfsdfds</b></h2>
    <h2 ><b>Bank :  afsdafdsfsdfds</b></h2>
    <br>
    <h2 ><b>Total :</b></h2>
    <h2 ><b><?="Rp.".number_format((double)$total,2,",",".")?></b></h2>
    <br>
    <h3>Silahkan Hubungi Penjual setelah membayar untuk konfirmasi. Cantumkan Nama dan nomor telepon yang digunakan untuk pemesanan</h3>
    <br>
    <div>
        <div class="text-center">
                <button target="_blank" class="btn"><a href="https://api.whatsapp.com/send?phone=082386296149">WhatsApp</a></button>
                </div>
    </div>
    <br>
     <div>
        <div class="text-center">
                <button class="btn"><a href="index.php">Kembali Ke Halaman Home</a></button>
                </div>
    </div>
    </div>
</body>
</html>