<?php
  require 'dataBase.php';

  $message = '';

  if (!empty($_POST['email']) && !empty($_POST['password'])) {
    $sql = "INSERT INTO users (email, password) VALUES (:email, :password)";

    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':email', $_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    $stmt->bindParam(':password', $password);


    if ($stmt->execute()) {
      $message = 'Usuario Creado';
    } else {
      $message = 'Error al crear usuario';
    }
  }
?>

<?php require 'nav.php' ?>


    <?php if(!empty($message)): ?>
      <p> <?= $message ?></p>
    <?php endif; ?>


    <form class="form-signin" action="RegistroUser.php" method="POST">
      <input name="email" class="form-control" type="text" placeholder="Usuario">
      <br>
      <input name="password" class="form-control" type="password" placeholder="Contraseña">

      <input name="confirm_password" class="form-control" type="password" placeholder="Confirmar Contraseña">
      <input type="submit" class="btn btn-lg btn-primary btn-block" value="Registrar Usuario">
<br>

  <button type="button" class="form-control" class="btn btn-light btn-block" onclick="location='login.php'">Iniciar sesion</button>

    </form>


      
       


 <?php require 'footer.php' ?>