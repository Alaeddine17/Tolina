<?php


include './config/config.php';

session_start();

$_SESSION['reservation_page'] = true;


    if(isset($_POST['reserver'])){
      

        $Id_client = $_SESSION['user'][0];
        $jour  = mysqli_real_escape_string($connect, $_POST['Jour']);
        $heure = mysqli_real_escape_string($connect, $_POST['Heure']);
        $nom = mysqli_real_escape_string($connect, $_POST['Fullname']);
        $tel = mysqli_real_escape_string($connect, $_POST['Telephone']);
        $personne = mysqli_real_escape_string($connect, $_POST['Quantite']);
        
        if(empty($jour)){
            echo '<div class="absolute top-86 left-1/3 bg-red-500 text-white border-2 border-white p-3 text-sm w-56 md:w-76 lg:w-96 rounded-md">veuillez choisir le jour!</div>';
        }elseif(empty($heure)){
            echo '<div class="absolute top-86 left-1/3 bg-red-500 text-white border-2 border-white p-3 text-sm w-56 md:w-76 lg:w-96 rounded-md">veuillez choisir l`\heure!</div>';
        }elseif(empty($nom)){
            echo '<div class="absolute top-86 left-1/3 bg-red-500 text-white border-2 border-white p-3 text-sm w-56 md:w-76 lg:w-96 rounded-md">remplire votre nom et prénom!</div>';
        }elseif(empty($tel)){
            echo '<div class="absolute top-86 left-1/3 bg-red-500 text-white border-2 border-white p-3 text-sm w-56 md:w-76 lg:w-96 rounded-md">Entrer votre numéro de telephone!</div>';
        }elseif(empty($personne)){
            echo '<div class="absolute top-86 left-1/3 bg-red-500 text-white border-2 border-white p-3 text-sm w-56 md:w-76 lg:w-96 rounded-md">veuillez choisir nombre de personne!</div>';
        }else{
            

                $array_item = array(
                    'ID'        =>  $Id_client,
                    'Nom'       =>  $nom,
                    'Jour'      =>  $jour,
                    'Heure'     =>  $heure,
                    'Tel'       =>  $tel,
                    'Personne'  =>  $personne
                );
    
                $_SESSION['reservation'] = $array_item;
           
             echo '<script>window.location = "check.php"</script>';
        }
    }





?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Reservation Form</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
        <link rel="stylesheet" href="../css/reservation.css" type="text/css">
        <link href="../output.css" rel="stylesheet">
    </head>
    <body>


<?php 
include("./header.php");
?>

<form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
    
<section class="container mx-auto py-2 reservation my-20 md:my-32">
    <h1 class="text-2xl lg:text-3xl font-semibold text-center mb-8 text-white shadow-lg max-w-xl mx-auto">BOOK YOUR TABLE NOW</h1>
<div class="flex flex-col md:flex-row justify-center items-center">
            <img src="../assets/images/Rbooking.jpg" alt="book" class="w-96 md:w-2/5 border rounded border-gray-300 md:h-80 lg:h-96">
            
            <div class="flex flex-col items-center h-72 md:h-80 lg:h-96 md:w-3/6 bg-white rounded w-96 lg:p-8">
        
                <h1 class="text-xl lg:text-2xl font-semibold mt-10 text-red-500 mb-3 lg:mb-6">Reservation</h1>
                
                <div class="space-y-5 md:space-y-5 py-6 text-xs md:text-sm lg:text-md">
                    
                    <div class="space-x-1 md:space-x-2 lg:space-x-4">
                        <input class="rounded border border-red-300 text-center border-x-red-400 w-40 py-1 px-1 border-x-4 md:w-40 lg:w-52" type="date" name="Jour">
                        <select class="rounded border border-red-300 text-center border-x-red-400 w-40 py-1 px-1 border-x-4 md:w-40 lg:w-52" name="Heure" id="">
                        <option selected >Choose the time</option>
                                <option value = "10:00">10: 00</option>
                                <option value = "12:00">12: 00</option>
                                <option value = "14:00">14: 00</option>
                                <option value = "16:00">16: 00</option>
                                <option value = "18:00">18: 00</option>
                                <option value = "20:00">20: 00</option>
                                <option value = "22:00">22: 00</option>    
                        </select>
                    </div>
    
                    <div class="space-x-1 md:space-x-2 lg:space-x-4">
                        <input class="border border-red-300 rounded text-center border-x-red-400 py-1 px-1 w-40 border-x-4 md:w-40 lg:w-52" type="text" name="Fullname" placeholder="Full Name">
                        <input class="border border-red-300 rounded text-center border-x-red-400 py-1 px-1 w-40 border-x-4 md:w-40 lg:w-52" type="text" name="Telephone" placeholder="Telephone number">
                    </div>
                    <div class="space-x-3 md:space-x-3 lg:space-x-8">
                        <input class="rounded border border-red-300 text-center border-x-red-400 w-40 py-1 px-1 border-x-4 md:w-40 lg:w-52" type="number" name="Quantite" placeholder="How many people">
                        <input class="w-36 lg:w-44 text-white bg-red-400 rounded-lg py-2" type="submit" value="Reserve !" name="reserver">
                    </div>

                    
                </div>
                
            </div>
        </div>
        
    </section>    

</form>
    
    <?php 
include("./footer.php");
?>
            
        <script src="../js/reservation.js"></script>
    </body>
</html>

