<?php
include_once('../config.php');
include_once('../excel_reader/excel_reader2.php');    

if(isset($_POST['submit'])){

    $filexls = $_FILES['db']['name'];

    $tahun = substr($filexls,9,2);
    $tahun2 = "20$tahun" ;
    
    $target = basename($_FILES['db']['name']) ;
    //upload to specific folder
    move_uploaded_file($_FILES['db']['tmp_name'],"../excel/" . $target);
 
// beri permisi agar file xls dapat di baca
chmod("../excel/".$_FILES['db']['name'],0777);
 
// mengambil isi file xls
$data = new Spreadsheet_Excel_Reader("../excel/" . $_FILES['db']['name'],false);
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

    $section           = mysqli_real_escape_string($conn,$section);
    $category          = mysqli_real_escape_string($conn,$category);
    $mediaabbrname     = mysqli_real_escape_string($conn,$mediaabbrname);
    $brand             = mysqli_real_escape_string($conn,$brand);
    $copyline          = mysqli_real_escape_string($conn,$copyline);
    $advertiser        = mysqli_real_escape_string($conn,$advertiser);


    $query = "INSERT into videos (Signature,Section,Category,Media,MediaAbbrName,Brand,Copyline,LaunchDate,Duration,
    creativeduration,libsignature,Filenames,CopylineDate,advertiser,FileExcel,Year)
    values('$signature','$section','$category','$media','$mediaabbrname','$brand','$copyline','$launchdate','$duration','$creativeduration',
    '$libsignature','$filename','$copylinedate','$advertiser','$filexls','$tahun2')";
    $hasil = mysqli_query($conn,$query);
    $berhasil++;
}
    if(!$hasil){
        //          jika import gagal
            echo "<script type='text/javascript'>window.location='index.php';alert('Failed Insert Data Into Database');</script>";
            unlink("../excel/".$_FILES['db']['name']);

                die(mysqli_error($conn));
            }else{
            echo "<script type='text/javascript'>alert('Success Insert $berhasil Data Into Database');window.location='index.php?berhasil=$berhasil';</script>";
        //          jika impor berhasil
            }
 
// hapus kembali file .xls yang di upload tadi
// unlink($_FILES['db']['name']);
 
// alihkan halaman ke index.php
echo "<script type='text/javascript'>window.location='index.php?berhasil=$berhasil';alert('Success Insert $berhasil Data Into Database');</script>";
// header("location:index.php?berhasil=$berhasil");
}

?>
