<?php
include_once('../service/koneksi.php');
include_once('../service/error.php');
$db = dbConnect();
session_start();
if (!isset($_SESSION['id']) || $_SESSION['username'] != "admin") {
    header('location: ../index.php');
}
if (isset($_POST['keluar'])) {
    session_destroy();
    header('location: ../index.php');
}
$id = $_SESSION['id'];
$status = false;

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


    <div class="row justify-content-center px-5 mt-5">
        <div class="col-5">
            <form action="" method="post">
                <div class="input-group pl-3 white rounded-pill">
                    <span class="mt-1">
                        <img src="/assets/search_icon.svg" class="text-center" alt="">
                    </span>
                    <input type="text" class="form-control search" placeholder="Cari User" name="cari" />
                    <button class="btn primary-color px-3 py-2 rounded-pill ml-4" name="btn-cari">Cari</button>
                    <?php
                    if ($status) {
                        echo "<a href=\"manage_user.php\" class=\"btn primary-color px-3 py-2 rounded-pill ml-4\">Refresh Data</a>";
                    }
                    ?>
                </div>
            </form>
        </div>

    </div>
    <div class="row justify-content-center  ">
        <div class="container-regis mt-5">
            <?php
            if (isset($_GET['hapus'])) {
                $id = $db->escape_string($_GET['hapus']);
                $sql = "DELETE FROM user WHERE id = $id";
                $res = $db->query($sql);
                if ($res) {
                    if ($db->affected_rows > 0) {
                        showMessage('success', "Data Berhasil Dihapus!");
                    } else {
                        showMessage('warning', "Data Gagal Dihapus!");
                    }
                } else {
                    showMessage('danger', "DATABASE Error!");
                }
            }
            ?>
            <table class="table">
                <thead>
                    <tr class="primary-color text-white">
                        <th scope="col">No</th>
                        <th scope="col">Username</th>
                        <th scope="col">Password</th>
                        <th scope="col">aksi</th>
                    </tr>
                </thead>
                <tbody class="">
                    <form action="" method="get">
                        <?php
                        $no = 1;
                        $data = getDataUser();
                        foreach ($data as $user) {
                        ?>

                            <tr>
                                <th scope="row"><?php echo $no; ?></th>
                                <td><?php echo $user['username']; ?></td>
                                <td><?php echo $user['password']; ?></td>
                                <td class="">
                                    <button class="btn btn-sm" name="hapus" value="<?php echo $user['id']; ?>"><img src="../assets/delete.svg"></button>
                                </td>
                            </tr>
                        <?php
                            $no++;
                        }
                        ?>
                    </form>
                </tbody>
            </table>
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