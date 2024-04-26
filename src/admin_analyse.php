<?php
include("./config/config.php");

$sqlcommande = "SELECT SUM(PrixTotal) from commande";
$adpcommande = mysqli_query($connect, $sqlcommande);
$resultC = mysqli_fetch_array($adpcommande);
mysqli_free_result($adpcommande);

$sqlcountcommande = "SELECT count(*) from commande";
$adpcountcommande = mysqli_query($connect, $sqlcountcommande);
$resultCC = mysqli_fetch_array($adpcountcommande);
mysqli_free_result($adpcountcommande);

$sqlutilisateur = "SELECT count(*) FROM utilisateurs WHERE Autorisation = 'client'";
$adapter = mysqli_query($connect, $sqlutilisateur);
$resaultU = mysqli_fetch_array($adapter);
mysqli_free_result($adapter);

$sqlreservation = "SELECT count(*) FROM reservation";
$adpreservation = mysqli_query($connect, $sqlreservation);
$resultR = mysqli_fetch_array($adpreservation);
mysqli_free_result($adpreservation);

$sqlAnalyseCommande = "SELECT MONTHNAME(created_at) as date_commande, SUM(PrixTotal) as commande FROM commande GROUP BY date_commande";
$AnAdptCom = mysqli_query($connect, $sqlAnalyseCommande);
foreach($AnAdptCom as $data){
    $mois[] = $data['date_commande'];
    $commande[] = $data['commande'];
}
mysqli_free_result($AnAdptCom);

$sqlAnalyseCategory = "SELECT Repas, SUM(PrixTotal) as commande FROM commande GROUP BY Repas";
$AnAdapterCat = mysqli_query($connect, $sqlAnalyseCategory);
foreach($AnAdapterCat as $data){
    $Repas[] = $data['Repas'];
    $CommandeRepas[] = $data['commande'];
}
mysqli_free_result($AnAdapterCat);

$sqlAnalysereserv = "SELECT DAYNAME(Jour) as Jour, COUNT(DAYNAME(Jour)) as TotalJour FROM reservation GROUP BY DAYNAME(Jour)";
$AnAdapterReserv = mysqli_query($connect, $sqlAnalysereserv);
foreach($AnAdapterReserv as $data){
    $Jour[] = $data['Jour'];
    $TotalJour[] = $data['TotalJour'];
}
mysqli_free_result($AnAdapterReserv);

// Close the connection
mysqli_close($connect);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" integrity="sha512-Avb2QiuDEEvB4bZJYdft2mNjVShBftLdPG8FJ0V7irTLQ8Uo0qcPxh4Plq7G5tGm0rU+1SPhVotteLpBERwTkw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="../output.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <title>Analyse</title>
</head>
<body>


<div class="p-4 sm:ml-12 md:ml-20 lg:ml-26">
    <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
      
<div class="flex items-center p-4 mb-4 text-sm text-blue-800 border border-blue-300 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400 dark:border-blue-800" role="alert">
  <svg class="flex-shrink-0 inline w-4 h-4 mr-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
  </svg>
  <span class="sr-only">Info</span>
  <div>
    <span class="font-medium"><u>Info alert!</u></span> Change a few things up and try submitting again.
  </div>
