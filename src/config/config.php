
<?php
$connect = mysqli_connect("localhost", "root", "Alaeeala2523", "restaurantDB");
if(!$connect){
    echo 'Error' . mysqli_connect_error($connect); 
}
?>