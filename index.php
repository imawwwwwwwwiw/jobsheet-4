<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'db_crud';

$koneksi = mysqli_connect($host, $user, $pass, $db);
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
        <div class="col-md-4">
            <div class="card">
                <div class="card-header bg-danger text-light">
                 Form Input Pemesanan Mie Indomie
                </div>
                <div class="card-body">
                    <!-- awal form -->
                    <form action="" method="post">
                    <div class="mb-2">
                        <label class="form-label">Id barang</label>
                        <input type="text" nama="id_barang" class="form-control" placeholder="input id barang">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nama barang</label>
                        <input type="text" nama="nama_barang" class="form-control" placeholder="input nama barang">
                    </div>
                    <div class="row">
                        <div class="col">
                        <div class="mb-3">
                        <label class="form-label">Jumlah pesanan</label>
                        <input type="number" nama="jumlah_pesan" class="form-control" placeholder="input jumlah barang">
                    </div>
                        </div>
                    <div class="col">
                        <div class="mb-3">
                        <label class="form-label">Tanggal diterima</label>
                        <input type="date" nama="tanggal_diterima" class="form-control" placeholder="input tanggal diterima barang">
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
                    <th>Aksi</th>
                </tr>
               
            </table>
           
        </div>
        <div class="card-footer bg-danger">
            
        </div>
</div>
</div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>