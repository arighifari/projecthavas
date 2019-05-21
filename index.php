<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Video Havas</title>

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous"> -->
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="style/style.css">
    

    <!-- Font Awesome JS -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>

    <style>
    #loading
    {
        text-align:center; 
        background: url('image/loader.gif') no-repeat center; 
        height: 150px;
    }
    </style>

    <?php
        include('config.php');
        include('navbar.php');

        $year = mysqli_query($conn,"SELECT DISTINCT SUBSTRING(LaunchDate,-4) AS LaunchDate FROM videos");
        $section = mysqli_query($conn, "SELECT DISTINCT Section FROM videos ORDER BY Section");
        $brand = mysqli_query($conn, "SELECT DISTINCT Brand FROM videos ORDER BY Brand");
        $libsignature = mysqli_query($conn, "SELECT DISTINCT libsignature FROM videos ORDER BY libsignature");
        
    ?>
</head>

<body> 
<div class="container-fluid">
    <div class="row">
        <div >
            <h2>Daftar Video</h2>
        </div>
    </div>
        <div class="row">
            <div >
                <br>
                <h5>SEARCH</h5>
                <br>
                <label for="year">Year</label>
                <select name="year" id="year">
                    <option  value="show-year">Year</option>;
                <?php
                    while($years = mysqli_fetch_assoc($year)){ ?>
                    <option class="common-selector Year" value=<?= $years['LaunchDate']?>><?= $years['LaunchDate']?></option>";                            
                        <?php }?>
                </select>
                <label for="section" style="margin-left: 10px">Section</label>
                <select name="show-section" id="section">
                    <option value="Section">Section</option>
                <?php
                    while($sections = mysqli_fetch_assoc($section)){?>    
                        <option class="common-selector Section" value=<?= $sections['Section']?>><?= $sections['Section']?></option>                            
                        <?php }?>
                </select>
                <label for="brand" style="margin-left: 10px">Brand</label>
                <select name="show-brand" id="brand">
                    <option value="Brand">Brands</option>
                <?php
                    while($brands = mysqli_fetch_assoc($brand)){?>
                        <option class="common-selector Brand" value=<?= $brands['Brand']?>><?= $brands['Brand']?></option>                            
                        <?php }?>
                </select>
                <label for="libsignature" style="margin-left: 10px">Libsignature</label>
                <select name="show-libsignature" id="libsignature">
                    <option value="libsignature">Libsignature</option>
                <?php
                    while($libsignatures = mysqli_fetch_assoc($libsignature)){?>
                        <option class="common-selector Lib" value=<?= $libsignatures['libsignature']?>><?= $libsignatures['libsignature']?></option>                            
                        <?php }?>
                </select>
                <br>
                <br>
            </div>
        </div>
    </div>

    <div id="show-video">

    </div>
    <?php include('videocontroller.php')?>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>

<script>

</script>

</html>
