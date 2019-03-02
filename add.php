<?php
    include_once("koneksi/config.php");

    // Fetch all tipe data from database
    $tipe = mysqli_query($koneksi, "SELECT * FROM tipe 
                            order by tipe_id DESC");

    // Fetch all tipe data from database
    $gudang = mysqli_query($koneksi, "SELECT * FROM gudang 
                            order by gudang_id DESC");
?>
<html>
<head>
    <title>Add Barang</title>
</head>

<body>
    <a href="index.php">Go to Home</a>
    <br/><br/>

    <form action="add.php" method="post" name="form1">
        <table width="25%" border="0">
            <tr> 
                <td>Nama Barang</td>
                <td><input type="text" name="nama_barang"></td>
            </tr>
            <tr> 
                <td>Qty</td>
                <td><input type="number" name="qty"></td>
            </tr>
            <tr> 
                <td>Satuan</td>
                <td><input type="text" name="satuan"></td>
            </tr>
            <tr> 
                <td>Tipe</td>
                <td>
                <select name="tipe" id="tipe">
                <option>pilih tipe</option>
                    <?php
                    while($data_tipe = mysqli_fetch_array($tipe)) {
                    ?>
                        <option value="<?php echo $data_tipe['tipe_id']?>">
                        <?php echo $data_tipe['nama_tipe']?></option>
                    <?php
                        }
                    ?>
                </select>
                
                </td>
            </tr>
            <tr> 
                <td>Gudang</td>
                <td><select name="gudang" id="gudang">
                        <option>pilih gudang</option>
                    <?php
                    while($data_gudang = mysqli_fetch_array($gudang)) {
                    ?>
                        <option value="<?php echo $data_gudang['gudang_id']?>">
                        <?php echo $data_gudang['nama_gudang']?></option>
                    <?php
                        }
                    ?>
                </select></td>
            </tr>
            <tr> 
                <td></td>
                <td><input type="submit" name="Submit" value="Add"></td>
            </tr>
        </table>
    </form>

    <?php

    // Check If form submitted, insert form data into users table.
    if(isset($_POST['Submit'])) {
        $barang = $_POST['nama_barang'];
        $qty = $_POST['qty'];
        $satuan = $_POST['satuan'];
        $tipe = $_POST['tipe'];
        $gudang = $_POST['gudang'];

        // include database connection file
        include_once("koneksi/config.php");

        // Insert user data into table
        $result = mysqli_query($koneksi, 
                    "INSERT INTO barang (nama_barang,qty,satuan,gudang_id,tipe_id) 
                    VALUES('$barang','$qty','$satuan',$tipe,$gudang)");

        // Show message when user added
        echo "Barang added successfully. <a href='index.php'>View Barang</a>";
    }
    ?>
</body>
</html>