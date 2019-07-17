<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Video Havas</title>

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="../style/style.css">

    <!-- Font Awesome JS -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>

    <?php
        include('../section.php');
        include('navbar.php');
        $idvideo = $_GET['idvideo'];
        include_once('../config.php');
        $result=mysqli_query($conn,"SELECT * FROM videos where Signature = '$idvideo'");
        $videos = mysqli_fetch_assoc($result);

        $media = mysqli_query($conn,"SELECT Media FROM videos where Signature = '$idvideo'");
        $media2 = mysqli_fetch_assoc($media);

        $year = mysqli_query($conn,"SELECT Year FROM videos where Signature = '$idvideo'");
        $years = mysqli_fetch_array($year);

        $week = mysqli_query($conn,"SELECT SUBSTRING(FileExcel,10,4) AS FileExcel FROM videos where Signature = '$idvideo'");
        $weeks = mysqli_fetch_assoc($week);

        $sec = mysqli_query($conn,"SELECT Section FROM videos where Signature = '$idvideo'");
        $secs = mysqli_fetch_assoc($sec);

        $lib = mysqli_query($conn,"SELECT libsignature FROM videos where Signature = '$idvideo'");
        $libs = mysqli_fetch_assoc($lib);
        
        $brand = mysqli_query($conn,"SELECT Brand FROM videos where Signature = '$idvideo'");
        $brands = mysqli_fetch_assoc($brand);

        $copyline = mysqli_query($conn,"SELECT Copyline FROM videos where Signature = '$idvideo'");
        $copylines = mysqli_fetch_assoc($copyline);

        $brand_rep = str_replace(" - ","-",$brands['Brand']);
        $brand_rep1 = str_replace(", ",",",$brand_rep);
        $brand_rep2 = str_replace("'","",$brand_rep1);
        $brand_rep3 = str_replace("/","-",$brand_rep2);
        $brand_rep4 = str_replace(" & ","-",$brand_rep3);
        $brand_rep5 = str_replace(" / ","-",$brand_rep4);
        $brand_replace = str_replace(" ","_",$brand_rep5);

        $copy = str_replace(" / ","-",$copylines['Copyline']);
        $copy_rep = str_replace(" - ","-",$copy);
        $copy_rep1 = str_replace(", ",",",$copy_rep);
        $copy_rep2 = str_replace("'","",$copy_rep1);
        $copy_rep3 = str_replace(" & ","-",$copy_rep2);
        $copy_rep4 = str_replace("&","-",$copy_rep3);
        $copy_rep5 = str_replace(" ","_",$copy_rep4);
        $copy_replace = str_replace("/","-",$copy_rep5);
    ?>
</head>

