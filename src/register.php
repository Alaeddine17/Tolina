<?php
include("./config/config.php");

session_start();
unset($_SESSION['reservation_page']);


if(isset($_POST['Send'])){
  
  $Nom = mysqli_real_escape_string($connect, $_POST['nomPrenom']);
  $Email = mysqli_real_escape_string($connect, $_POST['email']);
  $Tel = mysqli_real_escape_string($connect, $_POST['telephone']);
  $password = mysqli_real_escape_string($connect, $_POST['password']);
  $cPassword = mysqli_real_escape_string($connect, $_POST['cPassword']);

    if (empty($Nom)) {
        echo "Veuillez remplir le champ Nom !!";
    } elseif (empty($Email)) {
        echo "Veuillez remplir le champ Email !!";
    } elseif (!filter_var($Email, FILTER_VALIDATE_EMAIL)) {
        echo "Veuillez entrer une adresse email valide";
    } elseif (empty($Tel)) {
        echo "Veuillez entrer le numéro de téléphone !!";
    } elseif (empty($password)) {
        echo "Veuillez entrer le mot de passe";
    } elseif (empty($cPassword)) {
        echo "Veuillez confirmer le mot de passe";
    } elseif ($password !== $cPassword) {
        echo "La confirmation du mot de passe n'est pas correcte !";
    }else{
        $sqlInsert = "INSERT INTO utilisateurs(utilisateur, tel, email, psswrd, autorisation) VALUES ('$Nom','$Tel','$Email','$password','client')";
        $sqladapter = mysqli_query($connect, $sqlInsert);


        if($sqladapter){
            
            echo '<script>alert("L\'inscription a réussi, Connectez-vous!!")</script>';
            echo '<script>window.location = "login.php"</script>';
        }else{
            echo "Error : " . mysqli_error($connect);
        }
    }
    
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
    
<div id="login-popup" tabindex="-1" class="bg-slate-200 overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 h-full items-center justify-center flex">
    <div class="relative p-4 w-full max-w-md md:h-auto">

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
                    Sign up for your account
                    </p>
                    <p class="mt-2 mb-7 text-sm leading-4 text-slate-600">
                    Welcome to the Tolin family!
                    </p>
                </div>

                <form method="post" action="<?php echo $_SERVER['PHP_SELF']?>" class="w-full">
                    <label for="nomPrenom" class="sr-only">Full name</label>
                    <input name="nomPrenom" type="text" required
                        class="mx-auto block w-5/6 rounded-lg border border-gray-300 px-3 py-1 shadow-sm outline-none placeholder:text-gray-400 focus:ring-2 focus:ring-black focus:ring-offset-1"
                        placeholder="Full name" value="">
                        <label for="email" class="sr-only">E-mail Adress</label>
                    <input name="email" type="email" required
                        class="mx-auto mt-3 block w-5/6 rounded-lg border border-gray-300 px-3 py-1 shadow-sm outline-none placeholder:text-gray-400 focus:ring-2 focus:ring-black focus:ring-offset-1"
                        placeholder="E-mail" value="">
                        <label for="telephone" class="sr-only">Telephone</label>
                    <input name="telephone" type="text" required
                        class="mx-auto mt-3 block w-5/6 rounded-lg border border-gray-300 px-3 py-1 shadow-sm outline-none placeholder:text-gray-400 focus:ring-2 focus:ring-black focus:ring-offset-1"
                        placeholder="Telephone" value="">
                        <label for="password" class="sr-only">Password</label>
                    <input name="password" type="password" required
                        class="mx-auto mt-3 block w-5/6 rounded-lg border border-gray-300 px-3 py-1 shadow-sm outline-none placeholder:text-gray-400 focus:ring-2 focus:ring-black focus:ring-offset-1"
                        placeholder="Password" value="">
                        <label for="cPassword" class="sr-only">Confirmer le mot de passe</label>
                    <input name="cPassword" type="password" required
                        class="mx-auto mt-3 block w-5/6 rounded-lg border border-gray-300 px-3 py-1 shadow-sm outline-none placeholder:text-gray-400 focus:ring-2 focus:ring-black focus:ring-offset-1"
                        placeholder="Confirm the password" value="">
                    <p class="mb-3 mt-2 text-sm text-gray-500">
                        <a href="/forgot-password" class="text-blue-800 hover:text-blue-600">Reset your password?</a>
                    </p>
                    <button type="text" name="Send" class="inline-flex w-full items-center justify-center rounded-lg bg-red-500 p-2 py-3 text-sm font-medium text-white outline-none focus:ring-2 focus:ring-black focus:ring-offset-1 disabled:bg-gray-400">
                       Sign In
                    </button>
                </form>

                <div class="flex w-full items-center py-4 gap-5 text-sm text-slate-600">
                    <div class="h-px w-full bg-slate-200"></div>
                    OR
                    <div class="h-px w-full bg-slate-200"></div>
                </div>

                <div class="block">
                    <button
                        class="inline-flex h-10 w-full items-center justify-center gap-2 rounded border border-slate-300 bg-white p-2 text-sm font-medium text-black outline-none focus:ring-2 focus:ring-[#333] focus:ring-offset-1 disabled:cursor-not-allowed disabled:opacity-60"><img
                            src="https://www.svgrepo.com/show/475656/google-color.svg" alt="Google"
                            class="h-[18px] w-[18px] ">Continuer with
                        Google
                    </button>
                </div>


            </div>
        </div>
    </div>
</div>

</body>
</html>