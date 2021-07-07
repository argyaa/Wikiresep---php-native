<?php include_once('../service/koneksi.php');
session_start(); ?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&display=swap" rel="stylesheet">

    <title>Hello, world!</title>
    <link rel="stylesheet" href="../style/theme.css">
    <link rel="stylesheet" href="../style/main.css">
</head>

<body>
    <nav class="px-5 navbar navbar-expand-lg navbar-light bg-transparent mt-2 black-text-color">
        <a class="navbar-brand logo black-text-color" href="#"><span class="primary-text-color">WIKI</span>Resep</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="n avbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active mr-4">
                    <a class="nav-link button-text" href="../view/auth/login.php">Masuk <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link px-4 ly-2 primary-color rounded-pill button-text" href="../view/auth/regis.php">Daftar <span class="sr-only">(current)</span></a>
                </li>

            </ul>
        </div>
    </nav>


    <div class="row justify-content-between px-5 mt-5">
        <div class="col-8">
            <div class="input-group pl-3 white rounded-pill">
                <span class="mt-1">
                    <img src="/assets/search_icon.svg" class="text-center" alt="">
                </span>
                <input type="text" class="form-control search" placeholder="Cari resep, Kategori" />
            </div>

        </div>
        <a class="px-4 py-3 primary-color rounded-pill button-text no-decor black-text-color" href="resep/tambah_resep.php">+Tambah Resep</a>
    </div>
    <div class="px-5">
        <div class="row mt-5">
            <!-- NOTE  : FOREACH DISINI -->
            <div class="col-4 mb-5">
                <a href="/view/detail_resep.php" class="no-decor">
                    <div class="card-resep container-regis">
                        <div class="parent">
                            <div class="kategori-badge rounded-pill category-color px-3 py-2 black-text-color">Roti & Kue</div>
                            <img src="https://www.masakapahariini.com/wp-content/uploads/2020/10/roti-sobek-smoked-beef-780x440.jpg" class="card-img-top img-card" alt="...">
                        </div>
                        <div class="card-body-manage-resep parent px-4 py-4">
                            <h5 class="card-title black-text-color mb-1">Roti Sobek Daging Asap</h5>
                            <p class="author primary-text-color mb-4">Oleh <?php echo $_SESSION["username"]; ?></p>
                            <p class="card-text black-text-color">Cocok dipadukan dengan secangkir kopi atau teh hangat. Yuk, cari tahu resep roti sobek smoked beef yang membuat momen bersama keluarga semakin istimewa!</p>
                            <div class="d-flex aksi-cont">
                                <a href="#" class="no-decor aksi px-4 py-2 mr-3 button-text">Ubah</a>
                                <a href="#" class="no-decor aksi px-4 py-2 button-text">Hapus</a>
                            </div>

                        </div>
                    </div>
                </a>
            </div>
            <!-- NOTE  : SAMPE SINI -->


            <div class="col-4 mb-5">
                <a href="/view/detail_resep.php" class="no-decor">
                    <div class="card-resep container-regis">
                        <div class="parent">
                            <div class="kategori-badge rounded-pill category-color px-3 py-2 black-text-color">Olahan Daging</div>
                            <img src="https://www.masakapahariini.com/wp-content/uploads/2019/06/tumis-kentang-ayam-cincang-780x440.jpg" class="card-img-top img-card" alt="...">
                        </div>
                        <div class="card-body-manage-resep parent px-4 py-4">
                            <h5 class="card-title black-text-color mb-1">Tumis Kentang Ayam Cincang</h5>
                            <p class="author primary-text-color mb-4">oleh dandi</p>
                            <p class="card-text black-text-color">Kali ini, ide resep cepat dan enak datang dari tumis kentang ayam cincang. Wajib tersaji saat makan siang ataupun malam. Yuk, simak resepnya berikut ini!

                            </p>
                            <div class="d-flex aksi-cont">
                                <a href="#" class="no-decor aksi px-4 py-2 mr-3 button-text">Ubah</a>
                                <a href="#" class="no-decor aksi px-4 py-2 button-text">Hapus</a>
                            </div>

                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
    -->
</body>
<script type="text/javascript">

</script>

</html>