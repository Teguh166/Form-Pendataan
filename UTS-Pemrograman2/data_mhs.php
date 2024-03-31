<?php include "template/header.php";
include "config.php";
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="data-mhs.css">
    <title>Data mahasiswa</title>
</head>
<body>
    <div class="main">
    <h1>DATA MAHASISWA</h1>
        <div class="card">
            <form class="input-group" method="post" action="">
                <h2 align="center">INPUT DATA</h2>
                <table class="tb">
                    <tr>
                        <td class="label">NIM</td>
                        <td>
                            <input class="txt" type="text" name="nim" placeholder="NIM" required>
                        </td>
                    </tr>
                    <tr>
                        <td class="label">NAMA</td>
                        <td>
                            <input class="txt" type="text" name="nama" placeholder="Nama">
                        </td>
                    </tr>
                    <tr>
                        <td class="label" rowspan="3">JENIS KELAMIN</td>
                    <tr>
                        <td>
                            <input class="txt-r" type="radio" name="kelamin" value="L"> L
                        </td>
                    </tr>
                    <tr>
                        <td>
                        <input class="txt-r" type="radio" name="kelamin" value="P"> P
                        </td>
                    </tr>
                    </tr>
                    <tr>
                        <td class="label">TEMPAT LAHIR</td>
                        <td>
                            <input class="txt" type="text" name="tempat_lahir" placeholder="Tempat Lahir">
                        </td>
                    </tr>
                    <tr>
                        <td class="label">TANGGAL LAHIR</td>
                        <td>
                            <input class="txt" type="date" name="tanggal_lahir" placeholder="Tanggal_Lahir">
                        </td>
                    </tr>
                    <tr>
                        <td class="label">ALAMAT</td>
                        <td><textarea class="txtarea" name="alamat" placeholder="Alamat"></textarea></td>
                    </tr>
                    <tr>
                        <td colspan="2">
                        <input type="submit" class="btn" name="save" value="Simpan Data"></input>
                        </td>
                        <td>
                        </td>
                    </tr>
                </table>
            </form>
        </div>
        <!---TABEL DATA-------------------------------->
        <div class="data">
            <form>
                <table class="tb-data" border="1" cellpadding="6" cellspacing="0">
                    <thead>
                        <tr>
                            <th width="20px">No.</th>
                            <th width="50px">NIM</th>
                            <th width="100px">Nama</th>
                            <th width="40px">Jenis Kelamin</th>
                            <th width="40px">Tempat Lahir</th>
                            <th width="80px">Tanggal lahir</th>
                            <th width="100px">Alamat</th>
                            <th width="80px" colspan="2">Aksi</th>
                        </tr>
                    </thead>
                        <?php
                        include 'config.php';
                        $no=1;
                        $data_mhs = mysqli_query($koneksi,"SELECT * FROM tb_mahasiswa order by nama asc");

                        while($tampil = mysqli_fetch_array($data_mhs)){
                            echo "
                            <tbody class='tdata'>
                            <tr>
                                <td align='center'>$no</td>
                                <td align='center'>$tampil[nim]</td>
                                <td>$tampil[nama]</td>
                                <td align='center'>$tampil[kelamin]</td>
                                <td align='center'>$tampil[tempat_lahir]</td>
                                <td>$tampil[tanggal_lahir]</td>
                                <td>$tampil[alamat]</td>
                                <td>
                                    <a href='?hapus=$tampil[nim]'>
                                        <input class='hapus' type='button' value='Hapus'>
                                    </a>
                                </td>
                                <td>
                                    <a href='?edit=$tampil[nim]'>
                                        <input class='edit' type='button' value='Ubah'>
                                    </a>
                                </td>
                            </tr>
                            </tbody>";
                            $no++;
                            }
                        ?>
                </table>
            </form>
            <?php
                if(isset($_GET['hapus'])){
                    mysqli_query($koneksi,"DELETE FROM tb_mahasiswa WHERE nim='$_GET[hapus]'")
                    or die (mysqli_error($koneksi));

                    echo "Data telah terhapus";
                    echo "<script>window.location='data_mhs.php'</script>";
                }
            ?>
        </div>
    </div>
</body>
</html>

<?php
if(isset($_POST['save'])){
    $nim = mysqli_real_escape_string($koneksi, $_POST['nim']);
    $nama = mysqli_real_escape_string($koneksi, $_POST['nama']);
    $kelamin = mysqli_real_escape_string($koneksi, $_POST['kelamin']);
    $tempat_lahir = mysqli_real_escape_string($koneksi, $_POST['tempat_lahir']);
    $tanggal_lahir = mysqli_real_escape_string($koneksi, $_POST['tanggal_lahir']);
    $alamat = mysqli_real_escape_string($koneksi, $_POST['alamat']);

    $simpan=mysqli_query($koneksi,"INSERT INTO tb_mahasiswa VALUES ('$nim', '$nama',
            '$kelamin', '$tempat_lahir','$tanggal_lahir', '$alamat')");
    if($simpan){
        echo "Data berhasil ditambahkan";
        echo "<script>window.location='data_mhs.php'</script>";
    
    }else{
        echo "Data gagal ditambahkan";
        echo "<script>window.location='data_mhs.php'</script>";
    }
}
?>