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
    <link rel="stylesheet" href="/style/theme.css">
    <link rel="stylesheet" href="/style/main.css">
    <link rel="stylesheet" href="/style/trumbowyg.min.css">
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
                    <a class="nav-link button-text" href="view/auth/login.php">Masuk <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link px-4 py-2 primary-color rounded-pill button-text" href="view/auth/regis.php">Daftar <span class="sr-only">(current)</span></a>
                </li>

            </ul>
        </div>
    </nav>

    <form action="" method="POST" class="mt-4">
        <div class="container">
            <div class="row mt-3 pt-4">
                <div class="row col-12 container container-regis px-5 py-3">

                    <div class="col-5 mr-0">
                        <div class="form-group mb-4">
                            <label class="body-text black-text-color" for="exampleInputEmail1">Judul</label>
                            <input type="text" name="judul" placeholder="masukkan username" class="form-control auth no-border rounded-pill form-color" id="exampleInputEmail1" aria-describedby="emailHelp" require autocomplete="FALSE">
                        </div>
                        <div class="form-group mb-4">
                            <label class="body-text black-text-color" for="exampleInputEmail1">Gambar</label>
                            <input type="text" name="judul" placeholder="masukkan link gambar" class="form-control auth no-border rounded-pill form-color" id="exampleInputEmail1" aria-describedby="emailHelp" require autocomplete="FALSE">
                        </div>
                        <div class="form-group mb-4">
                            <label class="body-text black-text-color" for="exampleInputPassword1">Jenis Resep</label>
                            <select class="form-control auth no-border rounded-pill form-color">
                                <option>Roti & Kue</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Deskripsi</label>
                            <textarea class="form-control text-area auth no-border form-color" id="exampleFormControlTextarea1" rows="3"></textarea>
                        </div>


                    </div>
                    <div class="col-7">

                        <div class="container-textarea">
                            <div class="form-group">
                                <textarea class="form-control" name="konten" id="trumbowyg-text" require autocomplete="FALSE"></textarea>
                            </div>
                        </div>
                        <div class="row justify-content-end">
                            <a class="aksi px-4 pt-2 rounded-pill button-text no-decor black-text-color" href="/view/resep/tambah_resep.php">Batalkan</a>
                            <button type="submit" class="btn primary-color px-3 py-2 rounded-pill ml-4" value="">Simpan </button>
                        </div>

                    </div>


                </div>
            </div>
        </div>
    </form>


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
    <script src="//ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="/js/trumbowyg.min.js"></script>
    <script>
        $.trumbowyg.svgPath = '/style/icons.svg';
    </script>
    <script type="text/javascript">
        $('#trumbowyg-text').trumbowyg()
    </script>
</body>

</html>