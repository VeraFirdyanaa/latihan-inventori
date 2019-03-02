<?php
// Create database connection using config file
include_once("koneksi/config.php");

// Fetch all barang data from database
$result = mysqli_query($koneksi, "SELECT 
                a.barang_id,a.nama_barang,a.qty,a.satuan,
                b.nama_tipe,
                c.nama_gudang 
            from barang a 
                LEFT join tipe b 
                on a.tipe_id = b.tipe_id 
                LEFT JOIN gudang c 
                ON a.gudang_id = c.gudang_id 
                order by a.barang_id ASC");
?>

<html>
<head>    
    <title>Homepage</title>
</head>

<body>
<a href="add.php">Add New Barang</a>||<a href="tipe.php"> Tipe</a>||<a href="gudang.php"> Gudang</a><br/><br/>

    <table width='80%' border=1>

    <tr>
        <th>No.</th>
        <th>Nama Barang</th>
        <th>Qty</th>
        <th>Satuan</th>
        <th>Tipe</th>
        <th>Gudang</th>
        <th>Update</th>
    </tr>
    <?php 
    $no = 1; 
    while($user_data = mysqli_fetch_array($result)) {        
        echo "<tr>";
        echo "<td>".$no."</td>";
        echo "<td>".$user_data['nama_barang']."</td>";
        echo "<td>".$user_data['qty']."</td>";
        echo "<td>".$user_data['satuan']."</td>";
        echo "<td>".$user_data['nama_tipe']."</td>"; 
        echo "<td>".$user_data['nama_gudang']."</td>";    
        echo "<td><a href='edit.php?id=$user_data[barang_id]'>Edit</a> 
                || <a href='delete.php?id=$user_data[barang_id]'>Delete</a></td></tr>";        
    $no++;}
    ?>
    </table>
</body>
</html>