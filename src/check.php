<?php

session_start();
include("./config/config.php");
$date = date("Y-m-d", time());

//$_SERVER['HTTP_REFERER'];

// Compteur des produits

if(isset($_SESSION['user'])){

    if(!isset($_SESSION['reservation_page'])){
        if(!isset($_SESSION['shopping_cart'])){
            echo '<script>alert("Votre panier est vide!")</script>';
            echo "<script>window.location = './categorie.php'</script>";
        }
    }
    

    if(isset($_SESSION['reservation'])){
            
            $Id_client = $_SESSION['reservation']['ID'];
            $nom       = $_SESSION['reservation']['Nom'];
            $tel       = $_SESSION['reservation']['Tel'];
            $jour      = $_SESSION['reservation']['Jour'];
            $heure     = $_SESSION['reservation']['Heure'];
            $personne  = $_SESSION['reservation']['Personne'];

            $_SESSION['check']['ID']       = $_SESSION['reservation']['ID'];
            $_SESSION['check']['Nom']      = $_SESSION['reservation']['Nom'];
            $_SESSION['check']['Tel']      = $_SESSION['reservation']['Tel'];
            $_SESSION['check']['Jour']     = $_SESSION['reservation']['Jour'];
            $_SESSION['check']['Heure']    = $_SESSION['reservation']['Heure'];
            $_SESSION['check']['Personne'] = $_SESSION['reservation']['Personne'];

            if(isset($_POST['reserved'])){
            
                $sql = "INSERT INTO reservation(NomPrenom,Telephone,Jour,Heure,QtePersonne,created_at,Id_client) VALUES ('$nom','$tel','$jour','$heure','$personne','$date','$Id_client')";
                
                if(mysqli_query($connect,$sql)){
        
                    echo '<script>alert("Réservation Succès!")</script>';
                    echo "<script>window.location = './pdf.php'</script>";
                    //unset($_SESSION['reservation']);
                    
                   
                }else{
                    echo "Error : " . mysqli_error($connect);
                }
            }
    }

if(isset($_SESSION['shopping_cart'])){
    
    if(isset($_POST['payed'])){

        $_SESSION['date_remise'] = $_POST['date_remise'];
        
        include("./insert.php");
        //unset($_SESSION['shopping_cart']);
    
    }
}

}else{
    echo '<script>alert("Vous devez vous connecter pour pouvoir effectuer l\'achat ou la réservation !!")</script>';
    echo "<script>window.location = './login.php'</script>";
}
   

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../output.css" rel="stylesheet">

    <title>Document</title>
</head>
<body>

<!-- component -->
<style>@import url(https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/5.3.45/css/materialdesignicons.min.css);</style>


<?php include("./header.php")?>

