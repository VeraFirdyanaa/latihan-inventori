<?php
// include database connection file
include_once("koneksi/config.php");

// Check if form is submitted for user update, then redirect to homepage after update
if(isset($_POST['update']))
{   
    $id = $_POST['id'];
    $barang=$_POST['barang'];
    $kuantity =$_POST['qty'];
    $sat =$_POST['satuan'];
    $tip =$_POST['tipe'];
    $gud =$_POST['gudang'];

    // update user data
    $result = mysqli_query($koneksi, "UPDATE barang
         SET nama_barang='$barang',qty='$kuantity',satuan='$sat',
         tipe_id=$tip,gudang_id=$gud WHERE barang_id=$id");

    // Redirect to homepage to display updated user in list
    header("Location: index.php");
}
?>
<?php
// Display selected user data based on id
// Getting id from url
$id = $_GET['id'];

// Fetech Barang data based on id
$result = mysqli_query($koneksi, "SELECT * FROM barang WHERE barang_id=$id");

    // Fetch all tipe data from database
    $tipe = mysqli_query($koneksi, "SELECT * FROM tipe 
                            order by tipe_id DESC");

    // Fetch all tipe data from database
    $gudang = mysqli_query($koneksi, "SELECT * FROM gudang 
                            order by gudang_id DESC");

while($user_data = mysqli_fetch_array($result))
{
    $nama = $user_data['nama_barang'];
    $qty = $user_data['qty'];
    $satuan = $user_data['satuan'];
    $tipe_id = $user_data['tipe_id'];
    $gudang_id = $user_data['gudang_id'];
}
?>
<html>
<head>  
    <title>Edit User Data</title>
</head>

<body>
    <a href="index.php">Home</a>
    <br/><br/>

    <form name="update_user" method="post" action="edit.php">
        <table border="0">
            <tr> 
                <td>Nama Barang</td>
                <td><input type="text" name="barang" value="<?php echo $nama;?>"   ></td>
            </tr>
            <tr> 
                <td>Qty</td>
                <td><input type="text" name="qty" value="<?php echo $qty;?>"></td>
            </tr>
            <tr> 
                <td>Satuan</td>
                <td><input type="text" name="satuan" value="<?php echo $satuan;?>"></td>
            </tr>
            <tr> 
                <td>Tipe</td>
                <td>
                <select name="tipe" id="tipe">
                <option>pilih tipe</option>
                    <?php
                    while($data_tipe = mysqli_fetch_array($tipe)) {
                    ?>
                        <option value="<?php echo $data_tipe['tipe_id']?>"
                        <?php
                            if($data_tipe['tipe_id'] === $tipe_id){
                                echo 'selected="selected"';
                            }
                        ?>
                        >
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
                        <option value="<?php echo $data_gudang['gudang_id']?>"
                        <?php
                            if($data_gudang['gudang_id'] === $gudang_id){
                                echo 'selected="selected"';
                            }
                        ?>
                        >
                        <?php echo $data_gudang['nama_gudang']?></option>
                    <?php
                        }
                    ?>
                </select></td>
            </tr>
            <tr>
                <td><input type="hidden" name="id" value="<?php echo $_GET['id'];?>"></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
</body>
</html>