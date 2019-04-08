
<?php
  session_start();
  var_dump($_SESSION['id_user']);
  require 'database.php';
  if (isset($_SESSION['id_user'])) {
    $records = $conn->prepare('SELECT id_user, name, email, password FROM users WHERE id_user = :id');
    $records->bindParam(':id', $_SESSION['id_user']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);
    $user = null;
    if (count($results) > 0) {
      $user = $results;
    }
  }
?>

<script type="text/javascript">
  function login() {
    location.href = ("login.php")
  }
</script>

<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>

  <body>
        <?php if(!empty($user)): ?>
          <br> Welcome. <?= $user['name']; ?>
          <br>You are Successfully Logged In
          <a href="logout.php">
            Logout
          </a>
        <?php else: ?>
          <body onload="login()"></body>
        <?php endif; ?>
<p>hola</p>
  </body>
</html>
