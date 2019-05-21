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
        include('navbar.php');
        
        $result=mysqli_query($conn,"SELECT * FROM videos");

        $limit      = ( isset( $_GET['limit'] ) ) ? $_GET['limit'] : 20;
        $page       = ( isset( $_GET['page'] ) ) ? $_GET['page'] : 1;
        $links      = ( isset( $_GET['links'] ) ) ? $_GET['links'] : 3;
        
        $Paginator  = new Paginator( $conn, $query );
        $results    = $Paginator->getData(  $limit, $page );
       
        $query = "SELECT * FROM videos";
        
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
                <br>
                <h5>SEARCH</h5>
                <br>
                <table>
                    <tr>
                        <td>Year</td>
                        <td>
                        <select name="year" id='year'>
                            <option  value="show-year">Year</option>;
                        <?php
                            while($years = mysqli_fetch_assoc($year)){ ?>
                            <option class="common-selector Year" value='<?= $years['LaunchDate']?>'><?= $years['LaunchDate']?></option>";                            
                                <?php }?>
                        </select>
                        </td>
                    </tr>
                </table>
                <label for="year">Year</label>
                <select name="year" id='year'>
                    <option  value="show-year">Year</option>;
                <?php
                    while($years = mysqli_fetch_assoc($year)){ ?>
                    <option class="common-selector Year" value='<?= $years['LaunchDate']?>'><?= $years['LaunchDate']?></option>";                            
                        <?php }?>
                </select>
                <label for="section" style="margin-left: 10px">Section</label>
                <select name="show-section" id='section'>
                    <option value="Section">Section</option>
                <?php
                    while($sections = mysqli_fetch_assoc($section)){?>    
                        <option class="common-selector Section" value='<?= $sections['Section']?>'><?= $sections['Section']?></option>                            
                        <?php }?>
                </select>
                <label for="brand" style="margin-left: 10px">Brand</label>
                <select name="show-brand" id='brand'>
                    <option value="Brand">Brands</option>
                <?php
                    while($brands = mysqli_fetch_assoc($brand)){?>
                        <option class="common-selector Brand" value='<?= $brands['Brand']?>'><?= $brands['Brand']?></option>                            
                        <?php }?>
                </select>
                <label for="libsignature" style="margin-left: 10px">Libsignature</label>
                <select name="show-libsignature" id='libsignature'>
                    <option value="libsignature">Libsignature</option>
                <?php
                    while($libsignatures = mysqli_fetch_assoc($libsignature)){?>
                        <option class="common-selector Lib" value='<?= $libsignatures['libsignature']?>'><?= $libsignatures['libsignature']?></option>                            
                        <?php }?>
                </select>
                <br>
                <br>
            </div>
        <div class="col-md-10 col-md-offset-1">
        <table id='empTable' class='display dataTable'>
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
        
        </table>
    </div>
    <!-- <?php echo $Paginator->createLinks( $links, 'pagination pagination-lg justify-content-center' ); ?> -->
</div>


    <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script> -->

    <!-- <script type="text/javascript" src="js/addons/datatables.min.js"></script> -->
    <script>
        $(document).ready(function(){
            var dataTable = $('#empTable').DataTable({
                'processing': true,
                'serverSide': true,
                'serverMethod': 'post',
                //'searching': false, // Remove default Search Control
                'ajax': {
                    'url':'ajaxfile.php',
                    'data': function(data){
                        // Read values
                        var year = $('#year').val();
                        var section = $('#section').val();
                        var brand = $('#brand').val();
                        var libsignature = $('#libsignature').val();

                        // Append to data
                        data.year = year;
                        data.section = section;
                        data.brand = brand;
                        data.libsignature = libsignature;
                    }
                },
                'columns': [
                    { data: 'video_Id' },
                    { data: 'Signatured' },
                    { data: 'Section' },
                    { data: 'Category' },
                    { data: 'Media' },
                    { data: 'Copyline' },
                    { data: 'Brand' },
                    { data: 'LaunchDate' },
                    { data: 'Duration' },
                    { data: 'libsignature' },
                    { data: 'advertiser' },
                ]
            });

            $('#year').change(function(){
                dataTable.draw();
            });
            $('#section').change(function(){
                dataTable.draw();
            });
            $('#brand').change(function(){
                dataTable.draw();
            });
            $('#libsignature').change(function(){
                dataTable.draw();
            });
        });
    </script>


</body>

</html>

