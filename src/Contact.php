<?php
include("./config/config.php");

session_start();
unset($_SESSION['reservation_page']);


if(isset($_POST['Send'])){
  
  $Nom = mysqli_real_escape_string($connect, $_POST['NomPrenom']);
  $Email = mysqli_real_escape_string($connect, $_POST['Email']);
  $Tel = mysqli_real_escape_string($connect, $_POST['Tel']);
  $Message = mysqli_real_escape_string($connect, $_POST['Message']);

  if(empty($Nom)){
    echo "Voulez-vous remplirer la case de Nom !!";
  }elseif(empty($Email)){
    echo ("Voulez-vous remplirer la case d' Email !!");
  }elseif(empty($Tel)){
    echo ("Voulez-vous Entrer le Numero de Telephone !!");
  }elseif(empty($Message)){
    echo "Veuillez saisir un commentaire";
  }elseif(!filter_var($Email, FILTER_VALIDATE_EMAIL)){
    echo "Veuillez entrer un email valide";
  }else{
    $sqlInsert = "INSERT INTO messages(NomPrenom, Email, Tel, Messages) VALUES ('$Nom', '$Email', '$Tel', '$Message')";
    $adapter = mysqli_query($connect, $sqlInsert);

    if($adapter){
    
      header('Location: ../index.php');
   
    }else{
      echo "Error : " . mysqli_error($connect);
   
    }
  }
exit();
}




?>






<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="../css/contacts.css">
  <link href="../output.css" rel="stylesheet">

	<title>Document</title>
</head>
<body>


<?php
include("./header.php");
?>

