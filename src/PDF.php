
<?php
session_start();

include './config/config.php';

$date_remise = $_SESSION['date_remise'];
unset($_SESSION['date_remise']);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.5.0-beta4/html2canvas.min.js"></script>
    <link href="../output.css" rel="stylesheet">

    
    <title>Document</title>
</head>
<body>




<div class="container mx-auto w-3/5 md:w-2/4 lg:w-1/3 xl:w-1/4 md:mt-16 rounded-lg bg-white shadow-xs text-gray-700 mt-14">   
        
    
        <div id="content" class="flex flex-col space-y-6">
            <div class="container flex flex-row">
            <div class="border border-gray-300 w-full rounded">
                <?php if(isset($_SESSION['reservation_page'])){ ?>
                    <h1 class="text-red-500 bg-slate-100 uppercase text-center">Détail de réservation</h1>
           
                    <div class="flex flex-col border-t border-gray-300 p-2 md:p-4">
                <div class="flex flex-row"><span class="font-semibold w-28">Identifiant </span><span class="w-14">:</span> <span><?php echo  $_SESSION['check']['ID']      ?></span></div>
                <div class="flex flex-row"><span class="font-semibold w-28">Nom         </span><span class="w-14">:</span> <span><?php echo  $_SESSION['check']['Nom']     ?> </span></div>
                <div class="flex flex-row"><span class="font-semibold w-28">N° telephone</span><span class="w-14">:</span> <span><?php echo  $_SESSION['check']['Tel']     ?></span></div>
                <div class="flex flex-row"><span class="font-semibold w-28">Le Jour     </span><span class="w-14">:</span> <span><?php echo  $_SESSION['check']['Jour']    ?></span></div>
                <div class="flex flex-row"><span class="font-semibold w-28">L'heure     </span><span class="w-14">:</span> <span><?php echo  $_SESSION['check']['Heure']   ?></span></div>
                <?php if(!isset($_SESSION['reservation_page'])){ ?>    <div class="flex flex-row"><span class="font-semibold w-28">Date de remise     </span><span class="w-14">:</span> <span><?php echo  $_SESSION['date_remise']   ?></span></div> <?php } ?>
                <div class="flex flex-row"><span class="font-semibold w-28">N° personnes</span><span class="w-14">:</span> <span><?php echo  $_SESSION['check']['Personne']?></span></div>
                <div class="flex flex-row"><span class="font-semibold w-28">Montant     </span><span class="w-14">:</span> <span>            Gratuit     </span></div>
            </div>
          <?php }else{ ?>
              
              <h1 class="text-red-500 font-semibold bg-slate-100 uppercase text-center">Détail de Commande</h1>
              
              <div class="flex flex-col border-gray-300 px-4 md:py-1 shadow-lg">
              <div class="flex flex-row font-bold border-b border-gray-100 "><span class="w-48">Commande </span><span class="w-32">Prix/Unite</span> <span>Quantité</span></div>
    
                
                <?php     
                        $total = 0;
                        $count = 0;
                        $sessionCount = count($_SESSION['shopping_cart']);
                        foreach ($_SESSION["shopping_cart"] as $keys => $values) {
                ?>
                <div class="flex flex-row"><span class="w-52">- <?php echo $values['Repas']?> </span><span class="w-36"><?php echo $values['Prix']?> DH</span> <span><?php echo $values['Quantité']?></span></div>
                
                <?php  $total += $values["Quantité"] * $values["Prix"]; 
                       $count += 1; 
                } ?>
                
            </div>
            
            <div class="mt-2 flex items-center justify-between px-10 bg-gray-100 rounded-lg py-2">
                <span class="font-bold">Total : </span>
                <span><?php echo number_format($total, 2); ?> MAD</span>
            </div>
        
            <?php
            if($sessionCount = $count){
                
                unset($_SESSION['shopping_cart']);         

             //   echo '<script>window.location = "categorie.php";</script>';
            }  
           
           
        }
            ?> 
            
            </div>    
        </div>
    
        <div class="container flex flex-row">
            <div class="border border-gray-300 w-full rounded">
                    <h1 class="text-red-500 bg-slate-100 uppercase text-center">Détail de Marchand</h1>
           
            <div class="flex flex-col border-t border-gray-300 p-2 md:p-4">
                <div class="flex flex-row"><span class="font-semibold w-36">Nom du marchand</span><span class="w-14">:</span><span>Toulin - 23122809</span></div>
            </div>
            
            </div>
        </div>
    
        <div class="container flex flex-row">
            <div class="border border-gray-300 w-full rounded">
                    <h1 class="text-red-500 bg-slate-100 uppercase text-center">Information du client</h1>
           
        <?php 
    
    
        $Id_client = $_SESSION['user'][0];
        $sqlSelect = "SELECT `utilisateur`, `email`, `tel` FROM `utilisateurs` WHERE `Id_client` = $Id_client";
        $sqladp = mysqli_query($connect, $sqlSelect);
        
        if($sqladp){
            $result = mysqli_fetch_array($sqladp);
    
        }else{
            echo "Error : " . mysqli_error($connect);
        }
    
        
        ?>  
    
    
            <div class="flex flex-col border-t border-gray-300 p-2 md:p-4">
                <div class="flex flex-row"><span class="font-semibold w-16 md:w-28">Nom</span><span     class="w-14">:</span><span><?php echo $result['utilisateur']?></span></div>
                <div class="flex flex-row"><span class="font-semibold w-16 md:w-28">Tel</span><span     class="w-14">:</span><span>0<?php echo $result['tel']?></span></div>
                <div class="flex flex-row"><span class="font-semibold w-16 md:w-28">Email</span><span   class="w-14">:</span><span><?php echo $result['email']?></span></div>
                <div class="flex flex-row"><span class="font-semibold w-28">Date de remise</span><span  class="w-14">:</span> <span><?php echo  $date_remise   ?></span></div>
            </div>
            
        </div>
        </div>    
    
        </div>

        <div class="flex flex-row">
    <button  class="py-1 border border-gray-400 bg-gray-400 text-white font-semibold hover:bg-gray-300 hover:font-bold hover:shadow-lg rounded-md mx-auto my-2 w-36">Imprimer PDF</button>
    <button name="routeur" class="py-1 border border-gray-400 bg-gray-400 text-white font-semibold hover:bg-gray-300 hover:font-bold hover:shadow-lg rounded-md mx-auto my-2 w-36">Routeur</button>
</div>

</div>


<script src="../js/check.js"></script>

</body>
</html>