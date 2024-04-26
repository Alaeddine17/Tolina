
<?php
include("./config/config.php");

if(isset($_POST['update'])){
  
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
        $Update = "UPDATE utilisateurs SET utilisateur = '" . $Nom . "', tel = '" . $Tel . "', email = '" . $Email ."', psswrd = '" . $password . "' WHERE Id_client = '" . $_GET['ID'] . "'";        
        $sqlUpdate = mysqli_query($connect, $Update);
        if($sqlUpdate){
            echo '<script>alert("La modification a réussi")</script>';
            echo "<script>window.location = 'admin_page.php?action=utilisateurs'</script>";
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

<div class="p-4 sm:ml-12 md:ml-20 lg:ml-26">
    <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
    
    <div id="login-popup" tabindex="-1" class="overflow-y-auto overflow-x-hidden top-0 right-0 left-0 z-50 h-full items-center justify-center flex">
    <div class="relative p-4 w-full max-w-md md:h-auto">

        <div class="relative bg-white rounded-lg shadow">
            <a href="./admin_page.php?action=utilisateurs">
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
                    <p class="mb-8 text-2xl font-semibold leading-5 text-slate-900">
                    Modifications on the account!
                    </p>
                </div>

        
                <form method="post" action="admin_utilisateurs_update.php?ID=<?php echo $_GET['ID']?>" class="w-full">
        
                <?php

                $sqlSelect = "SELECT * FROM utilisateurs WHERE Id_client = '" . $_GET['ID'] . "'";
                $sqlSelectAdapter = mysqli_query($connect, $sqlSelect);
                $result = mysqli_fetch_assoc($sqlSelectAdapter);

                ?>  

                    <label for="nomPrenom" class="sr-only">Full Name</label>
                    <input name="nomPrenom" type="text" required
                        class="mx-auto block w-5/6 rounded-lg border border-gray-300 px-3 py-1 shadow-sm outline-none placeholder:text-gray-400 focus:ring-2 focus:ring-black focus:ring-offset-1"
                        value="<?php echo $result['utilisateur'] ?>">
                        <label for="email" class="sr-only">E-mail</label>
                    <input name="email" type="email" required
                        class="mx-auto mt-3 block w-5/6 rounded-lg border border-gray-300 px-3 py-1 shadow-sm outline-none placeholder:text-gray-400 focus:ring-2 focus:ring-black focus:ring-offset-1"
                        value="<?php echo $result['email'] ?>">
                        <label for="telephone" class="sr-only">Telephone</label>
                    <input name="telephone" type="text" required
                        class="mx-auto mt-3 block w-5/6 rounded-lg border border-gray-300 px-3 py-1 shadow-sm outline-none placeholder:text-gray-400 focus:ring-2 focus:ring-black focus:ring-offset-1"
                        value="<?php echo $result['tel'] ?>">
                        <label for="password" class="sr-only">Password</label>
                    <input name="password" type="password" required
                        class="mx-auto mt-3 block w-5/6 rounded-lg border border-gray-300 px-3 py-1 shadow-sm outline-none placeholder:text-gray-400 focus:ring-2 focus:ring-black focus:ring-offset-1"
                        value="<?php echo $result['psswrd'] ?>">
                        <label for="cPassword" class="sr-only">Confirm the password</label>
                        <input name="cPassword" type="password" required
                        class="mx-auto mt-3 block w-5/6 rounded-lg border border-gray-300 px-3 py-1 shadow-sm outline-none placeholder:text-gray-400 focus:ring-2 focus:ring-black focus:ring-offset-1"
                        value="<?php echo $result['psswrd'] ?>">
                    <br>
                    <button type="submit" name="update" class="inline-flex w-full items-center justify-center rounded-lg bg-red-500 p-2 py-3 text-sm font-medium text-white outline-none focus:ring-2 focus:ring-black focus:ring-offset-1 disabled:bg-gray-400">
                       Update
                    </button>
                </form>
             


             
            </div>
        </div>
    </div>
</div>


</div>
</div>
<?php
mysqli_close($connect);
?>
</body>
</html>

