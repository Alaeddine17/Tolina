<?php
session_start();
include("./config/config.php");

if(isset($_POST['getTable'])){
   $_SESSION['product_table'] = $_POST['categorie'];
}
$product_table = $_SESSION['product_table'];


if(isset($_POST['add_product'])){
   
   $product_categorie = $_POST['tableName'];
   $product_price = $_POST['product_price'];
   $product_name = $_POST['product_name'];
   $product_image = $_FILES['product_image']['name'];
   $product_image_tmp_name = $_FILES['product_image']['tmp_name'];

   if(empty($product_name) || empty($product_price) || empty($product_image) || empty($product_categorie)){
      echo '<script>alert("Veuillez remplir toutes les informations!!")</script>';
   } else {
      // Generate a unique name for the new image using timestamp and product ID
    //  $newName = crc32(uniqid()) . '.' . pathinfo($product_image, PATHINFO_EXTENSION);
      $product_image_folder = $product_categorie . '/' . $product_image;
      $insert = "INSERT INTO $product_categorie(Nom, Prix, Image) VALUES ('$product_name', '$product_price', '$product_image')";
      $sqlInsert = mysqli_query($connect, $insert);

      if($sqlInsert){
         move_uploaded_file($product_image_tmp_name, $product_image_folder);
         echo "<script>alert('New product added successfully')</script>";
         echo "<script>window.location = 'admin_page.php?action=produits'</script>";
      } else {
         echo 'Error: ' . mysqli_error($connect);
      }
   }
}


