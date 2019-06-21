<!doctype html>
<html>
    <head>
    <title>HAVAS</title>
    <?php 
    include('navbar.php');
    include('config.php');

    $result = mysqli_query($conn,"SELECT * FROM videos");
    $results = mysqli_fetch_assoc($result);
        
    $year = mysqli_query($conn,"SELECT DISTINCT Year FROM videos ORDER BY Year");
    $section = mysqli_query($conn, "SELECT DISTINCT Section FROM videos ORDER BY Section");
    $brand = mysqli_query($conn, "SELECT DISTINCT Brand FROM videos ORDER BY Brand");
    $libsignature = mysqli_query($conn, "SELECT DISTINCT libsignature FROM videos ORDER BY libsignature");
    ?>
    <!-- Datatable CSS -->
    <link href='DataTables/datatables.min.css' rel='stylesheet' type='text/css'>

    <!-- <link href='https://cdn.datatables.net/buttons/1.5.6/css/buttons.dataTables.min.css' rel='stylesheet' type='text/css'> -->

    <!-- jQuery Library -->
    <script src="jquery/jquery-3.3.1.min.js"></script>
    
    <!-- Datatable JS -->
    <script src="DataTables/datatables.min.js"></script>
    
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
                        <td><label for="section" style="margin-left: 10px; margin-top:5px">Section</label></td>
                        <td>
                        <select class="custom-select custom-select-sm" style="margin-left: 3px" name="section" id="section">
                            <option  value=''>Section</option>
                        <?php
                            while($sections = mysqli_fetch_assoc($section)){ ?>
                            <option class='common-selector Year' value='<?= $sections['Section']?>'><?= $sections['Section']?></option>                         
                                <?php }?>
                        </select>
                        </td>
                        <td><label for="brand" style="margin-left: 10px; margin-top:5px">Brand</label></td>
                        <td>
                        <select class="custom-select custom-select-sm" style="margin-left: 3px" name='brand' id='brand'>
                            <option  value=''>Brand</option>
                        <?php
                            while($brands = mysqli_fetch_assoc($brand)){ ?>
                            <option class='common-selector Year' value='<?= $brands['Brand']?>'><?= $brands['Brand']?></option>                        
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
                    <th>Section</th>
                    <th>Category</th>
                    <th>Brand</th>
                    <th>Copyline</th>
                    <th>advertiser</th>
                    <th>Media</th>
                    <th>LaunchDate</th>
                    <th>Duration</th>
                    <th>libsignature</th>
                    <th>Signature</th>
                    <th>ID</th>
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
                'searching': true, // Remove default Search Control
                'ajax': {
                    'url':'ajax/ajaxfile.php',
                    'data': function(data){
                        // Read values
                        var year = $('#year').val();
                        var section = $('#section').val();
                        var brand = $('#brand').val();

                        // Append to data
                        data.year = year;
                        data.section = section;
                        data.brand = brand;
                    }
                },
                'columns': [
                    { data: 'Section' },
                    { data: 'Category' },
                    { data: 'Brand' },
                    { data: 'Copyline' },
                    { data: 'advertiser' },
                    { data: 'Media' },
                    { data: 'LaunchDate' },
                    { data: 'Duration' },
                    { data: 'libsignature' },
                    { data: 'Signature' },
                    { data: 'video_Id' }
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
        });

        $(document).ready(function() {
        var table = $('#empTable').DataTable();
        
        $('#empTable tbody').on('click','tr',function () {
            var id = this.cells[10].innerHTML;
            var brand = this.cells[2].innerHTML;
            var konfirmasi = confirm( 'Are You Sure To Open The Detail Of '+brand+" ?");
            if(konfirmasi === true){
                window.location.href="detailvideo.php?idvideo="+id;
            }
            else if (confirm === false){
                window.location.href="index.php";
            }

        } );
    } );

    $(document).ready(function(){
        $('#section').click(function(){
            var year_filter = $('#year').val();
            var section_filter = $('#section').val();
            $.ajax({
                type: 'POST',
                url: 'brand.php?section_filter='+section_filter+'&year_filter='+year_filter,
                data: 'section_filter='+section_filter,
                success: function(response){
                    $('#brand').html(response);
                }
            })
        })
    });
    </script>
    </body>

</html>