</div>
    
    <div class="flex flex-wrap justify-center gap-2 lg:flex-row lg:justify-around rounded">
        
        <div class="w-44 lg:w-52 border-2 rounded-md border-gray-200 p-4 h-20 bg-white flex flex-row items-center justify-around">
            <i class="fa-solid fa-money-bills text-red-400 text-4xl"></i>
            <div class="flex flex-col">
                <span class="text-gray-800 font-semibold"><?php echo number_format($resultC[0],2)?> DH</span>
                <span class="text-gray-400">Revenu</span>
            </div>
        </div>

        <div class="w-44 lg:w-52 border-2 rounded-md border-gray-200 p-4 h-20 bg-white flex flex-row items-center justify-around">
        <i class="fas fa-bullhorn text-red-400 text-4xl "></i>
            <div class="flex flex-col">
                <span class="text-gray-800 font-semibold"><?php echo $resultCC[0]?></span>
                <span class="text-gray-400">Ventes</span>
            </div>
        </div>
        
        <div class="w-44 lg:w-52 border-2 rounded-md border-gray-200 p-4 h-20 bg-white flex flex-row items-center justify-around">
            <i class="fa-solid fa-person-circle-plus text-red-400 text-4xl "></i>
            <div class="flex flex-col">
                <span class="text-gray-800 font-semibold"><?php echo $resaultU[0] ?></span>
                <span class="text-gray-400">Clients</span>
            </div>
        </div>
        
        <div class="w-44 lg:w-52 border-2 rounded-md border-gray-200 p-4 h-20 bg-white flex flex-row items-center justify-around">
        <i class="fa-solid fa-ticket text-red-400 text-4xl"></i>
            <div class="flex flex-col">
                <span class="text-gray-800 font-semibold"><?php echo $resultR[0]?></span>
                <span class="text-gray-400">Reservation</span>
            </div>
        </div> 

    </div>

    
    
      <div class="flex flex-col md:flex-row space-y-4 md:space-y-0 md:gap-4 my-5 items-center justify-center">
            <div class="w-4/5 md:w-1/3 border border-gray-300 rounded">
                <h1 class="text-center border-b border-gray-300 mb-4 p-2 text-sm md:text-md text-gray-800 bg-gray-50 font-semibold">diagramme d'analyse des commandes mensuelles</h1>
                <canvas id="myChartCercle"></canvas>
            </div>
              
            <div class="w-4/5 md:w-2/3 border border-gray-300 rounded">
              <h1 class="text-center border-b border-gray-300 mb-4 p-2 text-sm md:text-md text-gray-800 bg-gray-50 font-semibold">
              Aperçu mensuel des revenu grouper / mois</h1>
                <canvas id="myChartLine"></canvas>
            </div>
      </div>
    

      <div class="flex flex-col md:flex-row-reverse space-y-4 md:space-y-0 md:gap-4 my-5 items-center justify-center">
            <div class="w-4/5 md:w-3/5 border border-gray-300 rounded">
              <h1 class="text-center border-b border-gray-300 mb-4 p-2 text-sm md:text-md text-gray-800 bg-gray-50 font-semibold">
              diagramme d'analyse des produits les plus vendues
              </h1>
              <canvas id="myChartCategorie"></canvas>
            </div>

            <div class="w-4/5 md:w-3/5 border border-gray-300 rounded">
              <h1 class="text-center border-b border-gray-300 mb-4 p-2 text-sm md:text-md text-gray-800 bg-gray-50 font-semibold">
              diagramme d'analyse des réservations
              </h1>
              <canvas id="myChartReserv"></canvas>
            </div>
      </div>
   

  </div>




<script>

const dataC = {
  labels: <?php echo json_encode($mois)?>,
  datasets: [{
    label: 'commande mensuel',
    data: <?php echo json_encode($commande)?>,
    backgroundColor: [
      'rgb(255, 50, 032)',
      'rgb(54, 162, 235)',
      'rgb(155, 205, 86)',
      'rgb(005, 105, 86)',
      'rgb(108, 005, 86)',
      'rgb(055, 205, 86)',
    ],
    hoverOffset: 4
  }]
};

const configC = {
  type: 'doughnut',
  data: dataC,
};

var myChartC = new Chart(
    document.getElementById('myChartCercle'),
    configC
  );


const labels = <?php echo json_encode($mois)?>;
const data = {
  labels: labels,
  datasets: [{
    label: 'Repérage de vente par mois',
    data: <?php echo json_encode($commande)?>,
    fill: false,
    borderColor: 'rgb(75, 192, 192)',
    tension: 0.1
  }]
};

const configL = {
  type: 'line',
  data: data,
};

var myChartL = new Chart(
    document.getElementById('myChartLine'),
    configL
  );


const labelsCP = <?php echo json_encode($Repas) ?>;
const dataCP = {
  labels: labelsCP,
  datasets: [{
    label: 'Produits',
    data: <?php echo json_encode($CommandeRepas) ?>,
    backgroundColor: [
      'rgba(38, 180, 255, 1)',
    ],
    borderColor: [
      'rgb(255, 99, 132)',
      'rgb(255, 159, 64)',
      'rgb(255, 205, 86)',
      'rgb(75, 192, 192)',
      'rgb(54, 162, 235)',
      'rgb(153, 102, 255)',
      'rgb(201, 203, 207)'
    ],
    borderWidth: 1
  }]
};

const configCP = {
  type: 'bar',
  data: dataCP,
  options: {
    scales: {
      y: {
        beginAtZero: true
      }
    }
  },
};

var myChartCP = new Chart(
    document.getElementById('myChartCategorie'),
    configCP
  );


  const dataReserv = {
  labels: <?php echo json_encode($Jour)?>,
  datasets: [{
    label: 'Les jours les plus demandés',
    data: <?php echo json_encode($TotalJour)?>,
    backgroundColor: [
      'rgb(255, 99, 132)'
    ]
  }]
};

const configReserv = {
  type: 'bar',
  data: dataReserv,
  options: {}
};

var myChartReserv = new Chart(
    document.getElementById('myChartReserv'),
    configReserv
  );

</script>
</body>
</html>