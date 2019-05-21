<?php
include_once('config.php');
include_once('excel_reader/excel_reader2.php');    

if(isset($_POST['submit'])){

$target = basename($_FILES['db']['name']) ;
move_uploaded_file($_FILES['db']['tmp_name'], $target);
$filexls = $_FILES['db']['name'];
 
// beri permisi agar file xls dapat di baca
chmod($_FILES['db']['name'],0777);
 
// mengambil isi file xls
$data = new Spreadsheet_Excel_Reader($_FILES['db']['name'],false);
// menghitung jumlah baris data yang ada
$jumlah_baris = $data->rowcount($sheet_index=0);
 
// jumlah default data yang berhasil di import
$berhasil = 0;
for ($i=2; $i<=$jumlah_baris; $i++){
 
    // menangkap data dan memasukkan ke variabel sesuai dengan kolumnya masing-masing
	$signature         = $data->val($i, 1);
	$section           = $data->val($i, 2);
    $category          = $data->val($i, 3);
    $media             = $data->val($i, 4);
    $mediaabbrname     = $data->val($i, 5);
    $brand             = $data->val($i, 6);
    $copyline          = $data->val($i, 7);
    $launchdate        = $data->val($i, 8);
    $duration          = $data->val($i, 9);
    $creativeduration  = $data->val($i, 10);
    $libsignature      = $data->val($i, 11);
    $filename          = $data->val($i, 12);
    $copylinedate      = $data->val($i, 13);
    $advertiser        = $data->val($i, 14);
    $fullfilename      = $data->val($i, 15);

    $query = "INSERT into videos (Signatured,Section,Category,Media,MediaAbbrName,Brand,Copyline,LaunchDate,Duration,
    creativeduration,libsignature,Filenames,CopylineDate,advertiser,FullFilename,FileExcel)
    values('$signature','$section','$category','$media','$mediaabbrname','$brand','$copyline','$launchdate','$duration','$creativeduration',
    '$libsignature','$filename','$copylinedate','$advertiser','$fullfilename','$filexls')";
    $hasil = mysqli_query($conn,$query);
    $berhasil++;
}
    if(!$hasil){
        //          jika import gagal
                die(mysqli_error($conn));
            }else{
        //          jika impor berhasil

        echo "<script>alert('Berhasil Menginput Data');</script>";
            }
 
// hapus kembali file .xls yang di upload tadi
unlink($_FILES['db']['name']);
 
// alihkan halaman ke index.php
header("location:index.php?berhasil=$berhasil");

}

?>
