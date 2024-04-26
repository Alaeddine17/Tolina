<?php 
include("./src/config/config.php");

session_start();
unset($_SESSION['reservation_page']);

$quantity = count($_SESSION['shopping_cart']);

 if(isset($_POST['logout'])){
    unset($_SESSION['user']);
    unset($_SESSION['shopping_cart']);
    unset($_SESSION['total']);
    echo '<script>window.location = "./index.php"</script>';
 }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./css/index.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/remixicon@3.6.0/fonts/remixicon.min.css">    
    <link href="./output.css" rel="stylesheet">
    <link rel="stylesheet" href="./css/header.css">
    <title>Tolin</title>
    
</head>
<body>









<header class="mb-20 container-fluid w-full OverDisplay top-0 fixed mx-auto text-slate-900 bg-slate-50 py-3 px-6 shadow-xl">
    
    <div class="flex justify-between">
    <a href="#" class="logo text-2xl md:text-2xl lg:text-3xl space-x-2 mt-1 "><i class="fas fa-utensils text-red-400"></i><i class="text-gray-700 font-bold">Tolina</i></a>

        <nav class="hidden md:flex flex-row md:space-x-3 lg:space-x-6 py-2">
            <a class="lg:text-xl hover:font-bold hover:text-red-500 " href="#">Home</a>
            <a class="lg:text-xl hover:font-bold hover:text-red-500 " href="./src/categorie.php">Category</a>
            <a class="lg:text-xl hover:font-bold hover:text-red-500 " href="#propos">About us</a>
            <a class="lg:text-xl hover:font-bold hover:text-red-500 " href="./src/Contact.php">Contact us</a>
            <a class="lg:text-xl hover:font-bold hover:text-red-500 " href="./src/reservation.php">Reserve</a>
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
        <a href="#">Home</a>
        <a href="./src/categorie.php">Category</a>
        <a href="#Galerie">Galerie</a>
        <a href="#propos">About us</a>
        <a href="./src/Contact.php">Contact us</a>
        <a href="./src/reservation.php">Reserve</a>
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
        
        <a href="./src/snacks.php#cartDetails"><button class="mt-4 bg-red-400 text-white py-2 px-4 rounded hover:bg-red-600 focus:outline-none focus:shadow-outline-blue active:bg-red-800">Check</button></a>
    
    </section>

<?php
    
    if(isset($_SESSION['user'])){
        $etat = "<button type='submit' name='logout' class='text-red-400 text-md md:text-lg'>" . $_SESSION['user'][1] . " <i class='fa fa-sign-out text-slate-600' aria-hidden='true'></i></button>";
     }else{
        $etat  ='<a href="./src/login.php"   class="text-red-400 text-sm md:text-lg px-3 py-2 -m-2 block"><span class="leading-8 font-bold">Log-in</span>  <i class="fa fa-sign-in text-slate-600" aria-hidden="true"></i></a>';
    }
    
    ?>

</form>
<form action="index.php" method="post">
<div class="absolute left-8 top-16 lg:top-20 md:mt-2 lg:mt-0 bg-slate-50 shadow-gray-950 px-2 rounded border-b-2 border-slate-400">
    <?php echo $etat?>
</div>

<?php if(!isset($_SESSION['user'])){?>
    <div class="absolute left-32 md:left-36 top-16 lg:top-20 md:mt-2 lg:mt-0 bg-slate-50 shadow-gray-950 px-2 rounded border-b-2 border-slate-400">
    <a href="./src/register.php"  class="text-red-400 text-sm md:text-lg px-3 py-2 -m-2 block"><span class="leading-8 font-bold">Sign-in</span> <i class="fa fa-users   text-slate-600" aria-hidden="true"></i></a>
    </div>
<?php }?>

</form>
</header>














