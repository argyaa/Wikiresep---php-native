<?php
function dbConnect()
{
    $connect = new mysqli("localhost", "root", "", "wikiResep");
    return $connect;
}

function getKategori()
{
    $db = dbConnect();
    $sql = "SELECT * from kategori";
    $res = $db->query($sql);
    $data = $res->fetch_all(MYSQLI_ASSOC);
    $res->free();
    return $data;
}

function getDataResepFromId($id)
{
    $db = dbConnect();
    $sql = "SELECT resep.id, judul, konten, username, nama, gambar, deskripsi, id_kategori from resep
    JOIN user ON resep.id_user = user.id
    JOIN kategori ON resep.id_kategori = kategori.id
    WHERE resep.id = $id";
    $res = $db->query($sql);
    $data = $res->fetch_all(MYSQLI_ASSOC);
    $res->free();
    return $data;
}

function getDataResep()
{
    $db = dbConnect();
    $sql = "SELECT resep.id, judul, konten, username, nama, gambar, deskripsi from resep
    JOIN user ON resep.id_user = user.id
    JOIN kategori ON resep.id_kategori = kategori.id";
    $res = $db->query($sql);
    $data = $res->fetch_all(MYSQLI_ASSOC);
    $res->free();
    return $data;
}
