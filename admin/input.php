<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>FORM VIDEO</title>
    <?php
    include_once('navbar.php');
    ?>

</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div >
            <h2>Import Database</h2>
            </div>
        </div>
        <div class="" >
            <form action="inputdb.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="name">Import Database</label>
                    <input name="db" style="margin-left: 30px" type="file" class="" id="name" require>
                </div>
                <input style="margin-top: 30px" name="submit" type="submit" class="btn btn-primary" value="submit">
            </form>
        </div>
    </div>
</body>
</html>