<section class="container my-20 md:my-32 lg:my-40 mx-auto flex flex-col-reverse lg:flex-row lg:space-x-14" id="hero">

    <div class="flex flex-col space-y-8 lg:w-1/2 mx-6 lg:mx-10 xl:mx-0">

    <h3 class="text-2xl lg:text-4xl font-semibold italic text-slate-800">Food made <span class="text-red-500">With love</span></h3>
            
            <p class="md:text-lg  lg:text-xl md:leading-6 lg:leading-8 text-center md:text-left">The restaurant, offering a chic and cozy atmosphere, combines creative French cuisine with traditional Moroccan dishes. Every evening, a live band accompanied by a saxophonist entertains your nights for a jazzy ambiance. Enjoy the terrace for a cocktail, share a shisha, or have dinner with a magnificent view of the Atlas Mountains, as well as the gardens and the pool.
            </p>

        <div class="flex flex-col md:flex-row text-center justify-center items-center space-y-4 lg:space-y-0 md:mx-0 space-x-3">

            <a href="./src/reservation.php" class="bg-transparent hover:bg-red-500 text-red-500 font-semibold hover:text-white lg:py-2 lg:px-4 border border-red-200 border-b-2  hover:border-b-red-900 border-b-red-300 hover:border-transparent rounded btn xl:w-1/3 hover:drop-shadow-2xl self-center w-56 ml-3 lg:ml-0 md:mt-4 lg:mt-0">Reserve now
            </a> 
            <a href="./src/categorie.php" class="bg-transparent hover:bg-red-500 text-red-500 font-semibold hover:text-white lg:py-2 md:px-4 border border-red-200 border-b-2 hover:border-b-red-900 border-b-red-300 hover:border-transparent rounded btn xl:w-1/3 hover:drop-shadow-2xl self-center w-56">Order now
            </a>

        </div>

    </div>
    <div class="flex justify-center md:h-96">
        <img src="./assets/images/home-img.png" alt="Restaurant" class="w-3/4">
    </div>
</section>

<section class="container-fluid">
    <div id="Galerie"></div>
            <div class="flex flex-col p-6 text-center justify-center items-center text-slate-900 space-y-8 md:space-y-10">
                        <h2 class="font-bold text-xl md:text-2xl lg:text-4xl italic text-slate-800 text-center lg:text-left">"What the guests liked the most".</h2>
                        <p class="md:text-xl lg:mx-10">I’ve written a few thousand words on why traditional “semantic class names” are the reason CSS is hard to maintain, but the truth is you’re never going to believe me until you actually try it. If you can suppress the urge to retch long enough to give it a chance, I really think you’ll wonder how you ever worked with CSS any other way.
                        </p>


                    <div class="flex flex-col md:flex-row items-center md:flex-wrap gap-x-3 gap-y-3 md:justify-center">
    
                    
                    <?php
                    
                    $sqlSelectString = "SELECT * FROM messages";
                    $sqlSelect = mysqli_query($connect, $sqlSelectString);

                    while($resault = mysqli_fetch_array($sqlSelect)){
        
                    ?>
                        
                    <div class="flex flex-col flex-shrink-0 md:max-h-72 items-center w-2/3 md:w-1/2 lg:w-1/3 space-y-4 text-center border border-slate-200 rounded-2xl p-6 bg-slate-50 lg:max-w-sm hover:bg-white">
                            <img src="./assets/images/<?php echo $resault['path']?>" alt="<?php echo $resault['NomPrenom'] ?>" class="rounded-full ImgMrg" width="60">
                            <h3 class="text-slate-700 text-xl font-bold md:text-2xl"><?php echo $resault['NomPrenom'] ?></h3>
                            <p class="text-slate-800 text-sm py-8 px-2"><?php echo $resault['Messages'] ?>
                            </p>
                    </div>
                  <?php } ?>
                    
                </div>
                        
            </div>
    </section>




    <section class=" mt-10 mb-20 py-14 space-y-6 items-center md:py-20 bg-red-500 flex flex-col md:flex-row md:space-x-20 md:my-20 md:justify-evenly lg:justify-normal">
        <h2 class="text-white font-bold text-2xl text-center md:text-3xl md:w-1/2 lg:w-2/3 md:mt-5">"<i class="fa fa-star" aria-hidden="true"></i>Visitor Reviews"</h2>
        <button class="rounded-xl bg-white px-2 py-1  md:py-3 md:px-4 font-bold italic text-red-500 hover:bg-red-600 border-t-4 border-red-400 hover:text-white hover:drop-shadow-2xl border hover:border-t-0 hover:border-b-4 hover:border-white">Leave something</button>
    </section>


    <div id="propos" class="container-fluid flex flex-col-reverse md:flex-row my-20 justify-around items-center md:space-x-20 md:justify-center mx-auto">
                <div class="w-5/6 flex flex-col mt-10 md:mt-0 space-y-4 md:w-full lg:ms-16 lg:mx-8">
                <h1 class="font-bold text-xl md:text-2xl lg:text-4xl italic text-red-500 drop-shadow-[0_6.2px_1.2px_rgba(0,0,0,10)] text-center lg:text-left lg:mb-6">About us</h1>
                <p class="text-center text-white drop-shadow-[0_1.2px_1.2px_rgba(3,3,3,3.8)] bg-transparent mx-4 md:text-lg lg:text-xl md:leading-6 lg:leading-8 md:text-left">Trust the rigorous selection made by our team. In the heart of the modern district of the city or within a traditional Moroccan setting, the range of establishments is diverse, catering to everyone's preferences. Whether it's a business lunch or a romantic dinner, visit our website to find the Rabat restaurant that meets your expectations. Online or by phone, you have the choice to make a reservation for your Rabat restaurant, as we provide all the necessary information.
                </p>
                </div>
        
        <div class="image-section w-2/3 flex flex-col space-y-2 md:w-5/6 md:p-5">
            <img src="./assets/imgs/about.jpg" class="self-start bg-slate-200 p-10 rounded-t-full md:p-5">
            <div class="social flex flex-row space-x-2 text-xl md:text-2xl lg:text-3xl">
                <a href="https://www.facebook.com/alaeddine.harrak/"><i class="fab fa-facebook-f hover:text-red-400 lg:hover:text-4xl md:hover:text-4xl hover:text-2xl"></i></a>
                <a href=""><i class="fab fa-twitter hover:text-red-400 lg:hover:text-4xl md:hover:text-4xl hover:text-2xl"></i></a>
                <a href="https://www.linkedin.com/in/alae-eddine-elharrak-5a8b01175"><i class="fab fa-linkedin-in hover:text-red-400 lg:hover:text-4xl md:hover:text-4xl hover:text-2xl"></i></a>
            </div>
        </div>
    </div>





