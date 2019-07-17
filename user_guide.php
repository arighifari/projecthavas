<!DOCTYPE html>
<html lang="en">
<head>
    <?php 
    include('navbar.php');
    include('config.php');
    ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User Guide</title>
</head>
<body>
 <div class="container-fluid" id="codelatte">
  <nav class="navbar mb-6">
   <h3 class="mx-auto">User Guide For AdWatch</h3>
  </nav>
  <div class="row justify-content-center text-center" style="margin-top: 3%;">
   <div class="card float-left col-md-6 mr-6" style="width: 40%;">
    <div class="card-body">
     <h2 class="card-title">Step 1</h2>
     <img class="img-fluid mb-6" src="image/step1.png" alt="Card image cap" style="height: 300px; widht: 300px;">
    </div>
   </div>
   <div class="card float-left col-md-6 mr-6" style="width: 40%;">
    <div class="card-body">
     <h2 class="card-title">Step 2</h2>
     <img class="img-fluid mb-6" src="image/step2.png" alt="Card image cap" style="height: 300px; widht: 300px;">
    </div>
   </div>
  </div>
  <div class="row justify-content-center mt-6 text-center">
   <div class="card float-left col-md-6 mr-6" style="width: 40%;">
    <div class="card-body">
     <h2 class="card-title">Step 3</h2>
     <img class="img-fluid mb-6" src="image/step3.png" alt="Card image cap" style="height: 300px; widht: 300px;">
    </div>
   </div>
   <div class="card float-left col-md-6 mr-6" style="width: 40%;">
    <div class="card-body">
     <h2 class="card-title">Step 4</h2>
     <img class="img-fluid mb-6" src="image/step4.png" alt="Card image cap" style="height: 300px; widht: 300px;">
    </div>
   </div>
  </div>
  <div class="row justify-content-center mt-6 text-center">
   <div class="card float-left col-md-6 mr-6" style="width: 40%;">
    <div class="card-body">
     <h2 class="card-title">Step 5</h2>
     <img class="img-fluid mb-6" src="image/step5.png" alt="Card image cap" style="height: 300px; widht: 300px;">
    </div>
   </div>
   <div class="card float-left col-md-6 mr-6" style="width: 40%;">
    <div class="card-body">
     <h2 class="card-title">Step 6</h2>
     <img class="img-fluid mb-6" src="image/step6.png" alt="Card image cap" style="height: 300px; widht: 300px;">
    </div>
   </div>
  </div>
 </div>
 <script>
  function changeWide(){
                document.getElementById("codelatte").className = "container-fluid";
              }
                function changeBoxed(){
                document.getElementById("codelatte").className = "container ";
              }
 </script>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
 <script src="assets/js/bootstrap.min.js"></script>
</body>
</html>