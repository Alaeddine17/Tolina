<?php


include './config/config.php';

session_start();

unset($_SESSION['reservation_page']);



if (isset($_POST["Envoyer"])) {

    if (isset($_SESSION["shopping_cart"])) {

        $item_array_id = array_column($_SESSION["shopping_cart"], "ID");

        if (!in_array($_GET["Id"], $item_array_id)) {
            // If the item is not in the cart, add it
            $item_array = array(
                'ID'       => $_GET["Id"],
                'Repas'    => $_POST["HNom"],
                'Prix'     => $_POST["HPrix"],
                'Quantité' => $_POST["Quantite"],
            );
            $_SESSION["shopping_cart"][] = $item_array;

            echo '<script>alert("La commande est réservée.");</script>';
            echo '<script>window.location="snacks.php"</script>';
        } else {
            // If the item is already in the cart, increment its quantity
            $ID = array_search($_GET["Id"], $item_array_id);
            $_SESSION["shopping_cart"][$ID]['Quantité'] += $_POST["Quantite"];
            echo '<script>alert("L\'augmentation de la quantité a réussi.");</script>';
            echo '<script>window.location="snacks.php"</script>';
        }
    } else {
        // If the cart is empty, add the item
        $item_array = array(
            'ID'       => $_GET["Id"],
            'Repas'    => $_POST["HNom"],
            'Prix'     => $_POST["HPrix"],
            'Quantité' => $_POST["Quantite"],
        );
        $_SESSION["shopping_cart"][] = $item_array;

        echo '<script>alert("La commande est réservée.");</script>';
        echo '<script>window.location="snacks.php";</script>';
    }
}

if (isset($_GET['action']) && $_GET["action"] == "delete") {
    foreach ($_SESSION["shopping_cart"] as $keys => $values) {
        if ($values["ID"] == $_GET["Id"]) {
            // Remove the item from the cart
            unset($_SESSION["shopping_cart"][$keys]);
            echo '<script>alert("Commande est supprimée")</script>';
            echo '<script>window.location="snacks.php"</script>';
        }
    }
}

if(isset($_GET['action']) && $_GET['action'] == 'clearall') {
	unset($_SESSION['shopping_cart']);
		echo '<script>alert("le panier d\'achats est supprimée")</script>';
        echo '<script>window.location="snacks.php"</script>';

}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="../output.css" rel="stylesheet">
        <title>Commande</title>
</head>
<body>

<?php
    include("./Header.php")
?>

	<div class="container mx-auto mt-24 md:mt-32 mb-10">
		
    <section class="text-center space-y-4 my-10 mx-10 flex flex-col">

        
            <h3 class="text-2xl lg:text-2xl font-semibold italic">Food made <span class="text-red-500">With love</span></h3>
            <p class="text-lg md:text-xl lg:text-xl">The restaurant, offering a chic and cozy atmosphere, combines creative French cuisine with traditional Moroccan dishes. Every evening, a live band accompanied by a saxophonist entertains your nights for a jazzy ambiance. Enjoy the terrace for a cocktail, share a shisha, or have dinner with a magnificent view of the Atlas Mountains, as well as the gardens and the pool.</p>
        
    </section>

	<section class="snacks container">
		<div class="flex flex-col space-y-6 md:flex-row gap-x-6 md:flex-wrap justify-center items-center">
			
			<?php		
				$query = "SELECT * FROM snacks ORDER BY Id ASC";
				$result = mysqli_query($connect, $query);
				
				if(mysqli_num_rows($result) > 0 )
				{
					
					while($row = mysqli_fetch_array($result))
					{
						?>
        
		<div class="w-full max-w-sm bg-white border max-h-full mt-5 border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
		
		<div
			class="border-2 p-1 rounded-lg border-white bg-red-500 absolute mt-8 ml-64 text-center text-red-500">
				<span class="text-white font-bold"><?php echo $row['Prix']?> MAD</span>
		</div>
			
			<form method="POST" action="snacks.php?action=add&Id=<?php echo $row['Id']?>">


				<img class="px-6 pt-6 pb-3 rounded-t-lg" src="snacks/<?php echo $row['Image']?>" alt="product image" />
				
					<div class="px-5 pb-5">
					
							<h5 class="text-xl cursor-default font-semibold tracking-tight text-gray-900 dark:text-white text-center"><?php echo $row['Nom']?></h5>
						
									<div class="flex items-center mt-2.5 mb-5">
												<div class="flex items-center space-x-1 rtl:space-x-reverse">
												
													<?php for($i=1;$i<5;$i++){ ?>	<svg class="w-4 h-4 text-yellow-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
															<path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
													</svg> <?php } ?>
											
													<svg class="w-4 h-4 text-gray-200 dark:text-gray-600" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
														<path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
													</svg>
												</div>
												<span class="bg-blue-100 text-blue-800 text-xs font-semibold px-2.5 py-0.5 rounded dark:bg-blue-200 dark:text-blue-800 ms-3">5.0</span>

									</div>
					
									<div class="flex items-center justify-between">
										
										<span class="max-w-sm">

											<input type="hidden" name="HNom" value="<?php echo $row['Nom']?>">	
											<input type="hidden" name="HPrix" value="<?php echo $row['Prix']?>">	
											<input type="number" name="Quantite" value="1" aria-describedby="helper-text-explanation" class=" block w-full py-1.5 text-md bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-red-500 focus:border-red-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white text-center dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
										</span>

											<button type="submit" name="Envoyer" class="text-white bg-red-500 hover:bg-red-600 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg px-5 py-2.5 text-center "><span class="text-xs">Ajouter </span><i class="fas fa-cart-plus"></i></button>
									</div>
					</div>
			</div>

			</form>		
			<?php } } mysqli_free_result($result); ?>
		</div>
													</div>




