<?php

    $con = mysqli_connect("localhost", "root", "", "toko_online");

    // chek connection
    if (mysqli_connect_errno()) {
        die("Koneksi database gagal: " . mysqli_connect_error());
    }

?>