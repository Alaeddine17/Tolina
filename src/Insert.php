<?php

include './config/config.php';

session_start();


    foreach($_SESSION['shopping_cart'] as $key => $values){


        $date_remise = $_SESSION['date_remise'];
        $Id_client = $_SESSION['user'][0];
        $repas     = $values['Repas'];
        $quantite  = $values['Quantité'];
        $prix      = $values['Prix'];
        $date = date("Y-m-d", time());
        $prixTotal = $prix * $quantite;

    
        $sqlInsert = "INSERT INTO commande(Repas, Quantité, PrixTotal, created_at, date_remise,Id_client) VALUES ('$repas', '$quantite', '$prixTotal','$date','$date_remise','$Id_client')";
        $adapterquery = mysqli_query($connect, $sqlInsert);

    }

    if($adapterquery){
       
        echo '<script>alert("Votre commande a été réservée avec succès.");</script>';
        echo "<script>window.location = 'pdf.php'</script>";

    }else{
        echo "Error : " . mysqli_Error($connect);
    }



?>