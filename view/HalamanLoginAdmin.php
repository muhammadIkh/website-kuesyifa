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
    <title>Login Admin</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/admin.css">
</head>

<body>
    <div class="container">
            <div class="row d-flex justify-content-center align-items-center row-login">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card text-white login-container" style="border-radius: 1rem;">
                        <div class="card-body p-5 text-center">
                            <div class="mb-md-5 mt-md-4 pb-5">
                                <h2 class="fw-bold mb-2 text-uppercase">Login Admin</h2>
                                <p class="text-white-50 mb-5">Please enter your login and password!</p>
                                <div class="form-outline form-white mb-4">
                                <form method="POST" action="../controller/proses.php?aksi=login">
                                    <input type="text" class="form-control form-control-lg"
                                        placeholder="Username" name="username"/>
                                </div>
                                <br>
                                <div class="form-outline form-white mb-4">
                                    <input type="password" class="form-control form-control-lg"
                                        placeholder="Password" name="password" />
                                </div>
                                <br><br>
                                <input class="btn btn-outline-light btn-lg px-5" type="submit" value="Login">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
            if (isset($_POST['submit'])) {
               foreach($db->tampil_data_produk_rekomendasi() as $a){
                    if ($_POST['username'] == $a['username'] && $_POST['password'] == $a['password']) {
                        
                    }
               }
            }
        ?>
</body>

</html>