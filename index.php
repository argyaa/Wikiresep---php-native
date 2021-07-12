<?php
include_once("service/koneksi.php");
include_once("service/error.php");
session_start();
$db = dbConnect();
$no = 0;
$data = getKategori();
// function keluar
if (isset($_POST['keluar'])) {
    session_destroy();
    header('location: index.php');
}

//function cari
$status = false;
if (isset($_GET['cari'])) {
    $status = true;
    $cari = $db->escape_string($_GET['cari']);
    $sql = "SELECT resep.id, judul, konten, username, nama, gambar, deskripsi FROM resep
                    JOIN user ON user.id = resep.id_user
                    JOIN kategori ON kategori.id = resep.id_kategori
                    WHERE judul LIKE '%$cari%'";
}
//function kategori
else if (isset($_GET['kategori'])) {
    $kategori = $db->escape_string($_GET['kategori']);
    if ($kategori == 1) {
        $sql = "SELECT resep.id, judul, konten, username, nama, gambar, deskripsi from resep
        JOIN user ON resep.id_user = user.id
        JOIN kategori ON resep.id_kategori = kategori.id";
    } else {
        $sql = "SELECT resep.id, judul, konten, username, nama, gambar, deskripsi from resep
        JOIN user ON resep.id_user = user.id
        JOIN kategori ON resep.id_kategori = kategori.id
        WHERE id_kategori = '$kategori'";
    }
}
// function tampil seluruh resep 
else {
    $sql = "SELECT resep.id, judul, konten, username, nama, gambar, deskripsi from resep
    JOIN user ON resep.id_user = user.id
    JOIN kategori ON resep.id_kategori = kategori.id";
}
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
        <a class="navbar-brand logo black-text-color" href="index.php"><span class="primary-text-color">WIKI</span>Resep</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <?php
        if (!isset($_SESSION['id'])) {
        ?>
            <div class="collapse navbar-collapse" id="n avbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active mr-4">
                        <a class="nav-link button-text" href="view/auth/login.php">Masuk <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link px-4 ly-2 primary-color rounded-pill button-text" href="view/auth/regis.php">Daftar <span class="sr-only">(current)</span></a>
                    </li>
                </ul>
            </div>
        <?php
        } else {
        ?>
            <div class="collapse navbar-collapse" id="n avbarSupportedContent">
                <form action="" method="post" class="ml-auto">
                    <div class="dropdown">
                        <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Hai, <?php echo $_SESSION['username']; ?>
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <?php if ($_SESSION['username'] == "admin") { ?>
                                <a class="dropdown-item" href="view/manage_user.php" name="kelola-user">Kelola User</a>
                            <?php } ?>
                            <a class="dropdown-item" href="view/manage_resep.php" name="kelola-resep">Kelola Resep</a>
                            <button class="dropdown-item" href="" name="keluar">Keluar</button>
                        </div>
                    </div>
                </form>
            </div>

        <?php
        }
        ?>
    </nav>

    <div class="px-5 mt-3">
        <div class="row">
            <div class="col-12 parent">
                <div class="container-hero primary-color pl-5 pb-5">
                    <div class="pt-5 pl-5 title-text pb-3">Jangan takut ga bisa masak! <br> Kamu bisa belajar disini!</div>
                    <div class="body-text pl-5 pb-5">Kamu juga bisa jelajahi semua resep atau buat resepmu <br>
                        sendiri dan jadi banyak dikenal orang! </div>
                    <a href="view/auth/login.php" class="px-4 py-3 ml-5 rounded-pill button-text black-text-color white no-decor" style="visibility: 
                    <?php if (!isset($_SESSION['id'])) {
                        echo "none";
                    } else {
                        echo "hidden";
                    } ?>;">Jadilah Terkenal Sekarang!</a>
                    <div class="pb-1"></div>
                    <img src="assets/hero.svg" class="hero" alt="">
                </div>

            </div>
        </div>
        <div class="row justify-content-center mt-5">
            <div class="col-6">
                <form action="" method="GET">
                    <div class="input-group pl-3 white rounded-pill">
                        <span class="mt-1">
                            <img src="assets/search_icon.svg" class="text-center" alt="">
                        </span>
                        <input type="text" class="form-control search" placeholder="Cari resep, Kategori, Author" name="cari" />
                        <button class="btn primary-color px-3 py-2 rounded-pill ml-4">Cari</button>
                        <?php
                        if ($status) {
                            echo "<a href=\"index.php\" class=\"btn primary-color px-3 py-2 rounded-pill ml-4\">Refresh Data</a>";
                        }
                        ?>
                    </div>
                </form>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col-3">
                <form action="" method="GET">
                    <?php foreach ($data as $key => $val) { ?>
                        <button class="btn btn-sm text-left">
                            <input type="radio" class="kategori" id="kategori<?= $key ?>" name="kategori" value="<?= $val['id'] ?>" data-category="<?= $key ?>">
                            <label for="kategori<?= $key ?>" class="body-text black-text-color px-2 py-2 mb-3 button-category rounded-pill <?= (($_SERVER['REQUEST_URI'] == "/index.php" && $no == 0) ? 'radio-active' : ($_GET['kategori'] == $no + 1 ? 'radio-active' : '')) ?>" id="labelKategori<?= $key ?>">
                                <img src="assets/<?= $no++ ?>.svg" class="pr-2" alt="">
                                <?= $val['nama'] ?>
                            </label>
                        </button>
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
                <?php
                $res = $db->query($sql);
                if ($res) {
                    if ($res->num_rows > 0) {
                        $data = $res->fetch_all(MYSQLI_ASSOC);
                        foreach ($data as $resep) {
                ?>
                            <a href="view/detail_resep.php?id=<?php echo $resep['id']; ?>" class="no-decor">
                                <div class="card resep-item mb-3">
                                    <div class="row no-gutters">
                                        <div class="col-md-5">
                                            <div class="parent">
                                                <div class="kategori-badge rounded-pill category-color px-3 py-2 black-text-color"><?php echo $resep['nama']; ?></div>
                                                <img src="<?php echo $resep['gambar']; ?>" class="img-resep" alt="...">

                                            </div>
                                        </div>
                                        <div class="col-md-7">
                                            <div class="card-body-resep px-4 py-4">
                                                <h5 class="card-title black-text-color mb-1"><?php echo $resep['judul']; ?></h5>
                                                <p class="author primary-text-color mb-4">Oleh <?php echo $resep['username']; ?></p>
                                                <p class="body-text black-text-color"><?php echo $resep['deskripsi']; ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                <?php
                        }
                    } else {
                        if ($status) {
                            showError("Judul : $cari Tidak Ada!");
                        }
                    }
                }

                ?>
            </div>
        </div>
        <div class="result"></div>
        <div class=""><?php echo isset($_POST['kategori']); ?></div>
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
    // $('#id_category').click(function(e) {
    //     e.stopPropagation();
    //     // e.defaultPrevented();

    // })
    // $('.id_category1').click(function(e) {
    //     // e.defaultPrevented();
    //     e.stopPropagation();


    // })
    var temp = -1

    // $('.kategori').change((e) => {
    //     if (temp > -1) $('#labelKategori' + temp).removeClass('radio-active')
    //     $('#labelKategori' + $($(e)[0].target).data('category')).addClass('radio-active')
    //     temp = $($(e)[0].target).data('category')
    // })
</script>

</html>