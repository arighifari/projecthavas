<!doctype html>
<html>
    <head>

    <?php 
    include('navbar.php');
    include('config.php');

    $result = mysqli_query($conn,"SELECT * FROM videos");
    $results = mysqli_fetch_assoc($result);
        
    $year = mysqli_query($conn,"SELECT DISTINCT SUBSTRING(LaunchDate,-4) AS LaunchDate FROM videos");
    $section = mysqli_query($conn, "SELECT DISTINCT Section FROM videos ORDER BY Section");
    $brand = mysqli_query($conn, "SELECT DISTINCT Brand FROM videos ORDER BY Brand");
    $libsignature = mysqli_query($conn, "SELECT DISTINCT libsignature FROM videos ORDER BY libsignature");
    ?>
    <title>Filter</title>
    <!-- Datatable CSS -->
    <link href='DataTables/datatables.min.css' rel='stylesheet' type='text/css'>

    <!-- jQuery Library -->
    <script src="jquery/jquery-3.3.1.min.js"></script>
    
    <!-- Datatable JS -->
    <script src="DataTables/datatables.min.js"></script>
        
    </head>
    <body >

        <div >    
            <!-- Custom Filter -->
            <table>
                    <tr>
                        <td><label for="year" style="margin-left: 10px; margin-top:5px">Year</label></td>
                        <td>
                        <select style="margin-left: 3px" name='year' id='year'>
                            <option  value=''>Year</option>
                        <?php
                            while($years = mysqli_fetch_assoc($year)){ ?>
                            <option class='common-selector Year' value='<?= $years['LaunchDate']?>'><?= $years['LaunchDate']?></option>;                            
                                <?php }?>
                        </select>
                        </td>
                        <td><label for="section" style="margin-left: 10px; margin-top:5px">Section</label></td>
                        <td>
                        <select style="margin-left: 3px" name='section' id='section'>
                            <option  value=''>Section</option>
                        <?php
                            while($sections = mysqli_fetch_assoc($section)){ ?>
                            <option class='common-selector Year' value='<?= $sections['Section']?>'><?= $sections['Section']?></option>;                            
                                <?php }?>
                        </select>
                        </td>
                        <td><label for="brand" style="margin-left: 10px; margin-top:5px">Brand</label></td>
                        <td>
                        <select style="margin-left: 3px" name='brand' id='brand'>
                            <option  value=''>Brand</option>
                        <?php
                            while($brands = mysqli_fetch_assoc($brand)){ ?>
                            <option class='common-selector Year' value='<?= $brands['Brand']?>'><?= $brands['Brand']?></option>;                            
                                <?php }?>
                        </select>
                        </td>
                        <!-- <td><label for="libsignature" style="margin-left: 10px">Libsignature</label></td>
                        <td>
                        <select name='libsignature' id='libsignature'>
                            <option  value=''>Libsignature</option>
                        <?php
                            while($libsignatures = mysqli_fetch_assoc($libsignature)){ ?>
                            <option class='common-selector Year' value='<?= $libsignatures['libsignature']?>'><?= $libsignatures['libsignature']?></option>;                            
                                <?php }?>
                        </select>
                        </td> -->
                    </tr>
            </table>
            <br>
            <!-- Table -->
            <!-- <div class="col-md-10 col-md-offset-1"> -->
            <table id='empTable' class='display dataTable'>
                <thead>
                    <tr>
                    <th>ID</th>
                    <th>Signature</th>
                    <th>Section</th>
                    <th>Category</th>
                    <th>Media</th>
                    <th>Brand</th>
                    <th>Copyline</th>
                    <th>LaunchDate</th>
                    <th>Duration</th>
                    <th>libsignature</th>
                    <th>advertiser</th>
                    </tr>
                </thead>
            </table>
        </div>
        <script>
        $(document).ready(function(){
            var dataTable = $('#empTable').DataTable({
                'processing': true,
                'serverSide': true,
                'serverMethod': 'post',
                'searching': true, // Remove default Search Control
                'ajax': {
                    'url':'ajax/ajaxfile.php',
                    'data': function(data){
                        // Read values
                        var year = $('#year').val();
                        var section = $('#section').val();
                        var brand = $('#brand').val();
                        // var libsignature = $('#libsignature').val();

                        // Append to data
                        data.year = year;
                        data.section = section;
                        data.brand = brand;
                        // data.libsignature = libsignature;
                    }
                },
                'columns': [
                    { data: 'video_Id' },
                    { data: 'Signatured' },
                    { data: 'Section' },
                    { data: 'Category' },
                    { data: 'Media' },
                    { data: 'Brand' },
                    { data: 'Copyline' },
                    { data: 'LaunchDate' },
                    { data: 'Duration' },
                    { data: 'libsignature' },
                    { data: 'advertiser' }
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
            // $('#libsignature').change(function(){
            //     dataTable.draw();
            // });
        });

        $(document).ready(function() {
        var table = $('#empTable').DataTable();
        
        $('#empTable tbody').on('click', 'tr', function () {
            // var data = table.row( this ).data();
            var id = this.cells[0].innerHTML;
            var brand = this.cells[5].innerHTML;
            alert( 'You clicked on id '+id+" and Brand = "+brand);
            window.location.href="detailvideo.php?idvideo="+id;
        } );
    } );
    </script>
    </body>

</html>
