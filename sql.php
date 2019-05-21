<?php


class section{
function __construct(){
    $section;
    include('config.php');
    $query = "SELECT DISTINCT Section FROM videos ORDER BY Section";
    $category = mysqli_query($conn, $query);

    while($section = mysqli_fetch_assoc($category)){
        if($section['Section'] == 'A FOOD')
        {
            echo "A_FOOD";
            echo "<br>";
        }
        else if($section['Section'] == 'B BEVERAGES'){
            echo "B_BEVERAGES";
            echo "<br>";
        }
        else if($section['Section'] == 'C SMOKING & ACCESSORIES'){
            echo "C_SMOKING-ACCESSORIES";
            echo "<br>";
        }
        else if($section['Section'] == 'D BABY & MATERNITY PRODUCTS'){
            echo "D_BABY-MATERNITY_PRODUCTS";
            echo "<br>";
        }
        else if($section['Section'] == 'E MEDICINES/PHARMACEUTICALS'){
            echo "E_MEDICINES-PHARMACEUTICALS";
            echo "<br>";
        }
        else if($section['Section'] == 'F TOILETRIES & COSMETICS'){
            echo "F_TOILETRIES-COSMETICS";
            echo "<br>";
        }
        else if($section['Section'] == 'G APPAREL/PERSONAL ACCESSORIES'){
            echo "G_APPAREL-PERSONAL_ACCESSORIES";
            echo "<br>";
        }
        else if($section['Section'] == 'H HOUSEHOLD PRODUCTS/SUPPLIES'){
            echo "H_HOUSEHOLD_PRODUCTS-SUPPLIES";
            echo "<br>";
        }
        else if($section['Section'] == 'J HOUSEHOLD EQUIPMENT & APPLIANCES'){
            echo "J_HOUSEHOLD_EQUIPMENT-APPLIANCES";
            echo "<br>";
        }
        else if($section['Section'] == 'K AUTOMOTIVE & ACCESSORIES'){
            echo "K_AUTOMOTIVE-ACCESSORIES";
            echo "<br>";
        }
        else if($section['Section'] == 'L INDUSTRIAL PRODUCTS'){
            echo "L_INDUSTRIAL_PRODUCTS";
            echo "<br>";
        }
        else if($section['Section'] == 'M OFFICE EQPT, COMPUTER, COMMUNICATIONS'){
            echo "M_OFFICE_EQPT,COMPUTER,COMMUNICATIONS";
            echo "<br>";
        }
        else if($section['Section'] == 'N SERVICES - FINANCIAL'){
            echo "N_SERVICES-FINANCIAL";
            echo "<br>";
        }
        else if($section['Section'] == 'P SERVICES - TRANST, TRAVEL, RECREATION'){
            echo "P_SERVICES-TRANST,TRAVEL,RECREATION";
            echo "<br>";
        }
        else if($section['Section'] == 'Q SERVICES - PROPERTY'){
            echo "Q_SERVICES-PROPERTY";
            echo "<br>";
        }
        else if($section['Section'] == 'R SERVICES - PERSONAL SERVICES'){
            echo "R_SERVICES-PERSONAL_SERVICES";
            echo "<br>";
        }
        else if($section['Section'] == 'S SERVICES - MEDIA & PROMOTION'){
            echo "S_SERVICES-MEDIA-PROMOTION";
            echo "<br>";
        }
        else if($section['Section'] == 'T SERVICES - EDUCATION'){
            echo "T_SERVICES-EDUCATION";
            echo "<br>";
        }
        else if($section['Section'] == 'U SERVICES - RETAIL'){
            echo "U_SERVICES-RETAIL";
            echo "<br>";
        }
        else if($section['Section'] == 'V SERVICES - CORPORATE & PUBLIC SERV ADV'){
            echo "V_SERVICES-CORPORATE-PUBLIC_SERV_ADV";
            echo "<br>";
        }
        else if($section['Section'] == 'W NON-COMMERCIAL ADVERTISEMENT'){
            echo "W_NON-COMMERCIAL_ADVERTISEMENT";
            echo "<br>";
        }
    }
}

function getData($section){
    return $section;
}

}


