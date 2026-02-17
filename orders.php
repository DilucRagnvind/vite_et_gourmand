<?php
include('header.html');
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Vite Et Gourmand - Commander</title>
</head>
<body>


<main>

  <h2>Commander</h2>
  <form action="ordersPost.php" method="POST" enctype="multipart/form-data">
      
      <label for="name">Prenom :</label>
      <input type="text" name="name" required><br><br>
      
      <label for="surname">Nom de famille :</label>
      <input type="text" name="surname" required><br><br>

      <label for="email">Adresse email :</label>
      <input type="email" name="email" required><br><br>

      <label for="adress">Adresse de livraison :</label>
      <input type="text" name="adress" ><br><br>

      <label for="phone">Telephone :</label>
      <input type="text" name="phone" ><br><br>

      <label for="deliveryDate">Jour de livraison :</label>
      <input type="text" name="deliveryDate" required><br><br>
      
      <label for="deliveryTime">Heure de livraison :</label>
      <input type="text" name="deliveryTime" required><br><br>
      
      <input type="submit" value="Commande">
  </form>

</main>
    
</body>
</html>

<?php
include('footer.html');

?>