<!-- Container for demo purpose -->
<div class="container mt-10 mx-auto md:px-6">
  <!-- Section: Design Block -->
  <section class="mb-32">
    <div
      class="block rounded-lg bg-white shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)] dark:bg-neutral-700">
      <div class="flex flex-wrap items-center">
        <div class="block w-full shrink-0 grow-0 basis-auto lg:flex lg:w-6/12 xl:w-4/12">
          <div class="h-[500px] w-full">
            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d680.3787557892408!2d-6.155342631631888!3d35.18845224711214!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e1!3m2!1sfr!2sma!4v1703079150407!5m2!1sfr!2sma"
              class="left-0 top-0 h-full w-full rounded-t-lg lg:rounded-tr-none lg:rounded-bl-lg" frameborder="0"
              allowfullscreen></iframe>
          </div>
        </div>
        <div class="w-full shrink-0 grow-0 basis-auto lg:w-6/12 xl:w-8/12">
          <div class="flex flex-wrap px-3 pt-12 pb-12 md:pb-0 lg:pt-0">
            <div class="mb-12 w-full shrink-0 grow-0 basis-auto px-3 md:w-6/12 md:px-6 lg:w-full xl:w-6/12 xl:px-12">
              <div class="flex items-start">
                <div class="shrink-0">
                  <div class="inline-block rounded-md bg-primary-100 p-4 text-primary">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                      stroke="currentColor" class="h-6 w-6">
                      <path stroke-linecap="round" stroke-linejoin="round"
                        d="M14.25 9.75v-4.5m0 4.5h4.5m-4.5 0l6-6m-3 18c-8.284 0-15-6.716-15-15V4.5A2.25 2.25 0 014.5 2.25h1.372c.516 0 .966.351 1.091.852l1.106 4.423c.11.44-.054.902-.417 1.173l-1.293.97a1.062 1.062 0 00-.38 1.21 12.035 12.035 0 007.143 7.143c.441.162.928-.004 1.21-.38l.97-1.293a1.125 1.125 0 011.173-.417l4.423 1.106c.5.125.852.575.852 1.091V19.5a2.25 2.25 0 01-2.25 2.25h-2.25z" />
                    </svg>
                  </div>
                </div>
                <div class="ml-6 grow">
                  <p class="mb-2 font-bold dark:text-white">
                    Technical support
                  </p>
                  <p class="text-neutral-500 dark:text-neutral-200">
                    support@example.com
                  </p>
                  <p class="text-neutral-500 dark:text-neutral-200">
                    +1 234-567-89
                  </p>
                </div>
              </div>
            </div>
            <div class="mb-12 w-full shrink-0 grow-0 basis-auto px-3 md:w-6/12 md:px-6 lg:w-full xl:w-6/12 xl:px-12">
              <div class="flex items-start">
                <div class="shrink-0">
                  <div class="inline-block rounded-md bg-primary-100 p-4 text-primary">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                      stroke="currentColor" class="h-6 w-6">
                      <path stroke-linecap="round" stroke-linejoin="round"
                        d="M2.25 18.75a60.07 60.07 0 0115.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 013 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 00-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 01-1.125-1.125V15m1.5 1.5v-.75A.75.75 0 003 15h-.75M15 10.5a3 3 0 11-6 0 3 3 0 016 0zm3 0h.008v.008H18V10.5zm-12 0h.008v.008H6V10.5z" />
                    </svg>
                  </div>
                </div>
                <div class="ml-6 grow">
                  <p class="mb-2 font-bold dark:text-white">
                    Sales questions
                  </p>
                  <p class="text-neutral-500 dark:text-neutral-200">
                    sales@example.com
                  </p>
                  <p class="text-neutral-500 dark:text-neutral-200">
                    +1 234-567-89
                  </p>
                </div>
              </div>
            </div>
            <div
              class="mb-12 w-full shrink-0 grow-0 basis-auto px-3 md:w-6/12 md:px-6 lg:w-full xl:mb-0 xl:w-6/12 xl:px-12">
              <div class="align-start flex">
                <div class="shrink-0">
                  <div class="inline-block rounded-md bg-primary-100 p-4 text-primary">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                      stroke="currentColor" class="h-6 w-6">
                      <path stroke-linecap="round" stroke-linejoin="round"
                        d="M12 7.5h1.5m-1.5 3h1.5m-7.5 3h7.5m-7.5 3h7.5m3-9h3.375c.621 0 1.125.504 1.125 1.125V18a2.25 2.25 0 01-2.25 2.25M16.5 7.5V18a2.25 2.25 0 002.25 2.25M16.5 7.5V4.875c0-.621-.504-1.125-1.125-1.125H4.125C3.504 3.75 3 4.254 3 4.875V18a2.25 2.25 0 002.25 2.25h13.5M6 7.5h3v3H6v-3z" />
                    </svg>
                  </div>
                </div>
                <div class="ml-6 grow">
                  <p class="mb-2 font-bold dark:text-white">Press</p>
                  <p class="text-neutral-500 dark:text-neutral-200">
                    press@example.com
                  </p>
                  <p class="text-neutral-500 dark:text-neutral-200">
                    +1 234-567-89
                  </p>
                </div>
              </div>
            </div>
            <div class="w-full shrink-0 grow-0 basis-auto px-3 md:w-6/12 md:px-6 lg:w-full xl:w-6/12 xl:px-12">
              <div class="align-start flex">
                <div class="shrink-0">
                  <div class="inline-block rounded-md bg-primary-100 p-4 text-primary">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                      stroke="currentColor" class="h-6 w-6">
                      <path stroke-linecap="round" stroke-linejoin="round"
                        d="M12 12.75c1.148 0 2.278.08 3.383.237 1.037.146 1.866.966 1.866 2.013 0 3.728-2.35 6.75-5.25 6.75S6.75 18.728 6.75 15c0-1.046.83-1.867 1.866-2.013A24.204 24.204 0 0112 12.75zm0 0c2.883 0 5.647.508 8.207 1.44a23.91 23.91 0 01-1.152 6.06M12 12.75c-2.883 0-5.647.508-8.208 1.44.125 2.104.52 4.136 1.153 6.06M12 12.75a2.25 2.25 0 002.248-2.354M12 12.75a2.25 2.25 0 01-2.248-2.354M12 8.25c.995 0 1.971-.08 2.922-.236.403-.066.74-.358.795-.762a3.778 3.778 0 00-.399-2.25M12 8.25c-.995 0-1.97-.08-2.922-.236-.402-.066-.74-.358-.795-.762a3.734 3.734 0 01.4-2.253M12 8.25a2.25 2.25 0 00-2.248 2.146M12 8.25a2.25 2.25 0 012.248 2.146M8.683 5a6.032 6.032 0 01-1.155-1.002c.07-.63.27-1.222.574-1.747m.581 2.749A3.75 3.75 0 0115.318 5m0 0c.427-.283.815-.62 1.155-.999a4.471 4.471 0 00-.575-1.752M4.921 6a24.048 24.048 0 00-.392 3.314c1.668.546 3.416.914 5.223 1.082M19.08 6c.205 1.08.337 2.187.392 3.314a23.882 23.882 0 01-5.223 1.082" />
                    </svg>
                  </div>
                </div>
                <div class="ml-6 grow">
                  <p class="mb-2 font-bold dark:text-white">Bug report</p>
                  <p class="text-neutral-500 dark:text-neutral-200">
                    bugs@example.com
                  </p>
                  <p class="text-neutral-500 dark:text-neutral-200">
                    +1 234-567-89
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Section: Design Block -->
</div>
<!-- Container for demo purpose -->