<body>
    <?php if($media2['Media'] == 'TV'){
    echo "<center><h2>Detail Video</h2></center>";
    }else{
    echo "<center><h2>Detail Image</h2></center>";
    }?>
    <div class="container-fluid">
        <div class="row">
        <div class="col-md-5">
        <?php  
        if($media2['Media'] == 'TV') { ?>
        <EMBED style="margin-top: 30px" allowfullscreen width="100%" height="40%"  autoplay="autoplay" src="../adpix/AdPix2/<?= $years['Year']?>/<?= $weeks['FileExcel']?>/general/movie/<?php $sections = new section($idvideo) ?>/<?= $libs['libsignature']?>  -  <?=$brand_replace?>  -  <?=$copy_replace?>.mpg" AUTOPLAY=true WIDTH=160 HEIGHT=120></EMBED>
        <a style="margin-top:5px" download="<?= $libs['libsignature']?>  -  <?=$brand_replace?>  -  <?=$copy_replace?>.mpg"
        href="../adpix/AdPix2/<?= $years['Year']?>/<?= $weeks['FileExcel']?>/general/movie/<?php $sections = new section($idvideo) ?>/<?= $libs['libsignature']?>  -  <?=$brand_replace?>  -  <?=$copy_replace?>.mpg" class="btn btn-primary btn-sm" role="button">Download</a>
        <?php } else { ?>
            <img style="width: 100% ;height: auto ;margin-top: 30px" src="../adpix/AdPix2/<?= $years['Year']?>/<?= $weeks['FileExcel']?>/general/image/<?php $sections = new section($idvideo)?>/<?= $libs['libsignature']?>  -  <?=$brand_replace?>  -  <?=$copy_replace?>.jpg" 
            alt="<?php $sections = new section($idvideo)?>/<?= $libs['libsignature']?>  -  <?=$brand_replace?>  -  <?=$copy_replace?>.jpg">
            <a style="margin-top:5px" href="../adpix/AdPix2/<?= $years['Year']?>/<?= $weeks['FileExcel']?>/general/image/<?php $sections = new section($idvideo)?>/<?= $libs['libsignature']?>  -  <?=$brand_replace?>  -  <?=$copy_replace?>.jpg" 
                target="_blank" class="btn btn-primary btn-sm" role="button">VIEW</a>
            <a style="margin-top:5px" download="<?= $libs['libsignature']?>  -  <?=$brand_replace?>  -  <?=$copy_replace?>.jpg" 
            href="../adpix/AdPix2/<?= $years['Year']?>/<?= $weeks['FileExcel']?>/general/image/<?php $sections = new section($idvideo)?>/<?= $libs['libsignature']?>  -  <?=$brand_replace?>  -  <?=$copy_replace?>.jpg" 
            target="_blank" class="btn btn-primary btn-sm" role="button">DOWNLOAD</a>        
        <?php }
        ?>

        </div>
    <div class="col-md-7">
        <table id="myTable" style="margin-top: 30px" class="table table-{1:striped|lg|bordered|hover|inverse} table-inverse table-responsive" >
        <tr>
            <td><label for=""><strong>Signature</strong></label></td>
            <td>:</td>
            <td> <label for=""> <strong><?php echo $videos['Signature'] ?></strong> </label></td>
        </tr>
        <tr>
            <td><label for=""> <strong>LaunchDate</strong> </label></td>
            <td>:</td>
            <td><label for=""> <strong><?php echo $videos['LaunchDate'] ?></strong> </label></td>
        </tr>
        <tr>
            <td><label for=""> <strong>Section</strong> </label></td>
            <td>:</td>
            <td><label for=""> <strong><?php echo $videos['Section'] ?></strong> </label></td>
        </tr>
        <tr>
            <td><label for=""><strong>Category</strong></label></td>
            <td>:</td>
            <td><label for=""> <strong><?php echo $videos['Category'] ?></strong> </label></td>
        </tr>
        <tr>
            <td><label for=""> <strong>Advertiser</strong> </label></td>
            <td>:</td>
            <td><label for=""> <strong><?php echo $videos['advertiser'] ?></strong> </label></td>
        </tr>
        <tr>
            <td><label for=""> <strong>Brand</strong> </label></td>
            <td>:</td>
            <td><label for=""> <strong><?php echo $videos['Brand'] ?></strong> </label></td>
        </tr>
        <tr>
            <td><label for=""> <strong>Copyline</strong> </label></td>
            <td>:</td>
            <td><label for=""> <strong><?php echo $videos['Copyline'] ?></strong> </label></td>
        </tr>
        <tr>
            <td><label for=""> <strong>Duration</strong> </label></td>
            <td>:</td>
            <td><label for=""> <strong><?php echo $videos['Duration'] ?></strong> </label></td>
        </tr>
        <tr>
            <td><label for=""> <strong>Media</strong> </label></td>
            <td>:</td>
            <td><label for=""> <strong><?php echo $media2['Media'] ?></strong> </label></td>
        </tr>
        <tr>
            <td><label for=""> <strong>Media Channel</strong> </label></td>
            <td>:</td>
            <td><label for=""> <strong><?php echo $videos['MediaAbbrName'] ?></strong> </label></td>
        </tr>
    </table>
    </div>
</div>
</div>

    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>

</body>

</html>