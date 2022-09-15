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
            <div class="page-inner">
                <div class="page-header">
                    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                        <div>
                            <h1 class="pb-2 fw-bold">Arsip Surat >> Edit Surat </h1>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Edit Surt</h4>
                            </div>
                            <div class="card-body">
                                <!-- Horizontal Form -->
                                <?php   
                                include 'koneksi.php';
                                $surat = mysqli_query($con, "SELECT * from surat WHERE id = $id");
                                foreach ($surat as $data){
                            ?>
                                <form action="prosesedit.php" method="POST" enctype="multipart/form-data">
                                    <div class="row mb-3">
                                        <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
                                        <input type="hidden" name="filelama" value="<?php echo $data['file']; ?>">
                                        <label for="inputEmail3" class="col-sm-2 col-form-label">Nomor Surat</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="nomor"
                                                value="<?php echo $data['nomor']; ?>">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="inputEmail3" class="col-sm-2 col-form-label">Kategori</label>
                                        <div class="col-sm-10">
                                            <select id="inputState" class="form-control form-control" name="kategori">
                                                <?php
                                                if ($data['kategori'] == 'Undangan') {
                                                    echo "<option selected>Undangan</option>
                                                          <option>Pengumuman</option>
                                                          <option>Nota Dinas</option>
                                                          <option>Pemberitahuan</option>";
                                                } elseif ($data['kategori'] == 'Pengumuman') {
                                                    echo "<option>Undangan</option>
                                                                                                                        <option selected>Pengumuman</option>
                                                                                                                        <option>Nota Dinas</option>
                                                                                                                        <option>Pemberitahuan</option>";
                                                } elseif ($data['kategori'] == 'Nota Dinas') {
                                                    echo "<option>Undangan</option>
                                                                                                                        <option>Pengumuman</option>
                                                                                                                        <option selected>Nota Dinas</option>
                                                                                                                        <option>Pemberitahuan</option>";
                                                } else {
                                                    echo "<option>Undangan</option>
                                                                                                                        <option>Pengumuman</option>
                                                                                                                        <option>Nota Dinas</option>
                                                                                                                        <optionselected>Pemberitahuan</option";
                                                }
                                                ?>

                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="inputEmail3" class="col-sm-2 col-form-label">Judul</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="judul"
                                                value="<?php echo $data['judul']; ?>">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="inputPassword3" class="col-sm-2 col-form-label">File Surat
                                            (PDF)</label>
                                        <div class="col-sm-10">
                                            <input type="file" name="file" class="form-control"
                                                value="<?php echo $data['file']; ?>">
                                        </div>
                                    </div>
                                    <div class="text-left"><?php echo $data['file']; ?></div>
                                    <iframe src="<?php echo $data['file']; ?>" width="100%" style="height:100%"></iframe>
                                    <div class="text-left">
                                        <a href="index.php"><button type="button" class="btn-secondary">
                                                << Kembali</button></a>
                                        <button type="submit" class="btn-primary">Simpan</button>
                                    </div>
                                </form><!-- End Horizontal Form -->
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
    </div>
    <!-- End content -->
    <!-- Custom template | don't include it in your project! -->
    <?php include 'include/custom.php'; ?>
    <!-- End Custom template -->
    </div>
    <?php include 'include/script.php'; ?>
</body>

</html>
