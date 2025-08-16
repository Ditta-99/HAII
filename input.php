<?php

define('FILE_JSON' , 'databarang.json');
function cekFileJson() {
    if (!file_exists(FILE_JSON)) {
        file_put_contents(FILE_JSON, json_encode([]));
    }
}

function bacaDataJson() {
    return json_decode(file_get_contents(FILE_JSON), true);

}

if($_SERVER['REQUEST_METHOD'] == 'POST') {

    cekFileJson();


    $kode= $_POST['kode'];
    $nama= $_POST['nama'];
    $jumlah= $_POST['jumlah'];
    $tanggal= $_POST['tanggal'];
    $kategori= $_POST['kategori'];

    $data_barang = bacaDataJson();

   
    $data_barang [] = [
            'kode'  => $kode,
            'nama'  => $nama,
            'jumlah'  => $jumlah,
            'tanggal'  => $tanggal,
            'kategori'  => $kategori
    ];

    file_put_contents(FILE_JSON, json_encode($data_barang, JSON_PRETTY_PRINT));

 echo "<script>alert('barang berhasil ditambahkan!');</script>";

 echo"<script>window.location.href = 'view.php'</script>";
}


?>

