<?php
include '../model/database.php';
$db = new database();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=1024">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"
        integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css"
        integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css"
        integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

        <link rel="stylesheet" href="css/style.css">
        <style>
            h1{
                font-family: 'Playfair Display';
                font-size: 3.5rem;
                font-weight: 700;
            }
            p{
                font-family: 'Playfair Display';
            }
        </style>

</head>

<body>
    <div class="wrappercircle">
        <div class="bg_toko">
            <img src="images/home.png" alt="">
        </div>
        <div class="circle"></div>
    </div>

    <div class="navbar">
        <div class="logo">
            <img class="img_logo" src="images/logo.png" alt="Logo kue syifa">
            <img onclick="home()" class="img_toko" src="images/toko.png" alt="Kue syifa">
        </div>
        <div class="wrapc">
            <a class="cart-s" href="HalamanPemesanan.php"><i class="fa-solid fa-cart-shopping"></i></a>
        </div>
        <!-- <div class="wrap">
            <div class="input-box">
            <span class="prefix"><i class="fa fa-search"></i></span>
            <input type="tel" placeholder="Search...."/>
            </div>
        </div> -->
    </div>

    <div class="container">
        <div class="welcome">
            <h1>Your cake </h1>
            <h1>Your vibe</h1>
            <h1>Your energy</h1>
            <br>
            <p style="font-size: 24px;">Tidak Menerima Pesanan untuk acara ulang tahun, anniversary dan lainnya yang bertentangan dengan ajaran
                islam. </p>
        </div>
    </div>
    <div class="space">

    </div>
    <div class="more">
        <p style="font-size: 25px;">Produk Unggulan</p>
    </div>

    <div class="produk">
         <div class="owl-carousel">
                <?php
                foreach($db->tampil_data_produk_rekomendasi() as $a){
                ?>
                <div class="item">
                    <div>
                        <a href="HalamanDeskripsi.php?id=<?=$a['id_produk']?>"><img height="230px" src="<?=$a['gambar']?>" alt=""></a>
                    </div>
                    <br>
                    <div class="nama text-center">
                         <a href="HalamanDeskripsi.php?id=<?=$a['id_produk']?>"><b><?=$a['nama_produk']?></b></a>
                    </div>
                </div>
                <?php
                }
                ?>
            </div>
        <br>
        <div class="bdiv">
            <a class="btn btn-outline" href="HalamanProduk.php">View More >></a>
        </div>
        <br>
    </div>

    <div class="footer">
        <div class="contact">
            <span>For more information please</span>
            <a class="btn btn-outline" href="https://linktr.ee/kuesyifa" target="_blank">CONTACT US</a>
        </div>
    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"
        integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="js/index.js"></script>
    <script>
        function home() {
            window.location.href = "index.php";
        }
    </script>
</body>

</html>