<?php

include("./config/config.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" integrity="sha512-Avb2QiuDEEvB4bZJYdft2mNjVShBftLdPG8FJ0V7irTLQ8Uo0qcPxh4Plq7G5tGm0rU+1SPhVotteLpBERwTkw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="../output.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <title>Analyse</title>
</head>
<body>


<div class="p-4 sm:ml-12 md:ml-20 lg:ml-26">
    <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">



<div class="flex items-center p-4 mb-4 text-sm text-blue-800 border border-blue-300 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400 dark:border-blue-800" role="alert">
  <svg class="flex-shrink-0 inline w-4 h-4 mr-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
  </svg>
  <span class="sr-only">Info</span>
  <div>
    <span class="font-medium"><u>Info alert!</u></span> Change a few things up and try submitting again.
  </div>
</div>

<div class="text-sm font-medium text-center text-gray-500 border-b border-gray-200 dark:text-gray-400 dark:border-gray-700">
    <ul class="flex flex-wrap -mb-px">
        <li class="me-2">
            <a href="./admin_page.php?action=shop" class="inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300">Commandes</a>
        </li>
        <li class="me-2">
            <a href="admin_page.php?action=reservation" class="inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300">Reservations</a>
        </li>
        <li class="me-2">
            <a href="#" class="inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300">Contacts</a>
        </li>
    
    </ul>
</div>

<?php 
if(isset($_GET['action']) && $_GET['action'] == "shop"){ 
    if(isset($_GET['ID'])){ ?>
<div id="select">
    <div class="space-y-10 md:space-y-0 flex flex-col md:flex-row md:justify-around bg-white shadow overflow-hidden sm:rounded-lg text-sm lg:text-md pt-4 pb-8">
   
<div class="md:w-1/3 shadow-lg">
    <div class="text-center px-4 py-5 sm:px-6">
        <h3 class="text-lg leading-6 font-medium text-gray-900">
            Information de client
        </h3>
        <p class="mt-1 max-w-2xl text-sm text-gray-500">
            Details et informations sur le client.
        </p>
    </div>
        
<div class="flex flex-row">
        <ul class="w-1/2">
            <li class="border-b border-l p-2 border-gray-200">ID Client</li>
            <li class="border-b border-l p-2 border-gray-200">Nom et Prénom</li>
            <li class="border-b border-l p-2 border-gray-200">Adress E-mail</li>
            <li class="border-b border-l p-2 border-gray-200">N° Telephone</li>
        </ul>   
        <ul class="w-1/2"> 
<?php 
$sqlselectclient = "SELECT Id_client, utilisateur, tel, email FROM `utilisateurs` WHERE Id_client = '" . $_GET['ID'] . "'";
$sqlAdapterclient = mysqli_query($connect, $sqlselectclient);
$resultclient = mysqli_fetch_assoc($sqlAdapterclient);
?>
            <li class="border-b border-r p-2 border-gray-200"><?php echo $resultclient['Id_client']?></li>
            <li class="border-b border-r p-2 border-gray-200"><?php echo $resultclient['utilisateur']?></li>
            <li class="border-b border-r p-2 border-gray-200"><?php echo $resultclient['email']?></li>
            <li class="border-b border-r p-2 border-gray-200">0<?php echo $resultclient['tel']?></li>
        </ul>
    </div>    
</div>
<div class="border-gray-200 md:w-1/2 shadow-lg">
    <div class="px-4 py-5 sm:px-6 text-center">
        <h3 class="text-lg leading-6 font-medium text-gray-900">
            Information de commande
        </h3>
        <p class="mt-1 max-w-2xl text-gray-500">
            Details et informations sur la commande.
        </p>
    </div>
    <table class="w-full text-sm text-center rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs md:text-sm text-center text-gray-700 bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
        <tr class="text-center">
            <th scope="col" class="text-center py-3">N°Commande</th>
            <th scope="col" class="text-center py-3">Commande</th>
            <th scope="col" class="text-center py-3">Quentité</th>
            <th scope="col" class="text-center py-3">Total Prix</th>
            <th scope="col" class="text-center py-3">Date de remise</th>
            <th scope="col" class="text-center py-3">Date de commade</th>
       </tr>
        </thead>
        <tbody class="border">
        
        <?php
            $sqlCommande = "SELECT ID, Repas, Quantité, PrixTotal, created_at, date_remise, Etat FROM commande JOIN utilisateurs ON commande.Id_client = utilisateurs.Id_client WHERE commande.Id_client = '" . $_GET['ID'] . "'";
            $sqlcommandeAdp = mysqli_query($connect, $sqlCommande);
            while($resultcommande = mysqli_fetch_assoc($sqlcommandeAdp)){
        ?>
        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
            <th class="px-6 py-4 whitespace-nowrap dark:text-white"><?php echo $resultcommande['ID']?></th>
            <td class="py-1"><?php echo $resultcommande['Repas']?></td>
            <td class="py-1"><?php echo $resultcommande['Quantité']?></td>
            <td class="py-1"><?php echo $resultcommande['PrixTotal']?> DH</td>
            <td class="py-1"><?php echo $resultcommande['date_remise']?></td>
            <td class="py-1"><?php echo $resultcommande['created_at']?>
            </td>                     
        </tr>
        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
        <td class="py-2" colspan="6">
           <?php if(empty($resultcommande['Etat'])){ ?>
            <a href="admin_validation.php?section=commande&IDcommande=<?php echo $resultcommande['ID']?>" class="border border-gray-300 p-1 px-2 text-white text-md font-semibold bg-green-400 rounded my-2">valider la commande!</a> 
           <?php } else{ ?>
            <span class="p-1 px-2 text-md font-semibold my-2">Commande valide!</span>
           <?php } ?> 
        </td>
        </tr>
        
        <?php } 
        mysqli_free_result($sqlcommandeAdp);
        mysqli_free_result($sqlAdapterclient);
        ?>
         

    </tbody>

    </div>

</div>
    
    </div>
</div>
   <?php }else{?>
    
   
    <table class="w-full text-sm text-center rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-center text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
        <tr class="text-center">
            <th scope="col" class="text-center py-3">Commande</th>
            <th scope="col" class="text-center py-3">Quantité</th>
            <th scope="col" class="text-center py-3 hidden md:block">Date de commade</th>
            <th scope="col" class="text-center py-3">Date de remise</th>
            <th scope="col" class="text-center py-3">status</th>
        </tr>
        </thead>
        <tbody class="border">
        <?php 
        $sqlselect  = "SELECT utilisateurs.Id_client as Id_client, Repas, created_at, Quantité, date_remise, utilisateur, created_at, Etat FROM commande JOIN utilisateurs ON commande.Id_client = utilisateurs.Id_client ORDER BY commande.date_remise";
        $sqlAdapter = mysqli_query($connect, $sqlselect);
        while($row = mysqli_fetch_assoc($sqlAdapter)){ ?>
        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
            <th class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white"><a href="admin_page.php?action=shop&ID=<?php echo $row['Id_client']?>"><?php echo $row['Repas']?></a></th>
            <td class="py-1"><a href="admin_page.php?action=shop&ID=<?php echo $row['Id_client']?>"><?php echo $row['Quantité']?></a></td>
            <td class="py-1"><a href="admin_page.php?action=shop&ID=<?php echo $row['Id_client']?>"><?php echo $row['created_at']?></a></td>
            <td class="py-1 hidden md:block"><a href="admin_page.php?action=shop&ID=<?php echo $row['Id_client']?>"><?php echo $row['date_remise']?></a></td>
            <td class="py-1">
                <?php if($row['Etat']){ ?>
                    <i class="fa-solid fa-check"></i>
               <?php } ?>
            </td>
        </tr>
        <?php 
            }
        mysqli_free_result($sqlAdapter);
        mysqli_close($connect);
    
        ?>
        </tbody>
    </table>


<?php 
    }
} elseif(isset($_GET['action']) && $_GET['action'] == 'reservation'){ 
    if(isset($_GET['ID'])){ ?>

<div id="select">
    <div class="space-y-10 md:space-y-0 flex flex-col md:flex-row md:justify-around bg-white overflow-hidden sm:rounded-lg pt-4 pb-8">
   
<div class="md:w-1/3 shadow-lg">
    <div class="text-center px-4 py-5 sm:px-6">
        <h3 class="text-lg leading-6 font-medium text-gray-900">
            Informations du client
        </h3>
        <p class="mt-1 max-w-2xl text-sm text-gray-500">
            Details et informations sur le client.
        </p>
    </div>
        
<div class="flex md:flex-row">
        <ul class="w-1/2">
            <li class="border-b border-l p-2 border-gray-200">ID Client</li>
            <li class="border-b border-l p-2 border-gray-200">Nom et Prénom</li>
            <li class="border-b border-l p-2 border-gray-200">Adress E-mail</li>
            <li class="border-b border-l p-2 border-gray-200">N° Telephone</li>
        </ul>   
        <ul class="w-1/2"> 
<?php 
$sqlselectclient = "SELECT Id_client, utilisateur, tel, email FROM `utilisateurs` WHERE Id_client = '" . $_GET['ID'] . "'";
$sqlAdapterclient = mysqli_query($connect, $sqlselectclient);
$resultclient = mysqli_fetch_assoc($sqlAdapterclient);
mysqli_free_result($sqlAdapterclient);
?>
            <li class="border-b border-r p-2 border-gray-200"><?php echo $resultclient['Id_client']?></li>
            <li class="border-b border-r p-2 border-gray-200"><?php echo $resultclient['utilisateur']?></li>
            <li class="border-b border-r p-2 border-gray-200"><?php echo $resultclient['email']?></li>
            <li class="border-b border-r p-2 border-gray-200">0<?php echo $resultclient['tel']?></li>
        </ul>
    </div>    
</div>
<div class="border-gray-200 md:w-1/2 shadow-lg">
    <div class="px-4 py-5 sm:px-6 text-center">
        <h3 class="text-lg leading-6 font-medium text-gray-900">
            Informations de la réservation
        </h3>
        <p class="mt-1 max-w-2xl text-sm text-gray-500">
            Details et informations sur la réservation.
        </p>
    </div>
    <table class="w-full text-sm text-center rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-center text-gray-700 bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
        <tr class="text-center">
            <th scope="col" class="text-center py-3">N°réservation</th>
            <th scope="col" class="text-center py-3">Réservation</th>
            <th scope="col" class="text-center py-3">QtéPersonne</th>
            <th scope="col" class="text-center py-3">Le jour & Heure</th>
            <th scope="col" class="text-center py-3">Date de réservation</th>
       </tr>
        </thead>
        <tbody class="border">
        
        <?php
            $sqlReservation = "SELECT ID, NomPrenom, QtePersonne, Jour, Heure, created_at, Etat FROM reservation JOIN utilisateurs ON reservation.Id_client = utilisateurs.Id_client WHERE reservation.Id_client = '" . $_GET['ID'] . "'";
            $sqlReservationAdp = mysqli_query($connect, $sqlReservation);
            while($resultReservation = mysqli_fetch_assoc($sqlReservationAdp)){
        ?>
        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
            <th class="px-6 py-4 whitespace-nowrap dark:text-white"><?php echo $resultReservation['ID']?></th>
            <td class="py-1"><?php echo $resultReservation['NomPrenom']?></td>
            <td class="py-1"><?php echo $resultReservation['QtePersonne']?></td>
            <td class="py-1"><?php echo $resultReservation['Jour'] . " " . $resultReservation['Heure']?></td>
            <td class="py-1"><?php echo $resultReservation['created_at']?>
            </td>                     
        </tr>
        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
        <td class="py-2" colspan="6">
           <?php if(empty($resultReservation['Etat'])){ ?>
            <a href="admin_validation.php?section=reservation&IDreservation=<?php echo $resultReservation['ID']?>" class="border border-gray-300 p-1 px-2 text-white text-md font-semibold bg-green-400 rounded my-2">valider la commande!</a> 
           <?php } else{ ?>
            <span class="p-1 px-2 text-md font-semibold my-2">Réservation valide!</span>
           <?php } ?> 
        </td>
        </tr>
        
        <?php } ?>
         
        

    </tbody>

    </div>

</div>
    
    </div>
</div>

<?php 
    }else{ ?>
    <table class="w-full text-sm text-center rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-center text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
        <tr class="text-center">
            <th scope="col" class="text-center py-3">Reserveur</th>
            <th scope="col" class="text-center py-3">Quantité</th>
            <th scope="col" class="text-center py-3 hidden md:block">Date de commade</th>
            <th scope="col" class="text-center py-3">status</th>
        </tr>
        </thead>
        <tbody class="border">
        <?php 
        $sqlselectR  = "SELECT utilisateurs.Id_client as Id_client,NomPrenom ,QtePersonne ,Jour ,Heure , created_at, utilisateur, Telephone, Etat FROM reservation JOIN utilisateurs ON reservation.Id_client = utilisateurs.Id_client ORDER BY reservation.Jour";
        $sqlAdapterR = mysqli_query($connect, $sqlselectR);
        while($rowR = mysqli_fetch_assoc($sqlAdapterR)){ ?>
        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
            <th class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white"><a href="admin_page.php?action=reservation&ID=<?php echo $rowR['Id_client']?>"><?php echo $rowR['NomPrenom']?></a></th>
            <td class="py-1"><a href="#"><?php echo $rowR['Jour']?></a></td>
            <td class="py-1"><a href="#"><?php echo $rowR['created_at']?></a></td>
            <td class="py-1">
                <?php if($rowR['Etat']){ ?>
                    <i class="fa-solid fa-check"></i>
               <?php } ?>
            </td>
            
        </tr>
        <?php 
            }
        mysqli_free_result($sqlAdapterR);
        mysqli_close($connect);
    
        ?>
        </tbody>
    </table>
   <?php }
}
?>


</div>
</div>

</body>
</html>