<!-- Container for demo purpose -->
<div class="container mx-auto md:px-6 my-20 md:my-32 lg:my-40">
  <!-- Section: Design Block -->
  <section class="mb-32 text-center">
    <div class="py-12 md:px-12">
      <div class="container mx-auto xl:px-32">
        <div class="grid items-center lg:grid-cols-2">
          <div class="mb-12 md:mt-12 lg:mt-0 lg:mb-0">
            <div
              class="max-w-96 mx-auto md:max-w-none relative z-[1] block rounded-lg bg-[hsla(0,0%,100%,0.55)] px-6 py-12 shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)] backdrop-blur-[30px] dark:bg-[hsla(0,0%,5%,0.7)] dark:shadow-black/20 md:px-12 lg:-mr-14">
              <h2 class="mb-12 text-3xl text-slate-800 font-bold">Contact us</h2>
              <form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
                <div class="relative mb-6" data-te-input-wrapper-init>
                  <input
                    name="NomPrenom"
                    type="text"
                    class="peer block min-h-[auto] w-full rounded border-0 rounded-b-none border-slate-200 border-b-2 bg-transparent py-[0.32rem] px-3 leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:peer-focus:text-primary [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
                    id="exampleInput90"
                    placeholder="Name" />
                  <label
                    class="pointer-events-none absolute top-0 left-3 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-200 dark:peer-focus:text-primary"
                    for="exampleInput90"
                    >Name
                  </label>
                </div>
                <div class="relative mb-6" data-te-input-wrapper-init>
                  <input
                    name="Tel"
                    type="text"
                    class="peer block min-h-[auto] w-full rounded border-0 rounded-b-none border-slate-200 border-b-2 bg-transparent py-[0.32rem] px-3 leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:peer-focus:text-primary [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
                    id="exampleInput90"/>
                  <label
                    class="pointer-events-none absolute top-0 left-3 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-200 dark:peer-focus:text-primary"
                    for="exampleInput90"
                    >Tel
                  </label>
                </div>
                <div class="relative mb-6" data-te-input-wrapper-init>
                  <input
                    name="Email"
                    type="email"
                    class="peer block min-h-[auto] w-full rounded border-0 rounded-b-none border-slate-200 border-b-2 bg-transparent py-[0.32rem] px-3 leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:peer-focus:text-primary [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
                    id="exampleInput91"
                    placeholder="Email address" />
                  <label
                    class="pointer-events-none absolute top-0 left-3 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-200 dark:peer-focus:text-primary"
                    for="exampleInput91"
                    >Email address
                  </label>
                </div>
                <div class="relative mb-6" data-te-input-wrapper-init>
                  <textarea
                    name="Message"
                    type="text"
                    class="peer block min-h-[auto] w-full  border-0 rounded-b-none border-slate-200 border-b-2 bg-transparent py-[0.32rem] px-3 leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
                    id="exampleFormControlTextarea1"
                    rows="3"
                    placeholder="Your message"></textarea>
                  <label
                    for="exampleFormControlTextarea1"
                    class="pointer-events-none absolute top-0 left-3 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-200 dark:peer-focus:text-primary"
                    >Message</label
                  >
                </div>
                <div
                  class="mb-6 inline-block min-h-[1.5rem] justify-center pl-[1.5rem] md:flex">
                  <input
                    class=" bg-red-400 relative float-left mt-[0.15rem] mr-[6px] -ml-[1.5rem] h-[1.125rem] w-[1.125rem] appearance-none rounded-[0.25rem] border-[0.125rem] border-solid border-neutral-300 outline-none before:pointer-events-none before:absolute before:h-[0.875rem] before:w-[0.875rem] before:scale-0 before:rounded-full before:bg-transparent before:opacity-0 before:shadow-[0px_0px_0px_13px_transparent] before:content-[''] checked:border-primary checked:bg-primary checked:before:opacity-[0.16] checked:after:absolute checked:after:ml-[0.25rem] checked:after:-mt-px checked:after:block checked:after:h-[0.8125rem] checked:after:w-[0.375rem] checked:after:rotate-45 checked:after:border-[0.125rem] checked:after:border-t-0 checked:after:border-l-0 checked:after:border-solid checked:after:border-white checked:after:bg-transparent checked:after:content-[''] hover:cursor-pointer hover:before:opacity-[0.04] hover:before:shadow-[0px_0px_0px_13px_rgba(0,0,0,0.6)] focus:shadow-none focus:transition-[border-color_0.2s] focus:before:scale-100 focus:before:opacity-[0.12] focus:before:shadow-[0px_0px_0px_13px_rgba(0,0,0,0.6)] focus:before:transition-[box-shadow_0.2s,transform_0.2s] focus:after:absolute focus:after:z-[1] focus:after:block focus:after:h-[0.875rem] focus:after:w-[0.875rem] focus:after:rounded-[0.125rem] focus:after:content-[''] checked:focus:before:scale-100 checked:focus:before:shadow-[0px_0px_0px_13px_#3b71ca] checked:focus:before:transition-[box-shadow_0.2s,transform_0.2s] checked:focus:after:ml-[0.25rem] checked:focus:after:-mt-px checked:focus:after:h-[0.8125rem] checked:focus:after:w-[0.375rem] checked:focus:after:rotate-45 checked:focus:after:rounded-none checked:focus:after:border-[0.125rem] checked:focus:after:border-t-0 checked:focus:after:border-l-0 checked:focus:after:border-solid checked:focus:after:border-white checked:focus:after:bg-transparent dark:border-neutral-600 dark:checked:border-primary dark:checked:bg-primary dark:focus:before:shadow-[0px_0px_0px_13px_rgba(255,255,255,0.4)] dark:checked:focus:before:shadow-[0px_0px_0px_13px_#3b71ca]"
                    type="checkbox"
                    value=""
                    id="exampleCheck96"
                    checked />
                  <label
                    class="inline-block pl-[0.15rem] hover:cursor-pointer text-slate-900"
                    for="exampleCheck96">
                    Send me a copy of this message
                  </label>
                </div>
                <button
                  name="Send"
                  type="submit"
                  data-te-ripple-init
                  data-te-ripple-color="light"
                  class=" hover:bg-red-500 hover:font-bold inline-block w-full rounded bg-primary px-6 pt-2.5 pb-2 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] lg:mb-0">
                  Send
                </button>
              </form>
            </div>
          </div>
          <div class="md:mb-12 lg:mb-0">
            <div
              class="relative h-[700px] rounded-lg shadow-lg dark:shadow-black/20">
              <iframe
                src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d680.3787557892408!2d-6.155342631631888!3d35.18845224711214!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e1!3m2!1sfr!2sma!4v1703079150407!5m2!1sfr!2sma"
                class="h-full rounded-lg mx-auto max-h-96 md:max-h-none w-96 md:max-w-none"
                frameborder="0"
                allowfullscreen></iframe>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Section: Design Block -->
</div>
<!-- Container for demo purpose -->


<?php
include("./footer.php")
?>
	
</body>
</html>