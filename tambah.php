<?php
   include 'koneksi.php';

   if($_SERVER['REQUEST_METHOD']=='POST') {
      $nomor = $_POST['nomor'];
      $kategori = $_POST['kategori'];
      $judul = $_POST['judul'];
      $waktu = date("Y-m-d H:i");

      $newfilename= date('dmYHi').str_replace(" ", "", basename($_FILES["file"]["name"]));
      $targetfolder = "pdfsurat/" . $newfilename ;
      $file_type=$_FILES['file']['type'];
      if ($file_type=="application/pdf") {
         if(move_uploaded_file($_FILES['file']['tmp_name'], $targetfolder ))
         {
            $sql = "INSERT INTO surat VALUES('','$nomor','$kategori','$judul','$waktu','$targetfolder')";
            if(mysqli_query($con,$sql)) {
               echo "<script>alert('Berhasil Mengarsip Surat!');
               window.location.href='index.php';
               </script>";
            } else {
               echo "<script>alert('Gagal Mengarsip Surat!');history.go(-1);</script>".mysqli_error($con);
            }
         }
         else {
            echo "File Gagal di Upload";
         }
      }
      else {
      echo "Hanya Boleh upload file PDF .<br>";
      }
   }
?>