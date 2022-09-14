<!DOCTYPE html>
<html lang="en">
<head>
<?php include("include/head.php") ?>
</head>
<body>
	<div class="wrapper">
		<!-- header -->
		<?php include("include/header.php") ?>
		<!-- endheader -->

		<!-- Sidebar -->
		<?php include("include/sidebar.php") ?>
		<!-- End Sidebar -->
		<div class="main-panel">
			<div class="content">
				<div class="panel-header bg-primary-gradient">
					<div class="page-inner py-5">
						<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
							<div>
								<h2 class="text-white pb-2 fw-bold">Arsip Surat</h2>
								<h5 class="text-white op-7 mb-2">Berikut ini adalah surat-surat yang telah terbit dam diarsipkan Klik "Lihat" pada kolom aksi untuk menampilkan surat</h5>
							</div>
						</div>
						<div class="collapse" id="search-nav">
						<form class="navbar-left navbar-form nav-search mr-md-12">
							<div class="input-group">
								<div class="input-group-prepend">
									<button type="submit" class="btn btn-search pr-1">
										<i class="fa fa-search search-icon"></i>
									</button>
								</div>
								<input type="text" placeholder="Cari Surat" class="form-control">
							</div>
						</form>
					</div>
					</div>
					
				</div>
				<div class="page-inner mt--5">
                <div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<div class="d-flex align-items-center">
										<h4 class="card-title">Arsip Surat</h4>
										
									</div>
								</div>
								<div class="card-body">
									<!-- Modal -->
									<div class="table-responsive">
										<table id="add-row" class="display table table-striped table-hover" >
											<thead>
												<tr>
													<th scope="col">Nomor Surat</th>
													<th scope="col">Kategori</th>
													<th scope="col">Judul</th>
													<th scope="col">Waktu Pengarsipan</th>
													<th scope="col">Aksi</th>
												</tr>
											</thead>
											<!-- <tbody>
												<tr>
													<td>Sonya Frost</td>
													<td>Software Engineer</td>
													<td>Edinburgh</td>
                          							<td>Edinburgh</td>`
													<td>
														<div class="form-button-action">
															<button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task">
																<i class="fa fa-edit"></i>
															</button>
															<button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove">
																<i class="fa fa-times"></i>
															</button>
														</div>
													</td>
												</tr>
											</tbody> -->
											<tbody>
												<?php
												require_once('koneksi.php');

													$sql = "SELECT * FROM surat";
													$res = mysqli_query($con,$sql);
													$result = array();

													while($row = mysqli_fetch_array($res)){
												?>
												<tr>
													<th><?php echo $row['nomor']?></th>
													<td><?php echo $row['kategori']?></td>
													<td><?php echo $row['judul']?></td>
													<td><?php echo $row['waktu']?></td>
													<td>
													<a onClick="javascript: return confirm('Apakah Anda yakin ingin menghapus surat ini?');" href="delete.php?id=<?php echo $row['id']?>"><button class="btn-danger">Hapus</button></a>
													<a href="<?php echo $row['file']?>"><button class="btn-warning">Unduh</button></a>
													<a href="lihat.php?id=<?php echo $row['id']?>"><button class="btn-primary">Lihat >></button></a>
													</td>
												</tr>
												<?php
													}
												?> 
												</tbody>
										</table>
									</div>
								</div>
                
							</div>
							<button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#addRowModal">
											<i class="fa fa-plus"></i>
											Arsipkan Surat
										</button>
						</div>
				</div>
			</div>
			
		</div>
		<!-- Custom template | don't include it in your project! -->
		<?php include("include/custom.php") ?>
		<!-- End Custom template -->
	</div>
	<!--   script   -->
		<!--   Core JS Files   -->
		<script src="assets/js/core/jquery.3.2.1.min.js"></script>
	<script src="assets/js/core/popper.min.js"></script>
	<script src="assets/js/core/bootstrap.min.js"></script>
	<!-- jQuery UI -->
	<script src="assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
	<script src="assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>
	
	<!-- jQuery Scrollbar -->
	<script src="assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>
	<!-- Datatables -->
	<script src="assets/js/plugin/datatables/datatables.min.js"></script>
	<!-- Atlantis JS -->
	<script src="assets/js/atlantis.min.js"></script>
	<!-- Atlantis DEMO methods, don't include it in your project! -->
	<script src="assets/js/setting-demo2.js"></script>
	<script >
		$(document).ready(function() {
			$('#basic-datatables').DataTable({
			});

			$('#multi-filter-select').DataTable( {
				"pageLength": 5,
				initComplete: function () {
					this.api().columns().every( function () {
						var column = this;
						var select = $('<select class="form-control"><option value=""></option></select>')
						.appendTo( $(column.footer()).empty() )
						.on( 'change', function () {
							var val = $.fn.dataTable.util.escapeRegex(
								$(this).val()
								);

							column
							.search( val ? '^'+val+'$' : '', true, false )
							.draw();
						} );

						column.data().unique().sort().each( function ( d, j ) {
							select.append( '<option value="'+d+'">'+d+'</option>' )
						} );
					} );
				}
			});

			// Add Row
			$('#add-row').DataTable({
				"pageLength": 5,
			});

			var action = '<td> <div class="form-button-action"> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task"> <i class="fa fa-edit"></i> </button> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove"> <i class="fa fa-times"></i> </button> </div> </td>';

			$('#addRowButton').click(function() {
				$('#add-row').dataTable().fnAddData([
					$("#addName").val(),
					$("#addPosition").val(),
					$("#addOffice").val(),
					action
					]);
				$('#addRowModal').modal('hide');

			});
		});
	</script>
</body>
</html>