if(isset($_GET['action']) && $_GET['action'] == "delete"){
   if(isset($_GET['Id'])){
      
      $ID = $_GET['Id'];
       $selectsql = "SELECT * FROM $product_table WHERE Id='$ID'";
       $adapter = mysqli_query($connect, $selectsql);
       $result = mysqli_fetch_array($adapter);
       $Nom = $result['Image'];
       
   if($Nom){

      $imagepath = __DIR__  . "/" . $product_table . "/" . $Nom;

      if (file_exists($imagepath)) {

         unlink($imagepath);
         $Delet = "DELETE FROM $product_table WHERE Id = '$ID'";
         $sqlDelete = mysqli_query($connect, $Delet);
         
         if($sqlDelete){
         echo "<script>alert('vous avez bien supprimer le produit!')</script>";
         echo "<script>window.location = 'admin_page.php?action=produits'</script>";

         }else{
            echo "Error : 1 " . mysqli_error($connect);
         }
         
      }else{
         echo "L'image n'existe pas.." . $ID . " - " . $imagepath;
      }

   } else {
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" integrity="sha512-Avb2QiuDEEvB4bZJYdft2mNjVShBftLdPG8FJ0V7irTLQ8Uo0qcPxh4Plq7G5tGm0rU+1SPhVotteLpBERwTkw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/remixicon@3.6.0/fonts/remixicon.min.css">
    <link href="../output.css" rel="stylesheet">
    <title>Document</title>
</head>
<body>


<div class="p-4 sm:ml-12 md:ml-20 lg:ml-26">
    <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
       
          
      <div class="mx-auto p-10 space-y-5 bg-gray-50">

            <div class="p-2 flex flex-col lg:flex-row justify-center items-center sapce-x-0 space-y-5 lg:space-y-0 lg:space-x-8">
               
                  <form action="<?php echo $_SERVER['PHP_SELF']?>?action=produits" method="post" class="rounded-lg shadow-xl space-y-0 lg:space-y-1 space-x-2 lg:space-x-0 flex lg:flex-col lg:mx-0 flex-row justify-between items-center bg-white p-1 lg:relative">   
                        <input id="glaces"     type="radio" name="categorie" value="glaces">     <label  for="glaces">     <img   src="../assets/icon2.png" alt="glc"></label>
                        <input id="patisserie" type="radio" name="categorie" value="patisserie"> <label  for="patisserie"> <img   src="../assets/icon3.png" alt="pat"></label>
                        <input id="boissans"   type="radio" name="categorie" value="boissans">   <label  for="boissans">   <img   src="../assets/icon1.png" alt="boi"></label>
                        <input id="pizza"      type="radio" name="categorie" value="pizza">      <label  for="pizza"      ><img   src="../assets/icon4.png" alt="boi"></label>
                        <input id="plats"      type="radio" name="categorie" value="plats">      <label  for="plats"      ><img   src="../assets/icon5.png" alt="boi"></label>
                        <input id="snacks"     type="radio" name="categorie" value="snacks">     <label  for="snacks">     <img   src="../assets/icon6.png" alt="boi"></label>
                        <button type="submit" name="getTable" class="w-28 h-8 lg:text-lg text-white lg:font-semibold lg:my-1 bg-red-500 px-2 border border-x-2 border-y border-white rounded cursor-pointer">Choisir <i class="fas fa-sort"></i></button>
                  </form>
               
               <form class="p-2 flex flex-col items-center space-y-3 bg-gray-200 w-full md:w-3/4 lg:w-2/5 rounded-xl" action="./admin_produits.php" method="post" enctype="multipart/form-data">
         
         
         
                  <h3 class="text-xl font-bold text-slate-800 my-1 md:my-4">Ajouter<span class="text-red-400"> nouvelle </span> produit</h3>

                  <div class="flex flex-col space-y-2 w-2/3">
                     <input name="product_name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text"  placeholder="Entrer le Nom produit">
                     <input name="product_price" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" placeholder="Entrer le prix (DH)">
                     <input name="product_image" type="file" accept="image/png, image/jpeg, image/jpg" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">      
                  </div>
                  <button type="submit" name="add_product" class="bg-red-600 text-white p-2 w-2/3"><span class="">Ajouter </span><i class="fa fa-plus-circle"></i></button>
         
                  <div class="w-2/3 bg-gray-100 flex flex-row justify-around border-2 rounded-xl border-gray-200">
                        <select name="tableName" class="w-full p-2 text-center" required>
                           <option>Select</option>
                           <option value="boissans">boissans</option>
                           <option value="glaces">glaces</option>
                           <option value="patisserie">patisserie</option>
                           <option value="pizza">pizza</option>
                           <option value="plats">plats</option>
                           <option value="snacks">snacks</option>
                        </select>
                     </div>
         
                               
               </form>
         
            </div>
         
            <?php
         
            $select = mysqli_query($connect, "SELECT * FROM $product_table");
            
            ?>
            <div class="">
               <table class="text-center w-full">
                  <thead class="bg-gray-200 text-sm md:text-xl">
                  <tr class="">
                     <th class="p-2">image</th>
                     <th class="p-2">Labelle</th>
                     <th class="p-2">prix</th>
                     <th class="p-2">action</th>
                  </tr>
                  </thead>
                  <?php while($row = mysqli_fetch_assoc($select)){ ?>
                  <tr class="text-center text-sm md:text-lg shadow-md font-semibold">
                     <td class="py-1"><img class="block mx-auto h-16 w-32 sm:w-40 md:w-44 sm:h-24 my-2 border-2 border-red-300 rounded-xl" src="<?php echo $product_table . "/" . $row['Image']; ?>" height="100" alt=""></td>
                     <td class="py-1 px-4"><?php echo $row['Nom']; ?></td>
                     <td class="py-1 px-4"><?php echo $row['Prix']; ?>/-MAD</td>
                     <td class="py-1">
                       <div class="flex flex-row md:flex-col">
                        <a href="admin_page.php?action=update&Id=<?php echo $row['Id']; ?>" class="btn"> <i class="fas fa-edit"></i> edit </a>
                        <a href="admin_produits.php?action=delete&Id=<?php echo $row['Id']; ?>" class="btn"> <i class="fas fa-trash"></i> delete </a>
                       </div>
                     </td>
                  </tr>
               
               <?php }
               mysqli_free_result($adapter);        
               mysqli_close($connect);
              

               ?>
               </table>
            </div>
         
         </div>       
    </div>
 </div>


</body>