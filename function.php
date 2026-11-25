<?php
session_start();
// $conn = mysqli_connect("sql309.infinityfree.com", "if0_42799969", "gudangrazi12345", "if0_42799969_db_barang");
$conn = mysqli_connect("localhost", "root", "", "db_barang");
if (isset($_POST['addnewbarang'])) {
    $nama_barang = $_POST['nama_barang'];
    $deskripsi = $_POST['deskripsi'];
    $stock = $_POST['stock'];

    $addtotable = mysqli_query($conn, "INSERT INTO stock (nama_barang, deskripsi, stock)values('$nama_barang','$deskripsi','$stock')");

    if ($addtotable) {
        header('location:stock.php');
    } else {
        echo 'gagal menambah data';
        header('location:stock.php');
    }
}

if (isset($_POST['barangmasuk'])) {
    $barangnya = $_POST['barangnya'];
    $penerima = $_POST['penerima'];
    $qty = $_POST['qty'];

    $cekstocksekarang = mysqli_query($conn, "SELECT * FROM stock WHERE id_barang = '$barangnya'");
    $ambildatanya = mysqli_fetch_array($cekstocksekarang);

    $cekstocksekarang = $ambildatanya['stock'];
    $tambahkanstocksekarangdenganquantity = $cekstocksekarang + $qty;

    $addtomasuk = mysqli_query($conn, "INSERT INTO masuk (barang_id, keterangan, qty) values ('$barangnya','$penerima', '$qty')");
    $updatestockmasuk = mysqli_query($conn, "UPDATE stock SET stock  = '$tambahkanstocksekarangdenganquantity' WHERE id_barang = '$barangnya'");

    if ($addtomasuk && $updatestockmasuk) {
        header('location:masuk.php');
    } else {
        echo 'gagal menambah data';
        header('location:masuk.php');
    }
}

if (isset($_POST['addbarangkeluar'])) {
    $barangnya = $_POST['barangnya'];
    $penerima = $_POST['penerima'];
    $qty = $_POST['qty'];

    $cekstocksekarang = mysqli_query($conn, "SELECT * FROM stock WHERE id_barang = '$barangnya'");
    $ambildatanya = mysqli_fetch_array($cekstocksekarang);

    $cekstocksekarang = $ambildatanya['stock'];
    $tambahkanstocksekarangdenganquantity = $cekstocksekarang - $qty;

    $addtokeluar = mysqli_query($conn, "INSERT INTO keluar (barang_id, penerima, qty) values ('$barangnya','$penerima', '$qty')");
    $updatestockmasuk = mysqli_query($conn, "UPDATE stock SET stock  = '$tambahkanstocksekarangdenganquantity' WHERE id_barang = '$barangnya'");

    if ($addtokeluar && $updatestockmasuk) {
        header('location:keluar.php');
    } else {
        echo 'gagal menambah data';
        header('location:keluar.php');
    }
}
