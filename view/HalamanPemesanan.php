<?php
include '../model/database.php';
$db = new database();
session_start();
if(isset($_SESSION['cart']) && isset($_SESSION['total'])){
    $item_id = array_column($_SESSION['cart'],'id_produk');
    $banyak = array_column($_SESSION['total'],'banyak');
}else{

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=1024">
    <title>Pemesanan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css"
        integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/style-pemesanan.css">
</head>
<body>
    <div class="navbar">
        <div class="logo">
            <img class="img_logo" src="images/logo.png" alt="Logo kue syifa">
            <img onclick="home()" class="img_toko" src="images/toko.png" alt="Kue syifa">
        </div>
        <!-- <div class="wrap">
            <div class="search">
                <input type="text" class="searchTerm" placeholder="Search....">
                <button type="submit" class="searchButton">
                    <i class="fa fa-search"></i>
                </button>
            </div>
        </div> -->
        <!-- <div class="wrap">
            <div class="input-box">
            <span class="prefix"><i class="fa fa-search"></i></span>
            <input type="tel" placeholder="Search...."/>
            </div>
        </div> -->
    </div>
    <br><br><br><br>
    <div class="row justify-content-center">
        <div class="col-7 cart">
            <table class="table text-center">
                <tr class="border-bottom border-dark">
                    <th>Gambar</th>
                    <th>Produk</th>
                    <th>Banyak</th>
                    <th>Harga</th>
                    <th></th>
                </tr>
                <?php
                $i = 0;
                $total = 0;
               if(isset($_SESSION['cart']) && isset($_SESSION['total'])){
                        foreach ($db->tampil_data_produk('') as $x){
                            foreach (array_combine($item_id,$banyak) as $id => $ba) {            
                                if($x['id_produk'] == $id){
                                    $i = 1;
                    ?>
                 <tr class="border-bottom border-dark" >
                    <td><a href="HalamanDeskripsi.php?id=<?=$x['id_produk']?>"><img width="120px" height="120px" src="<?=$x['gambar']?>" alt=""></td></a> 
                    <td><a href="HalamanDeskripsi.php?id=<?=$x['id_produk']?>"><?=$x['nama_produk']?></a> </td>
                    <td><?=$ba?></td>
                    <td><b><?="Rp.".number_format($x['harga']*$ba,2,",",".")?></b></td>
                    <td><a href="../controller/proses.php?aksi=hapus-cart&id=<?=$x['id_produk']?>"><i class="fa-solid fa-xmark h5"></i></a></td>
                </tr>
                <?php    
                                }

                        }
                    }
                    }
                ?>
            </table>
            <?php
            if ($i == 0) {
                     echo "<h5 class='text-center'>Keranjang belanja kosong</h5><br>";                    
                        }
            ?>
           <div class="text-center"><a href="HalamanProduk.php" class="btn tombol batal">Lanjut Belanja</a>
           </div>
           <br>
        </div>
        <div class="col-4 form text-center">
            <h5><b>Masukkan data anda</b></h5>
            <br>
            <form id="data" action="../controller/proses.php?aksi=input-pesan" method="POST" enctype="multipart/form-data">
                <input type="text" class="form-control" name="pemesan" placeholder="Nama Lengkap">
                <br>
                <input type="text" class="form-control" name="alamat" placeholder="Alamat">
                <br>
                <input type="text" class="form-control" name="hp" placeholder="Nomor HP">
                <br>
                <small>Tambahkan catatan (optional)</small>
                <br>
                <textarea class="form-control" rows="3" name="catatan"></textarea>
                <br>
                <input form="data" type="submit" class="btn tombol align-self-center" value="Pesan">
             </form>
                <br>    
                <a onclick="return confirm('Batalkan Pesanan? Membatalkan pesanan akan mereset keranjang belanja anda')" type="button" class="btn tombol batal" href="../controller/proses.php?aksi=batal-cart">Batal</a>
        </div>
    </div>
    <script>
        function home() {
            window.location.href = "index.php";
        }
    </script>
</body>
</html>