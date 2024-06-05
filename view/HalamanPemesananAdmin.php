<?php
include '../model/database.php';
$db = new database();
    session_start();
        if (!isset($_SESSION['login'])) {
            header("location:HalamanLoginAdmin.php");
    }

$key = "";
if(isset($_POST['cari'])){
	$key = $_POST['cari'];
}
if(isset($_POST['reset'])){
	$key = '';
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=1024">
    <title>Pemesanan Admin</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css"
        integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/riwayat-admin.css">
    <link rel="stylesheet" href="css/pesan-admin.css">

</head>

<body>

    <div class="row">
        <div class="col-1">
            <nav>
                <div class="active"><a href="HalamanPemesananAdmin.php" class="active"><i
                            class="fa-solid fa-store"></i></a>
                </div>
                <div><a href="HalamanRiwayatAdmin.php"><i class="fa-solid fa-clock-rotate-left"></i></a></div>
                <div><a href="HalamanProdukAdmin.php"><i class="fa-solid fa-square-plus"></i></a></div>
                <div><a href="HalamanAkunAdmin.php"><i class="fa fa-user"></i></a></div>

            </nav>
        </div>
        <div class="col-11">
            <br>
            <h1 class="text-center">Daftar Pemesanan</h1>
            <br>
            <div class="cari">
                <b>Pemesan : </b>
                <form method="post">
                    <input type="text" name="cari" id="cari">
                    <input type="submit" value="search">
                    <input name="reset" type="submit" value="Reset">
                </form>
            </div>
            <br>
            <table class="table border tabel">
                <thead>
                    <tr>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Pemesan</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">No HP</th>
                        <th scope="col">Produk</th>
                        <th scope="col">Banyak</th>
                        <th scope="col">Total Harga</th>
                        <th scope="col">Catatan</th>
                        <th scope="col">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $i =0;
                            foreach ($db->tampil_data_pemesanan($key) as $x){
                            $i =1;    
                         ?>
                    <tr>
                        <th scope="row"><?=date('d-m-Y',strtotime($x['tanggal']))?></th>
                        <td><?=$x['pemesan']?></td>
                        <td><?=$x['alamat']?></td>
                        <td><?=$x['pemesan']?></td>
                        <td><?=$x['no_hp']?></td>
                        <td><?=$x['banyak']?></td>
                        <td><?="Rp.".number_format($x['total_harga'],2,",",".")?></td>
                        <td><?=$x['catatan']?></td>
                        <?php
                                if ($x['status'] == 'dipesan') {
                                    $warna = 'warning';
                                }else{
                                    $warna = 'success';
                                }
                            ?>
                        <td>
                            <div class="dropdown show">
                                <a style="color:white; background-color: #8E3235; border:0;" class="btn btn-light dropdown-toggle" href="#" role="button"
                                    id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                    <?=$x['status']?>
                                </a>

                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                    <a onclick="return confirm('Ubah status pesanan?')" class="dropdown-item satu" href="../controller/proses.php?aksi=dipesan&id=<?=$x['no_pemesanan']?>">dipesan</a>
                                    <a onclick="return confirm('Ubah status pesanan?')" class="dropdown-item satu" href="../controller/proses.php?aksi=dibayar&id=<?=$x['no_pemesanan']?>">dibayar</a>
                                    <a onclick="return confirm('Batalkan pesanan?')" class="dropdown-item satu" href="../controller/proses.php?aksi=dibatalkan&id=<?=$x['no_pemesanan']?>">dibatalkan</a>
                                    <a onclick="return confirm('Ubah status pesanan?')" class="dropdown-item satu" href="../controller/proses.php?aksi=selesai&id=<?=$x['no_pemesanan']?>">selesai</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <?php
                            }
                        ?>
                </tbody>
            </table>
            <?php
            if ($i == 0) {
                     echo "<h5 class='text-center'>Data tidak ditemukan</h5><br>";                    
                        }
            ?>
        </div>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
            integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
            integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
            integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
        </script>
</body>

</html>