<form action="<?php $_SERVER['PHP_SELF']?>" method="post">
    <div class="flex flex-col md:flex-row md:space-x-2 lg:space-x-5 mx-12 sm:mx-24 md:mx-auto md:justify-center mt-1">

        <div class="md:w-1/2 mt-8 rounded-lg bg-white shadow-sm p-5 text-gray-700 md:px-4 lg:px-20">
            <div class="pb-5">
                <div class="bg-red-400 text-white overflow-hidden rounded-full w-16 h-16 mt-8 mx-auto shadow-lg flex justify-center items-center">
                    <i class="mdi mdi-credit-card-outline text-3xl"></i>
                </div>
            </div>

            <div class="mb-10">
        
            <?php if(isset($_SESSION['reservation_page'])){ ?>
                <h1 class="text-center font-bold text-lg lg:text-xl uppercase">RESERVATION <span class="text-red-400">REQUEST</span></h1>
            <?php }else{ ?>
                <h1 class="text-center font-bold text-xl uppercase">SECURE<span class="text-red-400"> PAYMENT</span> INFORMATION</h1>
            <?php } ?>
        
            </div>


            <div class="mb-4 flex -mx-2">
                <div class="px-2">
                    <label for="type1" class="flex items-center cursor-pointer">
                        <input type="radio" class="form-radio h-5 w-5 text-indigo-500" name="type" id="type1" checked>
                        <img src="https://leadershipmemphis.org/wp-content/uploads/2020/08/780370.png" class="h-8 md:h-6 lg:h-8 ml-3">
                    </label>
                </div>
                
                <div class="px-2">
                    <label for="type2" class="flex items-center cursor-pointer">
                        <input type="radio" class="form-radio h-5 w-5 text-indigo-500" name="type" id="type2">
                        <img src="https://www.sketchappsources.com/resources/source-image/PayPalCard.png" class="h-8 md:h-6 lg:h-8 ml-3">
                    </label>
                </div>
            </div>
            <div class="mb-3">
                <label class="font-bold text-sm mb-2 ml-1">Name on card</label>
                <div>
                    <input class="w-full px-3 py-2 mb-1 border-2 border-gray-200 rounded-md focus:outline-none focus:border-indigo-500 transition-colors" placeholder="John Smith" type="text"/>
                </div>
            </div>
            <div class="mb-3">
                <label class="font-bold text-sm mb-2 ml-1">Card number</label>
                <div>
                    <input class="w-full px-3 py-2 mb-1 border-2 border-gray-200 rounded-md focus:outline-none focus:border-indigo-500 transition-colors" placeholder="0000 0000 0000 0000" type="text"/>
                </div>
            </div>
            <div class="mb-3 -mx-2 flex items-end">
                <div class="px-2 w-1/2">
                    <label class="font-bold text-sm mb-2 ml-1">Expiration date</label>
                    <div>
                        <select class="form-select w-full px-3 py-2 mb-1 border-2 border-gray-200 rounded-md focus:outline-none focus:border-indigo-500 transition-colors cursor-pointer">
                            <option value="01">01 - January</option>
                            <option value="02">02 - February</option>
                            <option value="03">03 - March</option>
                            <option value="04">04 - April</option>
                            <option value="05">05 - May</option>
                            <option value="06">06 - June</option>
                            <option value="07">07 - July</option>
                            <option value="08">08 - August</option>
                            <option value="09">09 - September</option>
                            <option value="10">10 - October</option>
                            <option value="11">11 - November</option>
                            <option value="12">12 - December</option>
                        </select>
                    </div>
                </div>
            
                <div class="px-2 w-1/2">
                    <select class="form-select w-full px-3 py-2 mb-1 border-2 border-gray-200 rounded-md focus:outline-none focus:border-indigo-500 transition-colors cursor-pointer">
                        <option value="2020">2020</option>
                        <option value="2021">2021</option>
                        <option value="2022">2022</option>
                        <option value="2023">2023</option>
                        <option value="2024">2024</option>
                        <option value="2025">2025</option>
                        <option value="2026">2026</option>
                        <option value="2027">2027</option>
                        <option value="2028">2028</option>
                        <option value="2029">2029</option>
                    </select>
                </div>
            </div>


            <div class="mb-6">
                <label class="font-bold text-sm mb-2 ml-1">Security code</label>
                <div>
                    <input class="w-32 px-3 py-2 mb-1 border-2 border-gray-200 rounded-md focus:outline-none focus:border-indigo-500 transition-colors" placeholder="000" type="text"/>
                </div>
            </div>
        <div>
        <?php
