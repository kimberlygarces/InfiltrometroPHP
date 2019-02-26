<?php
  session_start();
  require 'dataBase.php';
  if (isset($_SESSION['user_id'])) {
    $records = $conn->prepare('SELECT id, email, password FROM users WHERE id = :id');
    $records->bindParam(':id', $_SESSION['user_id']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);
    $user = null;
    if (count($results) > 0) {
      $user = $results;
    }
  }
?>


 <?php require 'navar.php' ?>
 <body  background="img/campo.jpg">

  <br>



    <div class="container" id="Defi">
  <div class="row">
    <br>
    <div class="col">

      
   <h1 class="text-center"> Infiltrometro</h1>
      <br>
     
      <p class="text-justify">Nuestro Infiltrómetro está fabricado en una caja de pasta de filamento, con un soporte metálico en la parte inferior que permite un ajuste preciso y con una batería en la parte externa para la adecuada manipulación de la misma, permitiendo cargarla y retirarla en caso de ser necesaria.</p>

      <p class="text-justify"> En la parte inferior se en encuentra un sensor ultrasonido, encargado de tomar una medida inicial de la distancia del sensor al suelo y al momento de iniciar el proceso infiltración.</p>

     <p class="text-justify"> La captura de datos se toma cada 10 segundos, para optimizar la presión del proceso. Los datos quedan almacenados en una SD extraeíble, los cuales pueden ser manipulados por el usuario en una PC o Laptop, para su respectiva manipulación.</p>

    </div>
    <div class="col">

  <br>
   <img src="img/dispo1.jpg" class="img-circle" alt="Cinque Terre" width="304" height="236">  


    </div>
  </div>

<br>
<hr>


  <div class="container2">
  <div class="row">
    <div class="col-sm">

        <img src="img/Logo.png" class="img-thumbnail" alt="Cinque Terre" width="204" height="136"> 
      
    </div>
    <br>
    <div class="col-sm">

   
    </div>
    <div class="col-sm">

      <a  align="center">Kimberly Garcés</a>
      <br>
      <a  align="center">Laura de la Ossa<a>  
      <br>         
      <a  align="center">Gabriel Espitia</a>
      <br>
      <a   align="center">Natanael Berona</a>
      <br>
      <a   align="center">Edward Martinez</a>
      <br>
      <br>
    </div>
  </div>
</div>




