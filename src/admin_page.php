<?php 
// $_SERVER['HTTP_REFERER'] == 'http://localhost/restaurant/Login.php'
session_start();
if(isset($_SESSION['user']) && isset($_SESSION['user']) && $_SESSION['user'][2] == 'utilisateur' || $_SESSION['user'][2] == 'admin' && isset($_SERVER['HTTP_REFERER'])){
    include("./config/config.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>admin page</title>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
   <link href="../output.css" rel="stylesheet">
   <link rel="stylesheet" href="../css/radion.css">
   
</head>
<body>


<button id="btn" type="button" class="inline-flex items-center p-2 mt-2 ms-3 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
    <span class="sr-only">Open sidebar</span>
    <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
    <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
    </svg>
</button>
 
<nav id="menu" class="hidden">
<div class="absolute w-full top-0 h-14 shadow-lg px-3 bg-gray-800">

<ul class="font-medium flex flex-row h-full justify-evenly items-center">

            <li>
            <a href="./admin_page.php?action=profile">
                    <span class=" bg-green-500 px-4 py-3 border border-green-500 hover:text-white rounded-full">
                    <i class="fa-solid fa-user"></i>
                    <?php echo $_SESSION['user'][1]?>
                    </span>
                </a>
            </li>
            <li>
                <a href="./admin_page.php?action=shop">
                    <span class="text-gray-300 hover:text-green-500">
                    <i class="fa-solid fa-shop"></i>
                    </span>
                </a>
            </li>
            <li>
                <a href="./admin_page.php?action=analyse">
                    <span class="text-gray-300 hover:text-green-500">
                        <i class="fas fa-chart-pie"></i>
                    </span>
                </a>
            </li>
            <li>
                <a href="./admin_page.php?action=utilisateurs">
                    <span class="text-gray-300 hover:text-green-500">
                    <i class="fa-solid fa-users-gear"></i>
                    </span>
                </a>
            </li>
            <li>
                <a href="./admin_page.php?action=produits">
                    <span class="text-gray-300 hover:text-green-500">
                        <i class="fas fa-tasks-alt"></i>
                    </span>
                </a>
            </li>
            <li>
                <a href="./admin_page.php?action=register">
                    <span class="text-gray-300 hover:text-green-500">
                        <i class='fa fa-sign-out' aria-hidden='true'></i>
                    </span>
                </a>
            </li>
            <li>
                <a href="./admin_page.php?action=notification">
                    <span class="text-gray-300 hover:text-green-500">
                        <i class="fa-solid fa-bell"></i>
                    </span>
                </a>
            </li>
            <li>
                <a href="./admin_page.php?action=exit">
                  <span class=" text-gray-300 hover:text-red-500">
                    <i class="fa-solid fa-power-off"></i>
                  </span>
                </a>
            </li>
</ul>

</div>
</nav>

<aside class="hidden sm:block fixed top-0 left-0 z-40 sm:w-12 md:w-20 h-screen transition-transform -translate-x-full sm:translate-x-0" aria-label="Sidebar">
    <div class="h-full px-3 py-4 overflow-y-auto bg-gray-800">
       <center>
        <ul class="mt-6 space-y-6 md:space-y-8 font-medium">
        
            <li>
                <a href="./admin_page.php?action=profile">
                    <span class="bg-green-500 sm:px-1 sm:py-0.5 md:px-3 md:py-2 lg:text-xl border border-green-500 hover:text-white rounded-full">
                    <i class="fa-solid fa-user"></i>
                    </span>
                </a>
            </li>
            <li>
                <a href="./admin_page.php?action=shop">
                    <span class="text-gray-300 hover:text-green-500">
                        <i class="fa-solid fa-shop"></i>
                        </span>
                    </a>
                </li>
            <li>
                <a href="./admin_page.php?action=analyse">
                    <span class="text-gray-300 hover:text-green-500">
                        <i class="fas fa-chart-pie"></i>
                    </span>
                </a>
            </li>
            <li>
                <a href="./admin_page.php?action=utilisateurs">
                    <span class="text-gray-300 hover:text-green-500">
                    <i class="fa-solid fa-users-gear"></i>
                    </span>
                </a>
            </li>
            <li>
                <a href="./admin_page.php?action=produits">
                    <span class="text-gray-300 hover:text-green-500">
                        <i class="fas fa-tasks-alt"></i>
                    </span>
                </a>
            </li>
            <li>
                <a href="./admin_page.php?action=register">
                    <span class="text-gray-300 hover:text-green-500">
                        <i class='fa fa-sign-out' aria-hidden='true'></i>
                    </span>
                </a>
            </li>
            <li>
                <a href="./admin_page.php?action=notification">
                    <span class="text-gray-300 hover:text-green-500">
                        <i class="fa-solid fa-bell"></i>
                    </span>
                </a>
            </li>
            <li>
                <a href="./admin_page.php?action=exit">
                  <span class=" text-gray-300 hover:text-red-500">
                    <i class="fa-solid fa-power-off"></i>
                  </span>
                </a>
            </li>
           </ul>
       </center>
    </div>
</aside>



<?php 


if(isset($_GET['action']) && $_GET['action'] == "produits"){
    include("./admin_produits.php");
}elseif (isset($_GET['action']) && $_GET['action'] == "update"){
    include("./admin_update.php");
}elseif (isset($_GET['action']) && $_GET['action'] == "utilisateurs"){
    include("./admin_utilisateurs.php");
}elseif (isset($_GET['action']) && $_GET['action'] == "exit") {

    unset($_SESSION['user']);
    unset($_SESSION['shopping_cart']);
    unset($_SESSION['total']);
    unset($_SESSION['product_table']);
    echo '<script>window.location = "../index.php"</script>';

}elseif (isset($_GET['action']) && $_GET['action'] == "analyse"){
    include("./admin_analyse.php");
}elseif (isset($_GET['action']) && $_GET['action'] == 'register'){
    include("admin_register.php");
}elseif (isset($_GET['action']) && $_GET['action'] == "admin_update_utilisateurs"){
    include("./admin_utilisateurs_update.php");
}elseif (isset($_GET['action']) && $_GET['action'] == "shop" || $_GET['action'] == "reservation" ){
    include("./admin_shop.php");
}elseif (isset($_GET['action']) && $_GET['action'] == "profile"){
    include("./admin_profile.php");
}

?>

<script src="../js/toggle.js"></script>

</body>
</html>

<?php

}else{
   echo $_SERVER['HTTP_REFERER'];
    http_response_code(404);
    // include('my_page.php'); // provide your own HTML for the error page
    die();

}


?>

