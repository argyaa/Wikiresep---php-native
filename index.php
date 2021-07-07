<?php
include_once("service/koneksi.php");
$db = dbConnect();
$sql = "SELECT * from kategori";
$res = $db->query($sql);
$data = $res->fetch_all(MYSQLI_ASSOC);
$no = 0;

?>

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
    <link rel="stylesheet" href="style/theme.css">
    <link rel="stylesheet" href="style/main.css">
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
                    <a class="nav-link button-text" href="/view/auth/login.php">Masuk <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link px-4 ly-2 primary-color rounded-pill button-text" href="/view/auth/regis.php">Daftar <span class="sr-only">(current)</span></a>
                </li>

            </ul>
        </div>
    </nav>

    <div class="px-5 mt-3">
        <div class="row">
            <div class="col-12 parent">
                <div class="container-hero primary-color pl-5 pb-5">
                    <div class="pt-5 pl-5 title-text pb-3">Jangan takut ga bisa masak! <br> Kamu bisa belajar disini!</div>
                    <div class="body-text pl-5 pb-5">Kamu juga bisa jelajahi semua resep atau buat resepmu <br>
                        sendiri dan jadi banyak dikenal orang! </div>
                    <a href="/view/auth/login.php" class="px-4 py-3 ml-5 rounded-pill button-text black-text-color white no-decor">Jadilah Terkenal Sekarang!</a>
                    <div class="pb-1"></div>
                    <img src="/assets/hero.svg" class="hero" alt="">
                </div>

            </div>
        </div>
        <div class="row justify-content-center mt-5">
            <div class="col-6">
                <div class="input-group pl-3 white rounded-pill">
                    <span class="mt-1">
                        <img src="/assets/search_icon.svg" class="text-center" alt="">
                    </span>
                    <input type="text" class="form-control search" placeholder="Cari resep, Kategori, Author" />
                </div>

            </div>
        </div>

        <div class="row mt-5">
            <div class="col-3">
                <form action="">
                    <?php foreach ($data as $key => $val) { ?>
                        <input type="radio" class="kategori" id="kategori<?= $key ?>" name="kategori" value="<?= $val['id'] ?>" data-category="<?= $key ?>">
                        <label for="kategori<?= $key ?>" class="body-text black-text-color button-category px-2 py-2 mb-3 rounded-pill" id="labelKategori<?= $key ?>">
                            <img src="/assets/<?= $no++ ?>.svg" class="pr-2" alt="">
                            <?= $val['nama'] ?>

                        </label>
                    <?php } ?>
                    <!-- <div class="cont mb-3">
                        <input type="radio" id="kategori">
                        <label for="kategori" class="body-text black-text-color button-category px-2 py-2 rounded-pill">


                            Semua Jenis
                        </label>
                    </div> -->
                </form>




            </div>
            <div class="col-9">
                <a href="/view/detail_resep.php" class="no-decor">
                    <div class="card resep-item mb-3">
                        <div class="row no-gutters">
                            <div class="col-md-5">
                                <div class="parent">
                                    <div class="kategori-badge rounded-pill category-color px-3 py-2 black-text-color">Roti & Kue</div>
                                    <img src="https://www.masakapahariini.com/wp-content/uploads/2020/10/roti-sobek-smoked-beef-780x440.jpg" class="img-resep" alt="...">

                                </div>
                            </div>
                            <div class="col-md-7">
                                <div class="card-body-resep px-4 py-4">
                                    <h5 class="card-title black-text-color mb-1">Roti Sobek Daging Asap</h5>
                                    <p class="author primary-text-color mb-4">oleh dandi</p>
                                    <p class="body-text black-text-color">Cocok dipadukan dengan secangkir kopi atau teh hangat. Yuk, cari tahu resep roti sobek smoked beef yang membuat momen bersama keluarga semakin istimewa!</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
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
    var temp = -1

    $('.kategori').change((e) => {
        if (temp > -1) $('#labelKategori' + temp).removeClass('radio-active')
        $('#labelKategori' + $($(e)[0].target).data('category')).addClass('radio-active')
        temp = $($(e)[0].target).data('category')
    })
</script>

</html>