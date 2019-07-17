<!doctype html>
<html>
    <head>
    <title>AdWatch</title>
    <?php 
    include('navbar.php');
    include('config.php');

    $result = mysqli_query($conn,"SELECT * FROM videos");
    $results = mysqli_fetch_assoc($result);
        
    $year = mysqli_query($conn,"SELECT DISTINCT Year FROM videos ORDER BY Year");
    $last_year = mysqli_query($conn,"SELECT DISTINCT Year FROM videos ORDER BY Year DESC LIMIT 1");
    $latest_year = mysqli_fetch_assoc($last_year);
    $section = mysqli_query($conn, "SELECT DISTINCT Section FROM videos ORDER BY Section");
    $brand = mysqli_query($conn, "SELECT DISTINCT Brand FROM videos ORDER BY Brand");
    $category = mysqli_query($conn, "SELECT DISTINCT Category FROM videos ORDER BY Category");
    $libsignature = mysqli_query($conn, "SELECT DISTINCT libsignature FROM videos ORDER BY libsignature");
    ?>
    <!-- Datatable CSS -->  
    <link href='DataTables/datatables.min.css' rel='stylesheet' type='text/css'>

    <!-- jQuery Library -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
     
    <!-- Datatable JS -->
    <script src="DataTables/datatables.min.js"></script>
    
    </head>
    <body>

        <div>    
            <!-- Custom Filter -->
            <h2 style="margin-left: 10px">ADS FILTER</h2>
            <form action="" method="post">
            <table>
                    <tr>
                        <td><label for="year" style="margin-left: 10px; margin-top:5px">Year</label></td>
                        <td>
                        <select class="custom-select custom-select-sm" style="margin-left: 3px" name='year' id='year'>
                            <option  value='<?= $latest_year['Year'] ?>'><?= $latest_year['Year'] ?></option>
                            <option value=''>All Year</option>
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
                        <td><label for="category" style="margin-left: 10px; margin-top:5px">Category</label></td>
                        <td>
                        <select class="custom-select custom-select-sm" style="margin-left: 3px" name='cayegory' id='category'>
                            <option  value=''>Category</option>
                        <?php
                            while($categories = mysqli_fetch_assoc($category)){ ?>
                            <option class='common-selector Year' value='<?= $categories['Category']?>'><?= $categories['Category']?></option>                         
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
                    <th>Advertiser</th>
                    <th>Media</th>
                    <th>LaunchDate</th>
                    <th>Duration</th>
                    <th>Signature</th>
                    </tr>
                </thead>
            </table>    
        </div>

        <script type="text/javascript">
        $(document).ready(function(){
            var dataTable = $('#empTable').DataTable({
                // "scrollY"       : "500px",
                // "scrollCollapse": true,
                'processing'    : true,
                'serverSide'    : true,
                // 'searching'     : true, // Remove default Search Control
                'ajax': {
                    'url':'ajax/ajaxfile.php',
                    'type' : 'post',
                    'data': function(data){
                        // Read values
                        var year = $('#year').val();
                        var section = $('#section').val();
                        var category = $('#category').val();
                        var brand = $('#brand').val();

                        // Append to data
                        data.year = year;
                        data.section = section;
                        data.category = category;
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
                    { data: 'Signature' }
                    // { data: 'button'}
                ]
            });

            $('#year').click(function(){
                dataTable.draw();
            });
            $('#section').click(function(){
                dataTable.draw();
            });
            $('#category').click(function(){
                dataTable.draw();
            });
            $('#brand').click(function(){
                dataTable.draw();
            });
        });

        $(document).ready(function() {
        var table = $('#empTable').DataTable();
        
        $('#empTable tbody').on('click','tr',function () {
            var id = this.cells[8].innerHTML;
            var brand = this.cells[2].innerHTML;
            var konfirmasi = confirm( 'Are You Sure To Open The Detail Of '+brand+" ?");
            if(konfirmasi === true){
                window.location.href="detailvideo.php?idvideo="+id;
            }
            else if (confirm === false){
                window.location.href="home.php";
            }

        } );
    } );
    $(document).ready(function(){
        $('#section').click(function(){
            var year_filter = $('#year').val();
            var section_filter = $('#section').val();
            $.ajax({
                type: 'POST',
                url: 'category.php?section_filter='+section_filter+'&year_filter='+year_filter,
                data: 'section_filter='+section_filter,
                success: function(response){
                    $('#category').html(response);
                }
            })
        })
    });

    $(document).ready(function(){
        $('#category').click(function(){
            var year_filter = $('#year').val();
            var section_filter = $('#section').val();
            var category_filter = $('#category').val();
            $.ajax({
                type: 'POST',
                url: 'brand.php?section_filter='+section_filter+'&year_filter='+year_filter+'&category_filter='+category_filter,
                data: 'category_filter='+category_filter,
                success: function(response){
                    $('#brand').html(response);
                }
            })
        })
    });
    </script>
    </body>

</html>