</section>





<section class="w-full md:w-2/3 mx-auto mb-14" id="cartDetails">
<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-red-300 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Repas
                </th>
                <th scope="col" class="px-6 py-3">
                <div class="flex items-center">
                    Quantité
                <a href="#"><svg class="w-3 h-3 ms-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
    <path d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z"/>
  </svg></a>
                    </div>
                </th>
                <th scope="col" class="px-6 py-3">
                    <div class="flex items-center">
                        Prix Unit
                        <a href="#"><svg class="w-3 h-3 ms-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
    <path d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z"/>
  </svg></a>
                    </div>
                </th>
                <th scope="col" class="px-6 py-3">
                    <div class="flex items-center">
                        Total
                        <a href="#"><svg class="w-3 h-3 ms-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
    <path d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z"/>
  </svg></a>
                    </div>
                </th>
				<th scope="col" class="px-3 py-3">
                    <div class="flex items-center">
                        Action
                        <a href="#"><svg class="w-3 h-3 ms-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
    <path d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z"/>
  </svg></a>
                    </div>
                </th>
            </tr>
        </thead>
        <tbody>


		<?php
					if(!empty($_SESSION["shopping_cart"]))
					{
						$total = 0;
						foreach($_SESSION["shopping_cart"] as $keys => $values)
						{
					?>


            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
				<?php echo $values["Repas"]; ?>
                </th>
                <td class="px-6 py-4 relative left-8">
				<?php echo $values["Quantité"] ?>
                </td>
                <td class="px-6 py-4">
				<?php echo $values["Prix"]; ?> MAD
                </td>
                <td class="px-6 py-4">
				<?php echo number_format($values["Quantité"] * $values["Prix"], 2);?> MAD
                </td>
                <td class="px-6 py-4">
                    <a href="snacks.php?action=delete&Id=<?php echo $values["ID"]; ?>" class="font-bold text-white rounded-full bg-red-500 border border-red-100 p-2 hover:underline">Remove</a>
                </td>
            </tr>
            
    
			<?php $total = $total + ($values["Quantité"] * $values["Prix"]); } ?>
					
							
					<tr align="center" class="bg-red-300 border-b text-xl dark:bg-gray-800 dark:border-gray-700">
						<td colspan="3" class="text-white">Total</td>
						<td class="px-6 py-4 text-black" id="Total"><?php echo number_format($total, 2); ?> MAD</td>
						<td class="th"><a href="snacks.php?action=clearall"><button class="btn btn-red-500 text-white rounded-lg">clear all</button></a></td>
						
					</tr>
					
				
					<?php } mysqli_close($connect);?>
					
					
                </tbody>
				</table>

</div>
</section>

<div class="flex flex-row justify-center space-x-8 my-10">
    <button type="submit" name="Comfirmer" class="max-w-xs mx-auto bg-red-400 hover:bg-red-500 focus:bg-red-700 text-white rounded-lg px-3 py-3 font-semibold" id="btnR"><a href="check.php">Confirmer l'achat</a></button>
</div>
</div>
	
	<?php
	include("./footer.php")
	?>


</body>
</html>