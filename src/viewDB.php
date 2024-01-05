<?php
include "db.php";
$result = fetchDataFromDatabase(); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/dist/output.css" rel="stylesheet">
    <title>Database</title>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">
    <div class="bg-white p-8 rounded shadow-lg max-w-2xl mx-auto w-full">
        <h2 class="text-3xl font-bold mb-6 text-center text-gray-700">Tabel Database</h2>

        <table class="w-full mb-4 bg-gray-200 rounded">
            <tr class="bg-gray-300">
                <th class="py-2">Nama Produk</th>
                <th class="py-2">Harga</th>
                <th class="py-2">Jumlah</th>
                <th class="py-2">Subtotal</th>
            </tr>

            <?php
            if ($result->num_rows > 0){
                while ($row = $result->fetch_assoc()){
                    echo "<tr>";
                    echo "<td>" . $row["product"] . "</td>";
                    echo "<td>" . $row["price"] . "</td>";
                    echo "<td>" . $row["quantity"] . "</td>";
                    echo "<td>" . $row["subtotal"] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='4'>Tidak ada data dalam tabel</td></tr>";
            }
            ?>
        </table>

        <a href="Index.php" class="bg-blue-500 hover:bg-blue-700 text-white px-4 py-2 rounded mb-4 inline-block">Kembali</a>
    </div>
</body>
</html>