function B(){
    include('config.php');
    $query = "SELECT DISTINCT Section FROM videos ORDER BY Section";
    $category = mysqli_query($conn, $query);
    
    while($categories = mysqli_fetch_assoc($category)){
        if($categories['Section'] == 'B BEVERAGES'){
            echo "B_BEVERAGES";
            echo "<br>";
            return;
        }
    }
}

function C(){
    include_once('config.php');
    $query = "SELECT DISTINCT Section FROM videos ORDER BY Section";
    $category = mysqli_query($conn, $query);
    while($categories = mysqli_fetch_assoc($category)){
        if($categories['Section'] == 'C SMOKING & ACCESSORIES'){
            echo "C_SMOKING-ACCESSORIES";
            echo "<br>";
        }
    }
}

function D(){
    include_once('config.php');
    $query = "SELECT DISTINCT Section FROM videos ORDER BY Section";
    $category = mysqli_query($conn, $query);
    while($categories = mysqli_fetch_assoc($category)){
        if($categories['Section'] == 'D BABY & MATERNITY PRODUCTS'){
            echo "D_BABY-MATERNITY_PRODUCTS";
            echo "<br>";
        }
    }
}

function E(){
    include_once('config.php');
    $query = "SELECT DISTINCT Section FROM videos ORDER BY Section";
    $category = mysqli_query($conn, $query);
    while($categories = mysqli_fetch_assoc($category)){
        if($categories['Section'] == 'E MEDICINES/PHARMACEUTICALS'){
            echo "E_MEDICINES-PHARMACEUTICALS";
            echo "<br>";
        }
    }
}

function F(){
    include_once('config.php');
    $query = "SELECT DISTINCT Section FROM videos ORDER BY Section";
    $category = mysqli_query($conn, $query);
    while($categories = mysqli_fetch_assoc($category)){
        if($categories['Section'] == 'F TOILETRIES & COSMETICS'){
            echo "F_TOILETRIES-COSMETICS";
            echo "<br>";
        }
    }
}

function G(){
    include_once('config.php');
    $query = "SELECT DISTINCT Section FROM videos ORDER BY Section";
    $category = mysqli_query($conn, $query);
    while($categories = mysqli_fetch_assoc($category)){
        if($categories['Section'] == 'G APPAREL/PERSONAL ACCESSORIES'){
            echo "G_APPAREL-PERSONAL_ACCESSORIES";
            echo "<br>";
        }
    }
}

function H(){
    include_once('config.php');
    $query = "SELECT DISTINCT Section FROM videos ORDER BY Section";
    $category = mysqli_query($conn, $query);
    while($categories = mysqli_fetch_assoc($category)){
        if($categories['Section'] == 'H HOUSEHOLD PRODUCTS/SUPPLIES'){
            echo "H_HOUSEHOLD_PRODUCTS-SUPPLIES";
            echo "<br>";
        }
    }
}

function J(){
    include_once('config.php');
    $query = "SELECT DISTINCT Section FROM videos ORDER BY Section";
    $category = mysqli_query($conn, $query);
    while($categories = mysqli_fetch_assoc($category)){
        if($categories['Section'] == 'J HOUSEHOLD EQUIPMENT & APPLIANCES'){
            echo "J_HOUSEHOLD_EQUIPMENT-APPLIANCES";
            echo "<br>";
        }
    }
}

function K(){
    include_once('config.php');
    $query = "SELECT DISTINCT Section FROM videos ORDER BY Section";
    $category = mysqli_query($conn, $query);
    while($categories = mysqli_fetch_assoc($category)){
        if($categories['Section'] == 'K_AUTOMOTIVE-ACCESSORIES'){
            echo "K_AUTOMOTIVE-ACCESSORIES";
            echo "<br>";
        }
    }
}

function L(){
    include_once('config.php');
    $query = "SELECT DISTINCT Section FROM videos ORDER BY Section";
    $category = mysqli_query($conn, $query);
    while($categories = mysqli_fetch_assoc($category)){
        if($categories['Section'] == 'L INDUSTRIAL PRODUCTS'){
            echo "L_INDUSTRIAL_PRODUCTS";
            echo "<br>";
        }
    }
}

