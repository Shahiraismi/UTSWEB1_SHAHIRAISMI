<?php
session_start();

// Pastikan user sudah login
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard - POLGAN MART</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f6f9;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            background: white;
            margin: 80px auto;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            text-align: center;
        }
        h2 {
            color: #0066ff;
            margin-bottom: 15px;
        }
        .welcome {
            font-size: 18px;
            margin-bottom: 20px;
        }
        a.logout {
            display: inline-block;
            background: #dc3545;
            color: white;
            text-decoration: none;
            padding: 10px 18px;
            border-radius: 6px;
            font-weight: bold;
        }
        a.logout:hover {
            background: #b02a37;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>-- POLGAN MART --</h2>
    <p class="welcome">Selamat datang, <b><?= $_SESSION['username']; ?></b> 👋</p>
    <a href="logout.php" class="logout">Logout</a>
</div>
<?php
    // Commit 6 – Logika Penjualan Random
    $beli = [];
    $jumlah = [];
    $total = [];
    $grandtotal = 0;

    for ($i = 0; $i < 5; $i++) {
        $beli[$i] = $nama_barang[$i];
        $jumlah[$i] = rand(1, 5);
        $total[$i] = $harga_barang[$i] * $jumlah[$i];
        $grandtotal += $total[$i];
    }
    ?>

    <table>
        <tr>
            <th>No</th>
            <th>Kode Barang</th>
            <th>Nama Barang</th>
            <th>Harga</th>
            <th>Jumlah</th>
            <th>Total</th>
        </tr>

 <?php

        // Commit 7 – Perhitungan Total (foreach)
        $no = 1;
        foreach ($beli as $i => $barang) {
            echo "<tr>";
            echo "<td>$no</td>";
            echo "<td>{$kode_barang[$i]}</td>";
            echo "<td>$barang</td>";
            echo "<td>Rp " . number_format($harga_barang[$i], 0, ',', '.') . "</td>";
            echo "<td>{$jumlah[$i]}</td>";
            echo "<td>Rp " . number_format($total[$i], 0, ',', '.') . "</td>";
            echo "</tr>";
            $no++;
        }
        ?>
</body>
</html>