<?php
include("./config/config.php");
$Etat = "valide";

if(isset($_GET['section']) && $_GET['section'] == 'commande'){
    $ID = $_GET['IDcommande'];

    $sqlupdatecommande = "UPDATE commande SET Etat = '" . $Etat . "' WHERE ID = '" . $ID . "'";
    $sqlupdateAdapter = mysqli_query($connect, $sqlupdatecommande);
    $sqlId_client = "SELECT utilisateurs.Id_client FROM commande JOIN utilisateurs ON commande.Id_client = utilisateurs.Id_client where ID = " . $ID . "";
    $Id_clientAdapter = mysqli_query($connect, $sqlId_client);
    $Id_client = mysqli_fetch_array($Id_clientAdapter);
    mysqli_free_result($Id_clientAdapter);
if($sqlupdateAdapter){
    echo "<script>alert('la commande a ete valider')</script>";
    echo "<script>window.location = './admin_page.php?action=shop&ID=$Id_client[0]'</script>";
}else{
    echo "Error : " . mysqli_error($connect);
}
}elseif(isset($_GET['section']) && $_GET['section'] == 'reservation'){
    $ID = $_GET['IDreservation'];
    
    $sqlupdatereservation = "UPDATE reservation SET Etat = '" . $Etat . "' WHERE ID = '" . $ID . "'";
    $sqlreservationAdapter = mysqli_query($connect, $sqlupdatereservation);
    $sqlId_clientR = "SELECT utilisateurs.Id_client FROM reservation JOIN utilisateurs ON reservation.Id_client = utilisateurs.Id_client where ID = " . $ID . "";
    $Id_clientAdapterR = mysqli_query($connect, $sqlId_clientR);
    $Id_clientR = mysqli_fetch_array($Id_clientAdapterR);
    mysqli_free_result($Id_clientAdapterR);
if($sqlreservationAdapter){
    echo "<script>alert('la commande a ete valider')</script>";
    echo "<script>window.location = './admin_page.php?action=reservation&ID=$Id_clientR[0]'</script>";
}else{
    echo "Error : " . mysqli_error($connect);
}

}
mysqli_close($connect);

?>