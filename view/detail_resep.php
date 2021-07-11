<?php
require_once('../service/koneksi.php');
$db = dbConnect();
session_start();
if (isset($_POST['keluar'])) {
    session_destroy();
    header('location: ../index.php');
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
                            <a class="dropdown-item" href="manage_user.php" name="kelola-user">Kelola User</a>
                            <a class="dropdown-item" href="manage_resep.php" name="kelola-resep">Kelola Resep</a>
                            <button class="dropdown-item" href="" name="keluar">Keluar</button>
                        </div>
                    </div>
                </form>
            </div>

        <?php
        }
        ?>
    </nav>
    <?php $resep = getDataResepFromId($_GET['id'])[0]; ?>
    <div class="px-5 mt-5">
        <div class="row">
            <div class="col-12">
                <div class="white container-regis black-text-color px-5 py-5">
                    <div class="title-text text-center pt-5"><?php echo $resep['judul']; ?></div>
                    <div class="subtitle-text black-text-color px-5 mt-3 text-center"><?php echo $resep['deskripsi']; ?></div>
                    <div class="body-text text-center secondary-text-color mt-3">Oleh <?php echo $resep['username']; ?></div>
                    <div class="d-flex justify-content-center">
                        <img class="mt-5 hero-img" src="<?php echo $resep['gambar']; ?>" alt="">
                    </div>

                    <div class="body-text black-text-color text-left mt-5 px-5">
                        <?php echo $resep['konten']; ?>
                    </div>
                </div>
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