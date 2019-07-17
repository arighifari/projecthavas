<!doctype html>
<html>
    <head>
    <title>AdWatch</title>
    <?php 

    include('navbar.php');
    include('../config.php');

    $result = mysqli_query($conn,"SELECT * FROM videos");
    $results = mysqli_fetch_assoc($result);
        
    $year = mysqli_query($conn,"SELECT DISTINCT Year FROM videos ORDER BY Year");
    $filexcel = mysqli_query($conn, "SELECT DISTINCT FileExcel videos ORDER BY FileExcel");
    ?>
    <!-- Datatable CSS -->
    <link href='../DataTables/datatables.min.css' rel='stylesheet' type='text/css'>

    <!-- <link href='https://cdn.datatables.net/buttons/1.5.6/css/buttons.dataTables.min.css' rel='stylesheet' type='text/css'> -->

    <!-- jQuery Library -->
    <script src="../jquery/jquery-3.3.1.min.js"></script>
    
    <!-- Datatable JS -->
    <script src="../DataTables/datatables.min.js"></script>
    
    <!-- <script src="https://code.jquery.com/jquery-3.3.1.js"></script> -->
    <!-- <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script> -->
    <!-- <script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.flash.min.js"></script> -->

    </head>
    <body>

        <div>    
            <!-- Custom Filter -->
            <h2 style="margin-left: 10px">FILTER DATA</h2>
            <form action="" method="post">
            <table>
                    <tr>
                        <td><label for="year" style="margin-left: 10px; margin-top:5px">Year</label></td>
                        <td>
                        <select class="custom-select custom-select-sm" style="margin-left: 3px" name='year' id='year'>
                            <option  value=''>Year</option>
                        <?php
                            while($years = mysqli_fetch_assoc($year)){ ?>
                            <option class='common-selector Year' value='<?= $years['Year']?>'><?= $years['Year']?></option>                         
                                <?php }?>
                        </select>
                        </td>
                    </tr>
            </table>
            </form>
            <br>

            <table id='empTable' class='display dataTable'>
                <thead>
                    <tr>
                    <th>Year</th>
                    <th>Week</th>
                    </tr>
                </thead>
            </table>    
        </div>

        <script type="text/javascript">
        $(document).ready(function(){
            var dataTable = $('#empTable').DataTable({
                'processing': true,
                'serverSide': true,
                'serverMethod': 'post',
                'searching': false, // Remove default Search Control
                'ajax': {
                    'url':'../ajax/ajaxfile_excel.php',
                    'data': function(data){
                        // Read values
                        var year = $('#year').val();
                        // Append to data
                        data.year = year;
                    }
                },
                'columns': [
                    { data: 'Year' },
                    { data: 'FileExcel' }
                ]
            });

            $('#year').change(function(){
                dataTable.draw();
            });
        });
    </script>
    </body>

</html>
