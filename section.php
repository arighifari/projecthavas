<?php
class section{
function __construct($idvideo){
    include('config.php');
    $query = "SELECT DISTINCT Section FROM videos where Signature = '$idvideo'";
    $category = mysqli_query($conn, $query);

    while($section = mysqli_fetch_assoc($category)){
        if($section['Section'] == 'A FOOD')
        {
            echo "A_FOOD";

        }
        else if($section['Section'] == 'B BEVERAGES'){
            echo "B_BEVERAGES";

        }
        else if($section['Section'] == 'C SMOKING & ACCESSORIES'){
            echo "C_SMOKING-ACCESSORIES";

        }
        else if($section['Section'] == 'D BABY & MATERNITY PRODUCTS'){
            echo "D_BABY-MATERNITY_PRODUCTS";

        }
        else if($section['Section'] == 'E MEDICINES/PHARMACEUTICALS'){
            echo "E_MEDICINES-PHARMACEUTICALS";

        }
        else if($section['Section'] == 'F TOILETRIES & COSMETICS'){
            echo "F_TOILETRIES-COSMETICS";

        }
        else if($section['Section'] == 'G APPAREL/PERSONAL ACCESSORIES'){
            echo "G_APPAREL-PERSONAL_ACCESSORIES";

        }
        else if($section['Section'] == 'H HOUSEHOLD PRODUCTS/SUPPLIES'){
            echo "H_HOUSEHOLD_PRODUCTS-SUPPLIES";

        }
        else if($section['Section'] == 'J HOUSEHOLD EQUIPMENT & APPLIANCES'){
            echo "J_HOUSEHOLD_EQUIPMENT-APPLIANCES";

        }
        else if($section['Section'] == 'K AUTOMOTIVE & ACCESSORIES'){
            echo "K_AUTOMOTIVE-ACCESSORIES";

        }
        else if($section['Section'] == 'L INDUSTRIAL PRODUCTS'){
            echo "L_INDUSTRIAL_PRODUCTS";

        }
        else if($section['Section'] == "M OFFICE EQP'T, COMPUTER, COMMUNICATIONS"){
            echo "M_OFFICE_EQPT,COMPUTER,COMMUNICATIONS";

        }
        else if($section['Section'] == 'N SERVICES - FINANCIAL'){
            echo "N_SERVICES-FINANCIAL";

        }
        else if($section['Section'] == "P SERVICES - TRANS'T, TRAVEL, RECREATION"){
            echo "P_SERVICES-TRANST,TRAVEL,RECREATION";

        }
        else if($section['Section'] == 'Q SERVICES - PROPERTY'){
            echo "Q_SERVICES-PROPERTY";

        }
        else if($section['Section'] == 'R SERVICES - PERSONAL SERVICES'){
            echo "R_SERVICES-PERSONAL_SERVICES";

        }
        else if($section['Section'] == 'S SERVICES - MEDIA & PROMOTION'){
            echo "S_SERVICES-MEDIA-PROMOTION";

        }
        else if($section['Section'] == 'T SERVICES - EDUCATION'){
            echo "T_SERVICES-EDUCATION";

        }
        else if($section['Section'] == 'U SERVICES - RETAIL'){
            echo "U_SERVICES-RETAIL";

        }
        else if($section['Section'] == 'V SERVICES - CORPORATE & PUBLIC SERV ADV'){
            echo "V_SERVICES-CORPORATE-PUBLIC_SERV_ADV";

        }
        else if($section['Section'] == 'W NON-COMMERCIAL ADVERTISEMENT'){
            echo "W_NON-COMMERCIAL_ADVERTISEMENT";

        }
    }
}

}
?>