<footer class="container-fluid py-10 px-24 bg-slate-900 text-white">

<div class="flex flex-col space-y-10 items-center justify-between md:flex-row md:space-x-10 md:space-y-0">
    <div class="flex flex-col space-y-2 md:space-y-5 items-center md:w-1/3">
        <h3 class="md:text-xl text-center">Copyright © 2023, All Rights Reserved</h3>
        <a href="#" class="logo text-2xl md:text-2xl lg:text-3xl space-x-2 mt-1 "><i class="fas fa-utensils text-red-400"></i><i class="text-white font-bold">Restaurant</i></a>
        <div class="flex flex-row space-x-4 text-3xl">
            <i class="ri-facebook-fill"></i>       
            <i class="ri-instagram-fill"></i>       
            <i class="ri-youtube-fill"></i>       
            <i class="ri-linkedin-fill"></i>       
            <i class="fa-brands fa-x-twitter"></i>       
        </div>
    </div>
    
    <div class="flex flex-row justify-around space-x-7 text-xl md:w-1/3">
        
        <div class="flex flex-col space-y-2">
            <a href="#">Home</a>
            <a href="./src/categorie.php">Category</a>
        </div>
        
        <div class="flex flex-col space-y-2">
            <a href="#propos">About us</a>
            <a href="./src/Contact.php">Contact us</a>
            <a href="./src/reservation.php">Reserve</a>
        </div>
    
    </div>
    
    <div class="flex flex-col space-y-5">
        <div class="xs:ms-8 md:md-0"><form action="" class="flex flex-row space-x-2 md:flex-row md:justify-center">
            <input type="text" class="py-2 px-1 lg:py-3 lg:px-7 rounded-full text-slate-950" placeholder="Leave something!">
            <button class="bg-red-500 text-white rounded-full py-2 px-4 lg:py-3 lg:px-5 hover:bg-orange-100 hover:text-red-500">Go</button>
        </form></div>
        <h3 class="md:text-xl text-center">Copyright ©, Deveped By Alae Eddine ElHarrak</h3>
    </div>
</div>

</footer>


<script src="./js/toggle.js"></script>
<script src="./js/shoppingCart.js"></script>
</body>
</html>