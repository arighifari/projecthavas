<?php
include('config.php');

$year_filter = $_GET['year_filter'];
$section_filter = mysqli_real_escape_string($conn, $_GET['section_filter']);

$year = "";
$section = "";


$category = mysqli_query($conn, "SELECT DISTINCT Category FROM videos where Year = '$year_filter' and Section like '".$section_filter."%' ORDER BY Category");
?>
<?php 
if ($year == $year_filter){
    $category = mysqli_query($conn, "SELECT DISTINCT Category FROM videos WHERE Year = '$year_filter' ORDER BY Category");?>
<select class="custom-select custom-select-sm" style="margin-left: 3px" name='category' id='category'>
    <option  value=''>Category</option>
<?php
    while($categories = mysqli_fetch_assoc($category)){ ?>
    <option class='common-selector Category' value='<?= $categories['Category']?>'><?= $categories['Category']?></option>                         
        <?php }?>
</select>        
    <?php 
    if ($year_filter == ""){
        $category = mysqli_query($conn, "SELECT DISTINCT Category FROM videos WHERE Section like '".$section_filter."%' ORDER BY Category");?>
    <select class="custom-select custom-select-sm" style="margin-left: 3px" name='category' id='category'>
        <!-- <option  value=''>Category</option> -->
        <?php
            while($categories = mysqli_fetch_assoc($category)){ ?>
        <option class='common-selector Category' value='<?= $categories['Category']?>'><?= $categories['Category']?></option>                         
        <?php }?>
    </select>        
    <?php } ?>

<?php } 
else {
?>
<select class="custom-select custom-select-sm" style="margin-left: 3px" name='category' id='category'>
    <option  value=''>Category</option>
    <?php
    while($categories = mysqli_fetch_assoc($category)){ ?>
    <option class='common-selector Category' value='<?= $categories['Category']?>'><?= $categories['Category']?></option>                          
    <?php }?>
</select>
<?php } ?>
