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

<?php
  require 'dataBase.php';

  $message = '';

  if (!empty($_POST['metodo']) && !empty($_POST['localizacion']) && !empty($_POST['suelo']) && !empty($_POST['obs'])) {
    $sql = "INSERT INTO registro (metodo, localizacion, suelo, obs) VALUES (:metodo, :localizacion, :suelo, :obs)";

    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':metodo', $_POST['metodo']);
     $stmt->bindParam(':localizacion', $_POST['localizacion']);
       $stmt->bindParam(':suelo', $_POST['suelo']);
         $stmt->bindParam(':obs', $_POST['obs']);


    if ($stmt->execute()) {
      $message = 'Proceso registrado';
    } else {
      $message = 'Error al momento  de registrar';
    }
  }
?>

<?php require 'navar.php' ?>


    <?php if(!empty($message)): ?>
      <p> <?= $message ?></p>
    <?php endif; ?>

<div class="container">
  <br>
  <H1 align="center"> Prueba de infiltración </H1>


  <form class="form-signin" action="tabla.php" method="POST">

    <div class="form-group row">
     <?php if(!empty($user)): ?>
      <br>  <img align="all" src="img/usuario.png" width="60" height="60"/> <h6> <?= $user['email']; ?></h6>

    </div>

    <div class="form-group row">
      <div class="col-sm-6">
        <input type="text" class="form-control" name="metodo" placeholder="Metodo">
      </div>

      <div class="col-sm-6">
        <input type="text" class="form-control" name="localizacion" placeholder="Localización">
          </div>
        </div>

        <div class=class="col-sm-12">
          <label for="ControlTipoSuelo">Tipo de suelo</label>
          <select class="form-control" name="suelo">
            <option>1</option>
            <option>2</option>
            <option>3</option>
            <option>4</option>
            <option>5</option>
          </select>
        </div>
        
        <div class="form-group">
          <label for="exampleFormControlTextarea1">Observaciones</label>
          <textarea class="form-control" name="obs" rows="3"></textarea>
        </div>

        <input type="submit" class="btn btn-lg btn-primary btn-block" value="Registrar proceso">
      </form>


      </div>
    <?php else: ?>
      <h6>Usuario no registrado</h6>

      <a href="login.php">Salir</a> 
    <?php endif; ?>




 <?php require 'footer.php' ?>