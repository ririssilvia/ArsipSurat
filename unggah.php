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
            <div class="page-inner">
                <div class="page-header">
                    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                        <div>
                            <h1 class="pb-2 fw-bold">Arsip Surat >> Unggah</h1>
                            <h5 class="op-7 mb-2">Unggah surat yang telah terbit pada form ini untuk diarsipkan</h5>
                            <h5 class="op-7 mb-2">Catatan :</h5>
                            <h5 class="op-7 mb-2">
                                <ul>
                                    <li>Gunakan File dengan Format PDF</li>
                                </ul>
                            </h5>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Form Unggah Surat</h4>

                            </div>
                            <div class="card-body">
                                <h5 class="card-title"></h5>
                                <!-- Horizontal Form -->
                                <form action="add.php" method="POST" enctype="multipart/form-data">
                                    <div class="row mb-3">
                                        <label for="inputEmail3" class="col-sm-2 col-form-label">Nomor Surat</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="nomor">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="inputEmail3" class="col-sm-2 col-form-label">Kategori</label>
                                        <div class="col-sm-10">
                                            <select class="form-control form-control" name="kategori">
                                                <option selected>Undangan</option>
                                                <option>Pengumuman</option>
                                                <option>Nota Dinas</option>
                                                <option>Pemberitahuan</option>
                                            </select>
                                        </div>
                                    </div>
                                    
                                    <div class="row mb-3">
                                        <label for="inputEmail3" class="col-sm-2 col-form-label">Judul</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="judul">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="inputPassword3" class="col-sm-2 col-form-label">File Surat
                                            (PDF)</label>
                                        <div class="col-sm-10">
                                            <input type="file" name="file" class="form-control">
                                        </div>
                                    </div>
                                    <div class="text-left">
                                        <a href="index.php"><button type="button" class="btn-secondary">
                                                << Kembali</button></a>
                                        <button type="submit" class="btn-primary">Simpan</button>
                                    </div>
                                </form><!-- End Horizontal Form -->

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
