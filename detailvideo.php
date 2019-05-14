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
    <link rel="stylesheet" href="style.css">

    <!-- Font Awesome JS -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>

    <?php
        include_once('navbar.php');
        $idvideo = $_GET['idvideo'];
        include_once('config.php');
        $result=mysqli_query($conn,"SELECT * FROM videos where video_id = '$idvideo'");
        $videos = mysqli_fetch_assoc($result);

    ?>
</head>

<body>
        <div class="container-fluid">
            <div class="row">
                <div >
                    <h2>Detail Video</h2>
                </div>
            </div>
            <table id="myTable" class="table table-{1:striped|lg|bordered|hover|inverse} table-inverse table-responsive" >
            <tr>
                <td><label for="iduser">Id</label></td>
                <td>:</td>
                <td><input style="width:500px" readonly type="text" name="iduser" id="iduser" value="<?php echo $videos['video_Id'] ?>"></td>
            </tr>
            <tr>
                <td><label for="">Signature</label></td>
                <td>:</td>
                <td><input style="width:500px" readonly type="text" name="namauser" id="" value="<?php echo $videos['Signatured'] ?>"></td>
            </tr>
            <tr>
                <td><label for="">Section</label></td>
                <td>:</td>
                <td><input style="width:500px" readonly type="text" name="idbuku" id="" value="<?php echo $videos['Section'] ?>"></td>
            </tr>
            <tr>
                <td><label for="">Category</label></td>
                <td>:</td>
                <td><input style="width:500px" readonly type="text" name="namabuku" id="" value="<?php echo $videos['Category'] ?>"></td>
            </tr>
            <tr>
                <td><label for="">Media</label></td>
                <td>:</td>
                <td><input style="width:500px" readonly type="text" name="namabuku" id="" value="<?php echo $videos['Media'] ?>"></td>
            </tr>
            <tr>
                <td><label for="">Copyline</label></td>
                <td>:</td>
                <td><input style="width:500px" readonly type="text" name="namabuku" id="" value="<?php echo $videos['Copyline'] ?>"></td>
            </tr>
            <tr>
                <td><label for="">Brand</label></td>
                <td>:</td>
                <td><input style="width:500px" readonly type="text" name="namabuku" id="" value="<?php echo $videos['Brand'] ?>"></td>
            </tr>
            <tr>
                <td><label for="">LaunchDate</label></td>
                <td>:</td>
                <td><input style="width:500px" readonly type="text" name="namabuku" id="" value="<?php echo $videos['LaunchDate'] ?>"></td>
            </tr>
            <tr>
                <td><label for="">Duration</label></td>
                <td>:</td>
                <td><input style="width:500px" readonly type="text" name="namabuku" id="" value="<?php echo $videos['Duration'] ?>"></td>
            </tr>
            <tr>
                <td><label for="">libsignature</label></td>
                <td>:</td>
                <td><input style="width:500px" readonly type="text" name="namabuku" id="" value="<?php echo $videos['libsignature'] ?>"></td>
            </tr>
            <tr>
                <td><label for="">advertiser</label></td>
                <td>:</td>
                <td><input style="width:500px" readonly type="text" name="namabuku" id="" value="<?php echo $videos['advertiser'] ?>"></td>
            </tr>
        </table>
    </div>

    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
            });
        });
    </script>
</body>

</html>