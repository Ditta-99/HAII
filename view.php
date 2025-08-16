<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.html">INPUT BARANG</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link" aria-current="page" href="view.php">DATA BARANG</a>
                </div>
            </div>
        </div>
    </nav>

   </html>

<?php
define('FILE_JSON', 'databarang.json');

function cekFileJson() {
       if (!file_exists(FILE_JSON)) {
             file_put_contents(FILE_JSON, json_encode([]));
        }

        $json = file_get_contents(FILE_JSON);
        return json_decode(file_get_contents(FILE_JSON), true);

}

$data_barang = cekFileJson();
$total_data = count($data_barang);

if ($total_data == 0) {
    echo "<p>Belum ada barang yang disimpan </p>";

} else {
    echo "<table border= '1'>
     <div class='mt-5'></div>
    <h3 class='text-center'>SISTEM PENDATAAN INVENTARIS BARANG</h3>
    <tr>
            <th>NO</th>
            <th>KODE BARANG</th>
            <th>NAMA BARANG</th>
            <th>JUMLAH STOK</th>
            <th>TANGGAL MASUK</th>
            <th>KATEGORI BARANG</th>
             <th>AKSI</th>


    </tr>";

    for ($i = 0; $i < $total_data; $i++) 
    {
            $barang = $data_barang[$i];

            // Menampilkan No
            echo "<tr><td>" .($i + 1) . "</td>";

            // Menampilkan kode produk 
            echo "<td class='text-center'>" . htmlspecialchars($barang['kode']) . "</td>";

            // Menampilkan nama produk
            echo "<td class='text-center'>" . htmlspecialchars($barang['nama']) . "</td>";

              // Menampilkan jumlah produk
            echo "<td class='text-center'>" . htmlspecialchars($barang['jumlah']) . "</td>";

              // Menampilkan tanggal produk
            echo "<td class='text-center'>" . htmlspecialchars($barang['tanggal']) . "</td>";

              // Menampilkan kategori produk
            echo "<td class='text-center'>" . htmlspecialchars($barang['kategori']) . "</td>";
          
         
            echo "<td>
            <a href='#' class='btn btn-warning'>Edit<i class='bi bi-pencil-square'></i></a>
            <a href='#' class='btn btn-danger'>Hapus<i class='bi bi-trash'></i></a>
            </td>";
    }
    echo "</table>";
    echo "<center><button onclick=\"window.location.href='index.html'\">+</button></center>";

}

    
    



