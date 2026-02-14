<?php
include('header.html');
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Vite Et Gourmand - Inscription</title>
</head>
<body>


<main>

  <h2>Inscription</h2>
  <form action="registerPost.php" method="POST" enctype="multipart/form-data">
      
      <label for="email">Adresse email :</label>
      <input type="email" name="email" required><br><br>

      <label for="password">Mot de passe :</label>
      <input type="password" name="password" required><br><br>
      
      <label for="name">Prenom :</label>
      <input type="text" name="name" required><br><br>

      <label for="tphone">Telephone :</label>
      <input type="text" name="phone" ><br><br>

      <label for="city">Ville :</label>
      <input type="text" name="city" ><br><br>

      <label for="country">Pays :</label>
      <input type="text" name="country" ><br><br>

      <label for="adress">Adresse :</label>
      <input type="text" name="adress" ><br><br>

      <input type="submit" value="S’inscrire">
  </form>

</main>
    
</body>
</html>

<?php
include('footer.html');

?>