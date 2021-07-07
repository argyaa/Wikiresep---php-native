<?php
function dbConnect()
{
    $connect = new mysqli("localhost", "root", "", "wikiResep");
    return $connect;
}
