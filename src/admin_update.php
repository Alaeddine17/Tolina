<?php
session_start();
include("./config/config.php");

$product_table = $_SESSION['product_table'];



if(isset($_POST['update_product'])){

   $ID = $_SESSION['ID'];
   $selectsql = "SELECT * FROM $product_table WHERE Id='$ID'";
   $adapter = mysqli_query($connect, $selectsql);
   $result = mysqli_fetch_array($adapter);
   $Nom = $result['Image'];
  
   if($Nom){
      $imagepath = __DIR__  . "/" . $product_table . "/" . $Nom ;
      if (file_exists($imagepath)) {
      unlink($imagepath);
      }else{
         echo "Error : file doesn't exist";
      }
   }

 
   $new_product_price = $_POST['new_product_price'];
   $new_product_name = $_POST['new_product_name'];
   $new_product_image = $_FILES['new_product_image']['name'];
   $new_product_image_tmp_name = $_FILES['new_product_image']['tmp_name'];
 
   if(empty($new_product_name) || empty($new_product_price) || empty($new_product_image)){
      echo '<script>alert("voullez-vous remplire toute les information!!")</script>';
      echo "<script>window.location = 'admin_update.php?action=update&Id=" . $ID . "'</script>";
   
   }else{
    //  $newName = crc32(uniqid()) . '.' . pathinfo(new_product_image, PATHINFO_EXTENSION);
      $product_image_folder = $product_table . '/' . $new_product_image;
      $Update = "UPDATE $product_table SET Nom ='" . $new_product_name . "', Prix = '" . $new_product_price . "', Image = '" . $new_product_image . "' WHERE Id = '" . $ID . "'";
      $sqlUpdate = mysqli_query($connect, $Update);
   
      if($sqlUpdate){
         move_uploaded_file($new_product_image_tmp_name, $product_image_folder);
         echo "<script>alert('le produit est bien modifier!!')</script>";
         echo "<script>window.location = 'admin_page.php?action=produits'</script>";
         unset($_SESSION['ID']);
         unset($_SESSION['product_table']);
      }else{
         echo "Error : " . mysqli_error($connect);
      }
   }  
   }

if(isset($_POST['Annuler'])){
   echo "<script>window.location = 'admin_page.php?action=produits'</script>";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
   <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
   <link href="../output.css" rel="stylesheet">

   <title>Document</title>
</head>
<body>


<div class="p-4 sm:ml-12 md:ml-20 lg:ml-26">
   <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
      <form class=" mx-auto p-2 flex flex-col items-center space-y-3 bg-gray-200 w-full md:w-3/4 lg:w-2/5 rounded-xl" action="admin_update.php" method="post" enctype="multipart/form-data">
         
         <?php
         
         if(isset($_GET['action']) && $_GET['action'] == "update"){
         
               $_SESSION['ID'] = $_GET['Id'];
               $Id = $_SESSION['ID'];
               $select = mysqli_query($connect, "SELECT * FROM $product_table WHERE Id = '$Id'");
               
               while($newRow = mysqli_fetch_assoc($select)){
         
         ?>
                  <h3 class="text-xl font-bold text-slate-800 my-1 md:my-4"><span class="">Modifier</span> <span class="text-red-500">le produit</span> </h3>

                  <div class="flex flex-col space-y-2">
                     <input name="new_product_name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" value="<?php echo $newRow['Nom']?>" placeholder="Modifier le Nom produit">
                     <input name="new_product_price" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" value="<?php echo $newRow['Prix']?>" placeholder="Modifier le prix (DH)">
                     <input name="new_product_image" type="file" accept="image/png, image/jpeg, image/jpg" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                  </div>
                  <div class="flex flex-row space-x-2">
                  <button type="submit" name="update_product" class="bg-red-600 text-white p-2 w-32"><span class="">Modifier</span> <i class="fas fa-pencil-alt"></i></button>
                  <button type="submit" name="Annuler" class="bg-red-600 text-white p-2 w-32"><span class="">Annuler</span> <i class="fas fa-pencil-alt"></i></button>
                  </div>
         
         <?php }} 
         
       
         
mysqli_free_result($adapter);
mysqli_close($connect);
?>
         
            
      </form>

 
   </div>
</div>
</body>
</html>