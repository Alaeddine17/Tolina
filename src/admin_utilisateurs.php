<?php
session_start();
include("./config/config.php");
unset($_SESSION['name']);

if(isset($_GET['action']) && isset($_GET['ID'])){
    $sqlDelete = "DELETE FROM utilisateurs WHERE Id_client = " . $_GET['ID'] . "";
    $sqladapter = mysqli_query($connect, $sqlDelete);
    if($sqladapter){
        echo "<script>alert('l\'utilisateur est bien supprimer!');</script>";
        echo "<script>window.location = 'admin_page.php?action=utilisateurs'</script>";
    }else{
        echo "<center> Error : " . mysqli_error($connect) . "</center>";
    }

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/remixicon@3.6.0/fonts/remixicon.min.css">
    <link href="../output.css" rel="stylesheet">
    <title>Document</title>
</head>
<body>
<div class="p-4 sm:ml-12 md:ml-20 lg:ml-26">
    <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
          

<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <div class="flex items-center justify-between flex-column flex-wrap md:flex-row space-y-4 md:space-y-0 pb-4 bg-white dark:bg-gray-900">
  
        

        <form class="w-2/3 sm:w-1/2">   
            <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
            <div class="relative">
                <div class="absolute inset-y-0 left-0.5 flex items-center ps-3 pointer-events-none">
                <i class="fas fa-search text-gray-500 p-2"></i>
                </div>
                <input type="search" id="default-search" class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 px-7" placeholder="Search Mockups, Logos..." required>
                <button type="submit" class="text-white absolute right-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
            </div>
            

        </form>
       

        
    </div>
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                
                <th scope="col" class="ms-4 px-6 py-3">
                    Name
                </th>
                <th scope="col" class="px-6 py-3">
                    Position
                </th>
                <th scope="col" class="px-6 py-3">
                    Status
                </th>
                <th scope="col" class="px-6 py-3">
                    Action
                </th>
            </tr>
        </thead>
        <tbody>

        <?php 
        $sqlSelect = "SELECT * FROM utilisateurs";
        $query = mysqli_query($connect, $sqlSelect);

        while($row = mysqli_fetch_array($query)){

        ?>

            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
               
                <th scope="row" class="flex items-center sm:px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                    <img class="h-10 rounded-full" src="../assets/images/admin.jpg" alt="Jese image">
                    <div class="ps-3 mx-1 md:mx-10">
                        <div class="font-semibold px-2"><?php echo $row['utilisateur'];?></div>
                        <div class="font-normal text-gray-500 hidden sm:block"><?php echo $row['email'];?></div>
                    </div>  
                </th>
                <td class="px-4 py-4 mx-auto text-right md:text-left">
                <?php echo $row['Autorisation'];?>
                </td>
                <td class="px-1 py-4">
                    <div class="flex items-center">
                        <div class="h-2.5 w-2.5 rounded-full bg-green-500 mr-1"></div> Online
                    </div>
                </td>
                <td class="px-1 py-4 md:space-y-1">
                    <?php if($_SESSION['user'][2] == 'admin'){ ?> 
                        <a href="./admin_page.php?action=admin_update_utilisateurs&ID=<?php echo $row['Id_client']?>" class="block font-medium text-blue-600 dark:text-blue-500"> <i class="fas fa-edit"></i>Edit</a>
                        <a href="./admin_page.php?action=utilisateurs&ID=<?php echo $row['Id_client']?>" class="block font-medium text-red-600 dark:text-blue-500"> <i class="fas fa-trash"></i>Delete</a>
                        
                    <?php }else{?>
                        <span class="font-medium text-gray-500 cursor-not-allowed"> <i class="fas fa-edit"></i> Pas d'action</span>
                    <?php } ?>
                </td>
            </tr>
        <?php } 
        // Free the result set
        mysqli_free_result($query);
        // Close the database connection
        mysqli_close($connect);
        ?>            
            
        </tbody>
    </table>
</div>

</div>
</div>
</body>
</html>
