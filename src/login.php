<?php
include("./config/config.php");
session_start();

if(isset($_POST['Login'])){

    $email = mysqli_real_escape_string($connect, $_POST['email']);
    $password = mysqli_real_escape_string($connect, $_POST['password']);

    $sqlSelect = "SELECT * FROM utilisateurs WHERE email = '$email' && psswrd = '$password'";
    $adapter = mysqli_query($connect, $sqlSelect);

    if($adapter){
        if(mysqli_num_rows($adapter) > 0){
    
            $sql = "SELECT Id_client, utilisateur, autorisation FROM utilisateurs WHERE email = '$email' && psswrd = '$password'";
            $useradapter = mysqli_query($connect,$sql);
            $_SESSION['user'] = mysqli_fetch_array($useradapter);
        if($_SESSION['user'][2] == 'client'){
            echo '<script>alert("Connexion réussie.")</script>';
            echo '<script>window.location = "../index.php"</script>';
        }elseif($_SESSION['user'][2] == 'utilisateur' || $_SESSION['user'][2] == 'admin'){
            echo '<script>alert("Connexion réussie.")</script>';
            echo '<script>window.location = "admin_page.php?action=analyse"</script>';
        }
       
        }else{
            echo '<script>alert("Il semble que vous ayez saisi un nom d\'utilisateur ou une adresse e-mail incorrectement orthographié.")</script>';
        }
    }else{
        echo "Error : " . mysqli_error($connect);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../output.css" rel="stylesheet">

    <title>login</title>
</head>
<body>



<div id="login-popup" tabindex="-1" class="bg-slate-200 overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 h-full items-center justify-center flex">
    <div class="relative p-4 w-full max-w-md h-full md:h-auto">

        <div class="relative bg-white rounded-lg shadow">
            <a href="../index.php">
            <button type="button"
                class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center popup-close"><svg
                    aria-hidden="true" class="w-5 h-5" fill="#c6c7c7" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                        cliprule="evenodd"></path>
                </svg>
                <span class="sr-only">Close popup</span>
            </button>
            </a>

            <div class="p-5">
                <h3 class="text-2xl mb-0.5 font-medium"></h3>
                <p class="mb-4 text-sm font-normal text-gray-800"></p>

                <div class="text-center">
                    <p class="mb-3 text-2xl font-semibold leading-5 text-slate-900">
                      Connect to your account
                    </p>
                    <p class="mt-2 text-sm leading-4 text-slate-600">
                      You must be logged in to perform this action.
                    </p>
                </div>

                <div class="mt-7 flex flex-col gap-2">

                    <button
                        class="inline-flex h-10 w-full items-center justify-center gap-2 rounded border border-slate-300 bg-white p-2 text-sm font-medium text-black outline-none focus:ring-2 focus:ring-[#333] focus:ring-offset-1 disabled:cursor-not-allowed disabled:opacity-60"><img
                            src="https://www.svgrepo.com/show/512317/github-142.svg" alt="GitHub"
                            class="h-[18px] w-[18px] ">
                            Continue with GitHub
                    </button>

                    <button
                        class="inline-flex h-10 w-full items-center justify-center gap-2 rounded border border-slate-300 bg-white p-2 text-sm font-medium text-black outline-none focus:ring-2 focus:ring-[#333] focus:ring-offset-1 disabled:cursor-not-allowed disabled:opacity-60"><img
                            src="https://www.svgrepo.com/show/475656/google-color.svg" alt="Google"
                            class="h-[18px] w-[18px] ">Continuer avec with
                        Google
                    </button>


                    <button
                        class="inline-flex h-10 w-full items-center justify-center gap-2 rounded border border-slate-300 bg-white p-2 text-sm font-medium text-black outline-none focus:ring-2 focus:ring-[#333] focus:ring-offset-1 disabled:cursor-not-allowed disabled:opacity-60"><img
                            src="https://www.svgrepo.com/show/448234/linkedin.svg" alt="Google"
                            class="h-[18px] w-[18px] ">Continuer with
                        LinkedIn
                    </button>
                </div>

                <div class="flex w-full items-center gap-2 py-6 text-sm text-slate-600">
                    <div class="h-px w-full bg-slate-200"></div>
                    OR
                    <div class="h-px w-full bg-slate-200"></div>
                </div>

                <form method="post" action="./Login.php" class="w-full">
                    <label for="email" class="sr-only">Adresse E-mail</label>
                    <input id="email" name="email" type="text" autocomplete="email" required
                        class="block w-full rounded-lg border border-gray-300 px-3 py-2 shadow-sm outline-none placeholder:text-gray-400 focus:ring-2 focus:ring-black focus:ring-offset-1"
                        placeholder="Email Address" value="">
                    <label for="password" class="sr-only">Mot de pass</label>
                    <input name="password" id="password" type="password" autocomplete="current-password" required
                        class="mt-2 block w-full rounded-lg border border-gray-300 px-3 py-2 shadow-sm outline-none placeholder:text-gray-400 focus:ring-2 focus:ring-black focus:ring-offset-1"
                        placeholder="Password" value="">
                    <p class="mb-3 mt-2 text-sm text-gray-500">
                        <a href="/forgot-password" class="text-blue-800 hover:text-blue-600">Reset your password ?</a>
                    </p>
                    <button type="submit" name="Login" class="inline-flex w-full items-center justify-center rounded-lg bg-red-500 p-2 py-3 text-sm font-medium text-white outline-none focus:ring-2 focus:ring-black focus:ring-offset-1 disabled:bg-gray-400">
                       Log In
                    </button>
                </form>

                <div class="mt-6 text-center text-sm text-slate-600">
                    Don't have an account?
                    <a href="./register.php" class="font-medium text-[#4285f4]">Sign up</a>
                </div>
            </div>
        </div>
    </div>
</div>


</body>
</html>