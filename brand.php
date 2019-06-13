<?php
include('config.php');

$year_filter = $_GET['year_filter'];

$year = "";
$section = "";

$section_filter = mysqli_real_escape_string($conn, $_POST['section_filter']);

$brand = mysqli_query($conn, "SELECT DISTINCT Brand FROM videos where Year = '$year_filter' and Section like '".$section_filter."%' ORDER BY Brand");
?>
<?php 
if ($year == $year_filter){
    $brand = mysqli_query($conn, "SELECT DISTINCT Brand FROM videos WHERE Year = '$year_filter' ORDER BY Brand");?>
<select class="custom-select custom-select-sm" style="margin-left: 3px" name='brand' id='brand'>
    <option  value=''>Brand</option>
<?php
    while($brands = mysqli_fetch_assoc($brand)){ ?>
    <option class='common-selector Brand' value='<?= $brands['Brand']?>'><?= $brands['Brand']?></option>                         
        <?php }?>
</select>        
    <?php 
    if ($year_filter == ""){
        $brand = mysqli_query($conn, "SELECT DISTINCT Brand FROM videos ORDER BY Brand");?>
    <select class="custom-select custom-select-sm" style="margin-left: 3px" name='brand' id='brand'>
    <?php
        while($brands = mysqli_fetch_assoc($brand)){ ?>
        <option class='common-selector Brand' value='<?= $brands['Brand']?>'><?= $brands['Brand']?></option>                         
            <?php }?>
    </select>        
    <?php } ?>


<?php } 

else {
?>
<select class="custom-select custom-select-sm" style="margin-left: 3px" name='brand' id='brand'>
    <option  value=''>Brand</option>
    <?php
    while($brands = mysqli_fetch_assoc($brand)){ ?>
    <option class='common-selector Year' value='<?= $brands['Brand']?>'><?= $brands['Brand']?></option>                          
    <?php }?>
</select>
<?php } ?>
