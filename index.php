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
    <link rel="stylesheet" href="style.css">
    

    <!-- Font Awesome JS -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>

    <?php
        include_once('config.php');
        include_once('pagination.php');
        
        $result=mysqli_query($conn,"SELECT * FROM videos");

        $limit      = ( isset( $_GET['limit'] ) ) ? $_GET['limit'] : 20;
        $page       = ( isset( $_GET['page'] ) ) ? $_GET['page'] : 1;
        $links      = ( isset( $_GET['links'] ) ) ? $_GET['links'] : 3;
        $query = "SELECT * FROM videos";
    
        $Paginator  = new Paginator( $conn, $query );
    
        $results    = $Paginator->getData(  $limit, $page );
    ?>
</head>

<body>
<div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <h3>Video</h3>
            </div>

            <ul class="list-unstyled components">
                <p>Home</p>
                <li>
                    <a href="index.php">
                    <span style="font-size: 20px; color: #cfcfd1;">
                        <i class="fas fa-home"></i>
                        </span>
                            Home
                        </i>
                    </a>
                    <!-- <ul class="collapse list-unstyled" id="homeSubmenu">
                        <li>
                            <a href="#">Home 1</a>
                        </li>
                        <li>
                            <a href="#">Home 2</a>
                        </li>
                        <li>
                            <a href="#">Home 3</a>
                        </li>
                    </ul> -->
                </li>
                <li>
                    <a href="input.php">Upload Video</a>
                </li>
            </ul>
            
            <div class="sidebar-search">
            <div>
                <div class="input-group">
                    <input type="text" class="form-control search-menu" placeholder="Search...">
                    <div class="input-group-append">
                        <span class="input-group-text">
                        <i class="fa fa-search" aria-hidden="true"></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        </nav>

        <!-- Page Content  -->
        <div id="content">

            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">

                    <button type="button" id="sidebarCollapse" class="btn btn-info">
                        <i class="fas fa-align-left"></i>
                    </button>
                    <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fas fa-align-justify"></i>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="nav navbar-nav ml-auto">
                            <li class="nav-item">
                                <i class="far fa-user"> <span><a href="#">Login</a></span></i>
                            </li>
                            <li>
                            </li>  
                        </ul>
                    </div>
                </div>
            </nav>
            
            <div class="container-fluid">
                <div class="row">
                    <div >
                        <h2>Daftar Video</h2>
                    </div>
                </div>
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
                    ?>
                </table>
            </div>
            <?php echo $Paginator->createLinks( $links, 'pagination pagination-lg justify-content-center' ); ?>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <!-- <script type="text/javascript" src="js/addons/datatables.min.js"></script> -->

    <script type="text/javascript">
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
            });
        });

        // $(document).ready(function () {
        //     $('#dtBasicExample').DataTable();
        //     $('.dataTables_length').addClass('bs-select');
        // });
        
    </script>
</body>

</html>

<!-- <script type="text/javascript">

</script> -->