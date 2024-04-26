<?php
session_start();
unset($_SESSION['reservation_page']);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/category.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="../output.css" rel="stylesheet">

    <title>Category</title>
</head>
<body>
<?php
include("./Header.php")
?>


<div class="container mx-auto my-32">
<section class="items-center mx-10 mt-16 mb-8 md:mb-20 flex flex-col-reverse md:flex-row md:space-x-28 md:justify-around" id="hero">

<div class="flex flex-col">
      
        <h3 class="mt-6 mb-3 font-bold text-xl md:text-xl lg:text-2xl italic text-slate-800 text-center lg:text-left">
            Food made <span class="text-red-500"> with love </span>
        </h3>
        
        <p class="md:max-w-md text-center md:text-left lg:text-xl md:leading-6 lg:leading-8">The restaurant, offering a chic and cozy atmosphere, combines creative French cuisine with traditional Moroccan dishes. Every evening, a live band accompanied by a saxophonist animates your nights for a jazzy ambiance. Enjoy the terrace for a cocktail, share a hookah, or dine with a magnificent view of the Atlas Mountains, as well as the gardens and the pool.
        </p>
</div>

<div class="w-2/3 md:w-auto">
<img src="../assets/Images/Sfs.gif" alt="tatai" class="rounded-full">
</div>

</section>


<section class="container" id="speciality">

<h1 class="text-xl lg:text-2xl italic text-slate-800 text-center font-bold">Our <span class="text-red-500">specialty</span></h1>

<div class="gap-6 mt-3 flex flex-col md:flex-row flex-wrap text-center items-center justify-center">
    
<div class="hover:bg-slate-100 max-w-xs hover:max-w-sm lg:max-w-sm lg:hover:max-w-md bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
        <a href="./snacks.php">
            <img class="rounded-t-lg" src="../assets/images/s-img-1.jpg" alt="" />
        </a>
    <div class="p-5">
        <a href="./snacks.php">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Burgers & Snacks</h5>
        </a>
            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Here are the biggest enterprise technology acquisitions of 2021 so far, in reverse chronological order.</p>
            <a href="./snacks.php" class="inline-flex items-center px-6 italic py-2 text-sm font-medium text-center text-white bg-red-500 rounded-lg border-b-4 border-red-900 hover:border-b-0 hover:border-t-4 hover:bg-red-400 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                View
                <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                </svg>
            </a>
    </div>
</div>
    

<div class="hover:bg-slate-100 max-w-xs hover:max-w-sm lg:max-w-sm lg:hover:max-w-md bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
        <a href="./pizza.php">
            <img class="rounded-t-lg" src="../assets/images/s-img-2.jpg" alt="" />
        </a>
    <div class="p-5">
        <a href="./pizza">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Pizza</h5>
        </a>
            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Here are the biggest enterprise technology acquisitions of 2021 so far, in reverse chronological order.</p>
            <a href="./pizza.php" class="inline-flex items-center px-6 italic py-2 text-sm font-medium text-center text-white bg-red-500 rounded-lgborder-b-4 border-red-900 hover:border-b-0 hover:border-t-4 hover:bg-red-400 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                View
                <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                </svg>
            </a>
    </div>
</div>


<div class="hover:bg-slate-100 max-w-xs hover:max-w-sm lg:max-w-sm lg:hover:max-w-md bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
        <a href="./glaces.php">
            <img class="rounded-t-lg" src="../assets/images/s-img-3.jpg" alt="" />
        </a>
    <div class="p-5">
        <a href="./glaces.php">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Ice creams</h5>
        </a>
            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Here are the biggest enterprise technology acquisitions of 2021 so far, in reverse chronological order.</p>
            <a href="./glaces.php" class="inline-flex items-center px-6 italic py-2 text-sm font-medium text-center text-white bg-red-500 rounded-lg border-b-4 border-red-900 hover:border-b-0 hover:border-t-4 hover:bg-red-400 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                View
                <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                </svg>
            </a>
    </div>
</div>

<div class="hover:bg-slate-100 max-w-xs hover:max-w-sm lg:max-w-sm lg:hover:max-w-md bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
        <a href="./plats.php">
            <img class="rounded-t-lg" src="../assets/images/s-img-7.jpg" alt="" />
        </a>
    <div class="p-5">
        <a href="./plats.php">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Special Main Courses</h5>
        </a>
            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Here are the biggest enterprise technology acquisitions of 2021 so far, in reverse chronological order.</p>
            <a href="./plats.php" class="inline-flex items-center px-6 italic py-2 text-sm font-medium text-center text-white bg-red-500 rounded-lg border-b-4 border-red-900 hover:border-b-0 hover:border-t-4 hover:bg-red-400 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                View
                <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                </svg>
            </a>
    </div>
</div>

<div class="hover:bg-slate-100 max-w-xs hover:max-w-sm lg:max-w-sm lg:hover:max-w-md bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
        <a href="./patisserie.php">
            <img class="rounded-t-lg" src="../assets/images/s-img-5.jpg" alt="" />
        </a>
    <div class="p-5">
        <a href="./patisserie.php">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Tasty Pastry</h5>
        </a>
            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Here are the biggest enterprise technology acquisitions of 2021 so far, in reverse chronological order.</p>
            <a href="./patisserie.php" class="border-b-4 border-red-900 hover:border-b-0 hover:border-t-4 hover:bg-red-400 inline-flex items-center px-6 italic py-2 text-sm font-medium text-center text-white bg-red-500 rounded-lg focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                View
                <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                </svg>
            </a>
    </div>
</div>

<div class="hover:bg-slate-100 max-w-xs hover:max-w-sm lg:max-w-sm lg:hover:max-w-md bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
        <a href="./boissans.php">
            <img class="rounded-t-lg"  src="../assets/images/s-img-4.jpg" alt="" />
        </a>
    <div class="p-5">
        <a href="./boissans.php">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Chilled Beverages</h5>
        </a>
            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Here are the biggest enterprise technology acquisitions of 2021 so far, in reverse chronological order.</p>
            <a href="./boissans.php" class="inline-flex items-center px-6 italic py-2 text-sm font-medium text-center text-white bg-red-500 rounded-lg border-b-4 border-red-900 hover:border-b-0 hover:border-t-4 hover:bg-red-400 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                View
                <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                </svg>
            </a>
    </div>
</div>

</div>
</section>


</div>

<?php 
include("./footer.php")
?>



</body>
</html>