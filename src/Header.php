<?php
session_start();

 $quantity = count($_SESSION['shopping_cart']);

 if(isset($_POST['logout'])){
    unset($_SESSION['user']);
    unset($_SESSION['shopping_cart']);
    unset($_SESSION['total']);
    echo '<script>window.location = "../index.php"</script>';
 }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/remixicon@3.6.0/fonts/remixicon.min.css">
    <link rel="stylesheet" href="../css/header.css">
    <link href="../output.css" rel="stylesheet">
    <title>Document</title>
</head>
<body>
<header class="mb-20 container-fluid w-full OverDisplay top-0 fixed mx-auto text-slate-900 bg-slate-50 py-3 px-6 shadow-xl">
    
    <div class="flex justify-between">
    <a href="../index.php" class="logo text-2xl md:text-2xl lg:text-3xl space-x-2 mt-1 "><i class="fas fa-utensils text-red-400"></i><i class="text-gray-700 font-bold">Tolina</i></a>

        <nav class="hidden md:flex flex-row md:space-x-3 lg:space-x-6 py-2">
            <a class="lg:text-xl hover:font-bold hover:text-red-500 " href="../index.php">Home</a>
            <a class="lg:text-xl hover:font-bold hover:text-red-500 " href="./categorie.php">Category</a>
            <a class="lg:text-xl hover:font-bold hover:text-red-500 " href="../index.php#propos">About us</a>
            <a class="lg:text-xl hover:font-bold hover:text-red-500 " href="./Contact.php">Contact us</a>
            <a class="lg:text-xl hover:font-bold hover:text-red-500 " href="./reservation.php">Reserve</a>
            <button id="btnDisplayCart" class="xl:text-2xl text-red-400  drop-shadow-xl rounded-md border-slate-700 px-1 lg:text-xl hover:font-bold hover:text-slate-700 hover:text-3xl">
            <i class="fa-solid fa-cart-shopping"></i>
            <small class="relative right-1 bottom-4 text-xs font-semibold "><?php echo $quantity?></small>
            </button>
        </nav>
        
        <button class="md:hidden absolute right-10 font-bold text-xl border border-dark-300 px-2 py-1 rounded-md" id="btn">
            <i class="fa-solid fa-bars"></i>
        </button>
           
        
    </div>
    
    
    <div class="md:hidden">
        <div id="menu" class="hidden">
        <ul class="absolute mt-2 bg-slate-100 flex flex-col  left-0 right-0 text-xl font-bold text-center space-y-3 p-3 drop-shadow-lg">
        <a href="../index.php">Home</a>
        <a href="./categorie.php">Category</a>
        <a href="../index.php#Galerie">Galerie</a>
        <a href="../index.php#propos">About us</a>
        <a href="./Contact.php">Contact us</a>
        <a href="./reservation.php">Reserve</a>
        <button class="text-2xl xl:text-2xl text-red-500  drop-shadow-xl rounded-md border-slate-700 px-1 lg:text-xl hover:font-bold hover:text-slate-700 hover:text-3xl"><i class="fa-solid fa-cart-shopping"></i><small class="relative right-0 bottom-5 text-xs font-semibold"><?php echo $quantity?></small></button>
        </ul>
        </div>
    </div>



            
            <!-- Small Cart Box -->
    <section id="shoppingCart" class="hidden OverDisplay absolute top-15 right-0 m-4 bg-white rounded p-4 shadow-md ">
      
             
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 max-h-72">
        <thead class="text-slate-600 text-sm uppercase bg-red-200 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3 rounded-s-lg">
                    Commandes
                </th>
                <th scope="col" class="px-6 py-3">
                    P.U
                </th>
                <th scope="col" class="px-6 py-3 rounded-e-lg">
                    Quantité
                </th>
            </tr>
        </thead>
        <?php
                if (!empty($_SESSION["shopping_cart"])) {
                    $total = 0;
                    foreach ($_SESSION["shopping_cart"] as $keys => $values) {
            ?>
        <tbody>
            <tr class="bg-white dark:bg-gray-800">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    <?php echo $values['Repas'] ?>
                </th>
                <td class="px-6 py-4 text-center">
                    <?php echo $values['Prix']?> MAD
                </td>
                <td class="px-6 py-4 text-center">
                <?php echo $values['Quantité']?>
                </td>
            </tr>

            <?php
                    $total += $values["Quantité"] * $values["Prix"];
                    
                    }
                } else {
                    echo "<tr class='text-center w-full text-xl font-bold'><td class='text-center' colspan='3'>No items in the cart</td></tr>";
                }
        ?>
            
        </tbody>
        
        </table>
      
        <div class="mt-2 flex items-center justify-between px-10 bg-gray-100 rounded-lg py-2">
            <span class="font-bold">Total : </span>
            <span><?php echo number_format($total, 2); ?> MAD</span>
        </div>
        
        <a href="./snacks.php#cartDetails"><button class="mt-4 bg-red-400 text-white py-2 px-4 rounded hover:bg-red-600 focus:outline-none focus:shadow-outline-blue active:bg-red-800">Voir</button></a>
    
    </section>

<?php
    
    if(isset($_SESSION['user'])){
        $etat = "<button type='submit' name='logout' class='text-red-400 text-md md:text-lg'>" . $_SESSION['user'][1] . " <i class='fa fa-sign-out text-slate-600' aria-hidden='true'></i></button>";
     }else{
        $etat  ='<a href="./login.php"   class="text-red-400 text-sm md:text-lg px-3 py-2 -m-2 block"><span class="leading-8 font-bold">Log-in</span>  <i class="fa fa-sign-in text-slate-600" aria-hidden="true"></i></a>';
    }
    
    ?>

</form>
<form action="header.php" method="post">
<div class="absolute left-8 top-16 lg:top-20 md:mt-2 lg:mt-0 bg-slate-50 shadow-gray-950 px-2 rounded border-b-2 border-slate-400">
    <?php echo $etat?>
</div>

<?php if(!isset($_SESSION['user'])){?>
    <div class="absolute left-32 md:left-36 top-16 lg:top-20 md:mt-2 lg:mt-0 bg-slate-50 shadow-gray-950 px-2 rounded border-b-2 border-slate-400">
    <a href="./register.php"  class="text-red-400 text-sm md:text-lg px-3 py-2 -m-2 block"><span class="leading-8 font-bold">Sign-in</span> <i class="fa fa-users   text-slate-600" aria-hidden="true"></i></a>
    </div>
<?php }?>

</form>
</header>

<script src="../js/toggle.js"></script>
<script src="../js/shoppingCart.js"></script>

</body>
</html>