function M(){
    include_once('config.php');
    $query = "SELECT DISTINCT Section FROM videos ORDER BY Section";
    $category = mysqli_query($conn, $query);
    while($categories = mysqli_fetch_assoc($category)){
        if($categories['Section'] == 'M OFFICE EQPT, COMPUTER, COMMUNICATIONS'){
            echo "M_OFFICE_EQPT,COMPUTER,COMMUNICATIONS";
            echo "<br>";
        }
    }
}

function N(){
    include_once('config.php');
    $query = "SELECT DISTINCT Section FROM videos ORDER BY Section";
    $category = mysqli_query($conn, $query);
    while($categories = mysqli_fetch_assoc($category)){
        if($categories['Section'] == 'N SERVICES - FINANCIAL'){
            echo "N_SERVICES-FINANCIAL";
            echo "<br>";
        }
    }
}

function P(){
    include_once('config.php');
    $query = "SELECT DISTINCT Section FROM videos ORDER BY Section";
    $category = mysqli_query($conn, $query);
    while($categories = mysqli_fetch_assoc($category)){
        if($categories['Section'] == 'P SERVICES - TRANST, TRAVEL, RECREATION'){
            echo "P_SERVICES-TRANST,TRAVEL,RECREATION";
            echo "<br>";
        }
    }
}

function Q(){
    include_once('config.php');
    $query = "SELECT DISTINCT Section FROM videos ORDER BY Section";
    $category = mysqli_query($conn, $query);
    while($categories = mysqli_fetch_assoc($category)){
        if($categories['Section'] == 'Q SERVICES - PROPERTY'){
            echo "Q_SERVICES-PROPERTY";
            echo "<br>";
        }
    }
}

function R(){
    include_once('config.php');
    $query = "SELECT DISTINCT Section FROM videos ORDER BY Section";
    $category = mysqli_query($conn, $query);
    while($categories = mysqli_fetch_assoc($category)){
        if($categories['Section'] == 'R SERVICES - PERSONAL SERVICES'){
            echo "R_SERVICES-PERSONAL_SERVICES";
            echo "<br>";
        }
    }
}

function S(){
    include_once('config.php');
    $query = "SELECT DISTINCT Section FROM videos ORDER BY Section";
    $category = mysqli_query($conn, $query);
    while($categories = mysqli_fetch_assoc($category)){
        if($categories['Section'] == 'S SERVICES - MEDIA & PROMOTION'){
            echo "S_SERVICES-MEDIA-PROMOTION";
            echo "<br>";
        }
    }
}

function T(){
    include_once('config.php');
    $query = "SELECT DISTINCT Section FROM videos ORDER BY Section";
    $category = mysqli_query($conn, $query);
    while($categories = mysqli_fetch_assoc($category)){
        if($categories['Section'] == 'T SERVICES - EDUCATION'){
            echo "T_SERVICES-EDUCATION";
            echo "<br>";
        }
    }
}

function U(){
    include_once('config.php');
    $query = "SELECT DISTINCT Section FROM videos ORDER BY Section";
    $category = mysqli_query($conn, $query);
    while($categories = mysqli_fetch_assoc($category)){
        if($categories['Section'] == 'U SERVICES - RETAIL'){
            echo "U_SERVICES-RETAIL";
            echo "<br>";
        }
    }
}

function V(){
    include_once('config.php');
    $query = "SELECT DISTINCT Section FROM videos ORDER BY Section";
    $category = mysqli_query($conn, $query);
    while($categories = mysqli_fetch_assoc($category)){
        if($categories['Section'] == 'V SERVICES - CORPORATE & PUBLIC SERV ADV'){
            echo "V_SERVICES-CORPORATE-PUBLIC_SERV_ADV";
            echo "<br>";
        }
    }
}

function W(){
    include_once('config.php');
    $query = "SELECT DISTINCT Section FROM videos ORDER BY Section";
    $category = mysqli_query($conn, $query);
    while($categories = mysqli_fetch_assoc($category)){
        if($categories['Section'] == 'W NON-COMMERCIAL ADVERTISEMENT'){
            echo "W_NON-COMMERCIAL_ADVERTISEMENT";
            echo "<br>";
        }
    }
}

?>