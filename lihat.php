<?php
$id = $_GET['id'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'include/head.php'; ?>
</head>

<body>
    <!-- header -->
    <?php include 'include/header.php'; ?>
    <!-- endheader -->
    <!-- Sidebar -->
    <?php include 'include/sidebar.php'; ?>
    <!-- End Sidebar -->
    <!-- content -->
    <div class="main-panel">
        <div class="content">
            <?php   
						include 'koneksi.php';
						$surat = mysqli_query($con, "SELECT * from surat WHERE id = $id");
						foreach ($surat as $data){
					?>
            <div class="page-inner">
                <div class="page-header">
                    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                        <div>
                            <h1 class="pb-2 fw-bold">Arsip Surat >> Lihat </h1>
                            <br>
                            <h1 class="pb-2 fw-bold">Detail Surat </h1>
                            <h5 class="card-title"></h5>
                            <h5>Nomor : <?php echo $data['nomor']; ?></h5>
                            <h5>Kategori : <?php echo $data['kategori']; ?></h5>
                            <h5>Judul : <?php echo $data['judul']; ?></h5>
                            <h5>Waktu Unggah : <?php echo $data['waktu']; ?></h5>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Detail Isi Surat</h4>
                            </div>
                            <div class="card-body">
                                <iframe src="<?php echo $data['file']; ?>" width="100%" style="height:500px"></iframe>
                            </div>
                            <br>
                            <br>
                            <div class="text-left">
                                <a href="index.php"><button type="button"  class="btn-primary">
                                        << Kembali</button></a>
                                <a href="<?php echo $data['file']; ?>"><button class="btn-danger">Unduh</button></a>
                                <a href="edit.php?id=<?php echo $data['id']; ?>"><button type="button" class="btn-warning">Edit / Ganti
                                        File</button></a>
                            </div>
                            <br>
                            <?php
								}
							?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    </div>
    <!-- End content -->
    <!-- Custom template | don't include it in your project! -->
    <?php include 'include/custom.php'; ?>
    <!-- End Custom template -->
    </div>
    <?php include 'include/script.php'; ?>
</body>

</html>
