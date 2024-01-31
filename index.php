<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'db_crud';

$koneksi = mysqli_connect($host, $user, $pass, $db);

//insert
if(isset($_POST['bsimpan'])){
    //update2 _tombol simpan-edit 
    if(isset($_GET['hal']) == "edit"){
    $edit = mysqli_query($koneksi, "UPDATE tbarang SET 
                                           nama_barang = '$_POST[nama_barang]',
                                           jumlah_pesan = '$_POST[jumlah_pesan]',
                                           tanggal_diterima = '$_POST[tanggal_diterima]',
                                           harga = '$_POST[harga]'
                                    WHERE id_barang = '$_GET[id]'           
                                   ");
     if($edit) {
        echo "<script>
                alert('edit pesanan tersimpan!');
                document.location='index.php';
            </script>";
    } else {
        echo "<script>
                alert('edit pesanan gagal!');
                document.location='index.php';
             </script>";
    }
}else {   $simpan = mysqli_query($koneksi, " INSERT INTO tbarang (id_barang, nama_barang, jumlah_pesan, tanggal_diterima, harga)
                                            VALUE ( '$_POST[id_barang]',
                                                    '$_POST[nama_barang]',
                                                    '$_POST[jumlah_pesan]',
                                                    '$_POST[tanggal_diterima]',
                                                    '$_POST[harga]')
                                        ");

    if($simpan) {
        echo "<script>
            alert('pesanan tersimpan!');
            document.location='index.php';
        </script>";
    } else {
        echo "<script>
            alert('pesanan gagal!');
            document.location='index.php';
        </script>";
    }
}
}

//dek variabel untuk update
$vid_barang = '';
$vnama_barang = '';
$vjumlah_pesan = '';
$vtanggal_diterima = '';
$vharga = '';

//update
if(isset($_GET['hal'])){
    if($_GET['hal'] == "edit"){
        $tampil = mysqli_query($koneksi, "SELECT * FROM tbarang WHERE id_barang='$_GET[id]' ");
        $data = mysqli_fetch_array($tampil);
        if($data){
            $vid_barang = $data['id_barang'];
            $vnama_barang = $data['nama_barang'];
            $vjumlah_pesan= $data['jumlah_pesan'];
            $vtanggal_diterima = $data['tanggal_diterima'];
            $vharga = $data['harga'];
        }
        
        //delete 
    }else if($_GET['hal'] == "hapus"){
        $hapus = mysqli_query($koneksi, "DELETE FROM tbarang WHERE id_barang='$_GET[id]'");
        if($hapus) {
            echo "<script>
                alert('pesanan terhapus!');
                document.location='index.php';
            </script>";
        } else {
            echo "<script>
                alert('pesanan gagal terhapus!');
                document.location='index.php';
            </script>";
        }
    }
}

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>crud php & mysql toko mie indomie instan</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>
  <div class="container">
    <h2 class="text-center">TOKO MIE INSTAN DALIMA</h2>
    <!-- awal row -->
    <div class="row">
        <!-- awal col -->
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-danger text-light">
                 Form Input Pemesanan Mie Indomie
                </div>
                <div class="card-body">
                    <!-- awal form -->
                    <form action="" method="post">
                    <div class="mb-2">
                        <label class="form-label">Id barang</label>
                        <input type="text" name="id_barang" value="<?=$vid_barang?>" class="form-control" placeholder="input id barang">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nama barang</label>
                        <input type="text" name="nama_barang" value="<?=$vnama_barang?>" class="form-control" placeholder="input nama barang">
                    </div>
                    <div class="row">
                        <div class="col">
                        <div class="mb-3">
                        <label class="form-label">Jumlah pesanan</label>
                        <input type="text" name="jumlah_pesan" value="<?=$vjumlah_pesan?>" class="form-control" placeholder="input jumlah barang">
                    </div>
                    </div>
                    </div>
                    <div class="row">
                    <div class="col">
                        <div class="mb-3">
                        <label class="form-label">Tanggal diterima</label>
                        <input type="date" name="tanggal_diterima" value="<?=$vtanggal_diterima?>" class="form-control" placeholder="input tanggal diterima barang">
                        </div>
                    </div>
                    </div>
                    <div class="row">
                    <div class="col">
                        <div class="mb-3">
                        <label class="form-label">harga satuan</label>
                        <input type="text" name="harga" value="<?=$vharga?>" class="form-control" placeholder="input harga barang">
                        </div>
                    </div>

                    <div class="text-center">
                        <hr>
                        <button class="btn btn-outline-danger" name="bsimpan" type="submit">Simpan</button>
                        

                    </div>
                        </div>
                    </form>
                    <!-- akhir form -->
                </div>
                <div class="card-footer bg-danger">
            
                </div>
            </div>
                <!-- akhir card -->
         </div>
<div class="card">
        <div class="card-header bg-danger text-light">
            Data Pemesanan Barang
        </div>
        <div class="card-body">
            <div class="col-md-6">
                <form action="" method="POST">
                </form>
            </div>

            <table class="table table-danger table-stirped table-hover tabel-bordered">
                <tr>
                    <th>No.</th>
                    <th>Id barang</th>
                    <th>Nama barang</th>
                    <th>Jumlah pesanan</th>
                    <th>Tanggal diterima</th>
                    <th>Total harga</th>
                    <th>Aksi</th>
                </tr>
                <?php

                //select
                $no = 1;
                $tampil = mysqli_query($koneksi, "SELECT * FROM tbarang order by id_barang desc");
                while ($data = mysqli_fetch_array($tampil)) :
                $total = $data['harga'] * $data['jumlah_pesan'];
                ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $data['id_barang']?></td>
                    <td><?= $data['nama_barang']?></td>
                    <td><?= $data['jumlah_pesan']?><?php echo " dus"?></td>
                    <td><?= $data['tanggal_diterima']?></td>
                    <td><?= "Rp " . number_format($total,0,',','.'); ?></td>
                    <td>
            
                        <a href="index.php?hal=edit&id=<?=$data['id_barang']?>" class="btn btn-warning">Edit</a>
                        <a href="index.php?hal=hapus&id=<?=$data['id_barang']?>" class="btn btn-success" onclick="return confirm('apakah anda yakin ingin menghapus pemesanan?')">Hapus</a>
                    </td>
                </tr>

                <?php endwhile;?>
            </table>
           
        </div>
        <div class="card-footer bg-danger">
            
        </div>
</div>
</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>