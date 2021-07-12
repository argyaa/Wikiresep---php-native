<?php
include_once('../service/koneksi.php');
include_once('../service/error.php');
$db = dbConnect();
session_start();
if (!isset($_SESSION['id'])) {
    header('location: ../index.php');
}
if (isset($_POST['keluar'])) {
    session_destroy();
    header('location: ../index.php');
}
$id = $_SESSION['id'];
$status = false;
if (isset($_POST['btn-cari'])) {
    $status = true;
    $cari = $db->escape_string($_POST['cari']);
    $sql = "SELECT resep.id, judul, konten, username, nama, gambar, deskripsi FROM resep
                    JOIN user ON user.id = resep.id_user
                    JOIN kategori ON kategori.id = resep.id_kategori
                    WHERE judul LIKE '%$cari%'
                    AND id_user = $id";
} else {
    $sql = "SELECT resep.id, judul, konten, username, nama, gambar, deskripsi from resep
    JOIN user ON resep.id_user = user.id
    JOIN kategori ON resep.id_kategori = kategori.id
    WHERE id_user = $id";
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
    <link rel="stylesheet" href="../style/theme.css">
    <link rel="stylesheet" href="../style/main.css">
</head>

<body>
    <nav class="px-5 navbar navbar-expand-lg navbar-light bg-transparent mt-2 black-text-color">
        <a class="navbar-brand logo black-text-color" href="../index.php"><span class="primary-text-color">WIKI</span>Resep</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="n avbarSupportedContent">
            <form action="" method="post" class="ml-auto">
                <div class="dropdown">
                    <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Hai, <?php echo $_SESSION['username']; ?>
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <?php if ($_SESSION['username'] == "admin") { ?>
                            <a class="dropdown-item" href="manage_user.php" name="kelola-user">Kelola User</a>
                        <?php } ?>
                        <a class="dropdown-item" href="manage_resep.php" name="kelola-resep">Kelola Resep</a>
                        <button class="dropdown-item" href="" name="keluar">Keluar</button>
                    </div>
                </div>
            </form>
        </div>
    </nav>


    <div class="row justify-content-between px-5 mt-5 mx-0">
        <div class="col-8">
            <form action="" method="post">
                <div class="input-group pl-3 white rounded-pill">
                    <span class="mt-1">
                        <img src="/assets/search_icon.svg" class="text-center" alt="">
                    </span>
                    <input type="text" class="form-control search" placeholder="Cari resep, Kategori" name="cari" />
                    <button class="btn primary-color px-3 py-2 rounded-pill ml-4" name="btn-cari">Cari</button>
                    <?php
                    if ($status) {
                        echo "<a href=\"manage_resep.php\" class=\"btn primary-color px-3 py-2 rounded-pill ml-4\">Refresh Data</a>";
                    }
                    ?>
            </form>
        </div>

    </div>
    <a class="px-4 py-3 primary-color rounded-pill button-text no-decor black-text-color" href="resep/tambah_resep.php">+Tambah Resep</a>
    </div>
    <div class="px-5">
        <div class="row mt-5">
            <?php
            $res = $db->query($sql);
            if ($res) {
                if ($res->num_rows > 0) {
                    $dataResep = $res->fetch_all(MYSQLI_ASSOC);
                    foreach ($dataResep as $resep) {
            ?>
                        <!-- NOTE  : FOREACH DISINI -->
                        <div class="col-4 mb-5">
                            <a href="detail_resep.php?id=<?php echo $resep['id']; ?>" class="no-decor">
                                <div class="card-resep container-regis">
                                    <div class="parent">
                                        <div class="kategori-badge rounded-pill category-color px-3 py-2 black-text-color"><?php echo $resep['nama']; ?></div>
                                        <img src="<?php echo $resep['gambar']; ?>" class="card-img-top img-card" alt="...">
                                    </div>
                                    <div class="card-body-manage-resep parent px-4 py-4">
                                        <h5 class="card-title black-text-color mb-1"><?php echo $resep['judul']; ?></h5>
                                        <p class="author primary-text-color mb-4">Oleh <?php echo $_SESSION["username"]; ?></p>
                                        <p class="card-text black-text-color"><?php echo $resep['deskripsi']; ?></p>
                                        <div class="d-flex aksi-cont">
                                            <a href="resep/edit_resep.php?id=<?php echo $resep['id']; ?>" class="no-decor aksi px-4 py-2 mr-3 button-text">Ubah</a>
                                            <a href="resep/hapus_resep.php?id=<?php echo $resep['id']; ?>" class="no-decor aksi px-4 py-2 button-text">Hapus</a>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
            <?php
                    }
                } else {
                    if ($status) {
                        showError("Judul : $cari Tidak Ada!");
                    }
                }
            }
            ?>
            <!-- NOTE  : SAMPE SINI -->
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