if (isset($_SESSION['reservation_page'])) {
?>
    <button name="reserved" id="reserved" class="max-w-xs mx-auto bg-red-400 hover:bg-red-500 focus:bg-red-700 text-white rounded-lg px-3 py-3 font-semibold">
        <i class="mdi mdi-lock-outline mr-1"></i>reserver maintenant
    </button>
<?php
} else {
?> 
    <button name="payed" class="max-w-xs mx-auto bg-red-400 hover:bg-red-500 focus:bg-red-700 text-white rounded-lg px-3 py-3 font-semibold">
        <i class="mdi mdi-lock-outline mr-1"></i>Payer maintenant
    </button>
<?php
}
?>

        </div>
    </div>



    <div class="lg:w-2/5 md:mt-28 rounded-lg bg-white shadow-sm p-5 text-gray-700">   
        
    
    <div class="flex flex-col space-y-6">
        <div class="container flex flex-row">
        <div class="border border-gray-300 w-full rounded">
            <?php if(isset($_SESSION['reservation_page'])){ ?>
                <h1 class="text-red-500 bg-slate-100 uppercase text-center">Reservation details</h1>
       
                <div class="flex flex-col border-t border-gray-300 p-2 md:p-4">
            <div class="flex flex-row"><span class="font-semibold w-28">User ID </span><span class="w-14">:</span> <span><?php echo  $_SESSION['check']['ID']      ?></span></div>
            <div class="flex flex-row"><span class="font-semibold w-28">Name         </span><span class="w-14">:</span> <span><?php echo  $_SESSION['check']['Nom']     ?> </span></div>
            <div class="flex flex-row"><span class="font-semibold w-28">Date     </span><span class="w-14">:</span> <span><?php echo  $_SESSION['check']['Jour']     ?></span></div>
            <div class="flex flex-row"><span class="font-semibold w-28">N° telephone</span><span class="w-14">:</span> <span><?php echo  $_SESSION['check']['Tel']    ?></span></div>
            <div class="flex flex-row"><span class="font-semibold w-28">The time     </span><span class="w-14">:</span> <span><?php echo  $_SESSION['check']['Heure']   ?></span></div>
            <div class="flex flex-row"><span class="font-semibold w-28">N° of persons</span><span class="w-14">:</span> <span><?php echo  $_SESSION['check']['Personne']?></span></div>
            <div class="flex flex-row"><span class="font-semibold w-28">Amount     </span><span class="w-14">:</span> <span>            Gratuit     </span></div>
        </div>
      <?php }else{ ?>
          
          <h1 class="text-red-500 font-semibold bg-slate-100 uppercase text-center">Order details</h1>
          
          <div class="flex flex-col border-gray-300 px-4 md:py-1 shadow-lg">
          <div class="flex flex-row font-bold border-b border-gray-100 "><span class="w-48">Order </span><span class="w-32">Price per unit</span> <span>Quantite</span></div>

            
            <?php     
                    $total = 0;
                    foreach ($_SESSION["shopping_cart"] as $keys => $values) {
            ?>
            <div class="flex flex-row"><span class="w-52"><?php echo $values['Repas']?> </span><span class="w-36"><?php echo $values['Prix']?> DH</span> <span><?php echo $values['Quantité']?></span></div>
            
            <?php $total += $values["Quantité"] * $values["Prix"]; } ?>
            
        </div>
        
        <div class="mt-2 flex items-center justify-between px-10 bg-gray-100 rounded-lg py-2">
            <span class="font-bold">Total : </span>
            <span><?php echo number_format($total, 2); ?> MAD</span>
        </div>
    
        <?php } ?> 
        
        </div>    
    </div>

    <div class="container flex flex-row">
        <div class="border border-gray-300 w-full rounded">
                <h1 class="text-red-500 bg-slate-100 uppercase text-center">Merchant details</h1>
       
        <div class="flex flex-col border-t border-gray-300 p-2 md:p-4">
            <div class="flex flex-row"><span class="font-semibold w-36">Nom du marchand</span><span class="w-14">:</span><span>Toulin - 23122809</span></div>
        </div>
        
        </div>
    </div>

    <div class="container flex flex-row">
        <div class="border border-gray-300 w-full rounded">
                <h1 class="text-red-500 bg-slate-100 uppercase text-center">Customer information</h1>
       
    <?php 


    $Id_client = $_SESSION['user'][0];
    $sqlSelect = "SELECT `utilisateur`, `email`, `tel` FROM utilisateurs WHERE `Id_client` = $Id_client";
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
        </div>
        

        
    </div>
    </div>    

   <?php if(!isset($_SESSION['reservation_page'])){ ?>
    <div>     
        <label for="date_remise" class="font-bold text-sm mb-2 ml-2">Delivery date</label>
        <input name="date_remise" id="date_remise" required type="datetime-local" class="max-w-sm block px-3 py-2 mb-1 border-2 border-gray-200 rounded-md focus:outline-none focus:border-indigo-500 transition-color" placeholder="Select date">
    </div>
    <?php } ?>
        
        

    </div>


</div>
</div>

</form>


<?php include("./footer.php")?>


</body>
</html>