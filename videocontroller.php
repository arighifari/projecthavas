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
    
    <!-- Datatables CSS -->
    <link href='DataTables/datatables.min.css' rel='stylesheet' type='text/css'>

    <!-- jQuery Library -->
    <script src="jquery/jquery-3.3.1.min.js"></script>

    <!-- Datatable JS -->
    <script src="DataTables/datatables.min.js"></script>

    <?php
        include('config.php');
        include('pagination.php');
        
        $result=mysqli_query($conn,"SELECT * FROM videos");

        $limit      = ( isset( $_GET['limit'] ) ) ? $_GET['limit'] : 20;
        $page       = ( isset( $_GET['page'] ) ) ? $_GET['page'] : 1;
        $links      = ( isset( $_GET['links'] ) ) ? $_GET['links'] : 3;
        $query = "SELECT * FROM videos";
    
        $Paginator  = new Paginator( $conn, $query );
        $results    = $Paginator->getData(  $limit, $page );

        // $year = mysqli_query($conn,"SELECT DISTINCT SUBSTRING(LaunchDate,-4) AS LaunchDate FROM videos");
        // $section = mysqli_query($conn, "SELECT DISTINCT Section FROM videos ORDER BY Section");
        // $brand = mysqli_query($conn, "SELECT DISTINCT Brand FROM videos ORDER BY Brand");
        // $libsignature = mysqli_query($conn, "SELECT DISTINCT libsignature FROM videos ORDER BY libsignature");
    ?>
</head>

<body> 
    <div class="container-fluid">
        <div class="col-md-10 col-md-offset-1">
            <table id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
            <thead>
                <tr>
                <th>ID</th>
                <th>Signature</th>
                <th>Section</th>
                <th>Category</th>
                <th>Media</th>
                <th>Copyline</th>
                <th>Brand</th>
                <th>LaunchDate</th>
                <th>Duration</th>
                <th>libsignature</th>
                <th>advertiser</th>
                <th>Pilihan</th>
                </tr>
            </thead>
            <?php
            $total_row = mysqli_fetch_row($result);
            if($total_row != 0){
            
             
            ?>
            <?php for( $i = 0; $i < count( $results->data ); $i++ ): ?> 
                <tbody>
                <tr>
                <td><?=$results->data[$i]['video_Id']?></td>
                <td><?=$results->data[$i]['Signatured']?></td>
                <td><?=$results->data[$i]['Section']?></td>
                <td><?=$results->data[$i]['Category']?></td>
                <td><?=$results->data[$i]['Media']?></td>
                <td><?=$results->data[$i]['Copyline']?></td>
                <td><?=$results->data[$i]['Brand']?></td>
                <td><?=$results->data[$i]['LaunchDate']?></td>
                <td><?=$results->data[$i]['Duration']?></td>
                <td><?=$results->data[$i]['libsignature']?></td>
                <td><?=$results->data[$i]['advertiser']?></td>
                <td><a href="detailvideo.php?idvideo=<?=$results->data[$i]['video_Id']?>" class="btn btn-success btn-sm" role="button">View</a></td>
                </tr>
                </tbody>
                <?php endfor ;
            }
            else{
                echo '<center><h3>Data Video Tidak Ada</h3></center>';
            }
            ?>
        </table>
    </div>
    <?php echo $Paginator->createLinks( $links, 'pagination pagination-lg justify-content-center' ); ?>
</div>


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <!-- <script type="text/javascript" src="js/addons/datatables.min.js"></script> -->

</body>

</html>

