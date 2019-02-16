
<?php
  session_start();
  if (isset($_SESSION['user_id'])) {
  
  }
  require 'dataBase.php';

  if (!empty($_POST['email']) && !empty($_POST['password'])) {
    $records = $conn->prepare('SELECT id, email, password FROM users WHERE email = :email');
    $records->bindParam(':email', $_POST['email']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);
    $message = '';

    if (count($results) > 0 && password_verify($_POST['password'], $results['password'])) {
      $_SESSION['user_id'] = $results['id'];
     header("Location: http://localhost/proyectos/php/infiltrometro/tabla.php"); 
    } else {
      $message = 'No registrado';
    }
  }
?>

<?php require 'nav.php' ?>


    <?php if(!empty($message)): ?>
      

      <script language="javascript">alert('Usuario no existe' );</script>

    <?php endif; ?>

    <form class="form-signin" action="login.php" method="POST">
      <input class="form-control" name="email" type="text" placeholder="Usuario">
      <br>
      <input class="form-control" name="password" type="password" placeholder="Contraseña">
      <input type="submit" class="btn btn-lg btn-primary btn-block" value="Iniciar">
      <br>

        <button type="button" class="form-control" class="btn btn-light btn-block" onclick="location='RegistroUser.php'">Nuevo usuario</button>

    </form>
 
  <?php require 'footer.php' ?>