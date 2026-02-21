<?php
include('header.html');

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Vite Et Gourmand - Menus</title>
</head>
<body>
    <h1>VITE ET GOURMAND</h1>
    
<form action="menusPost.php" method="POST">
    <div class=formDiv1>
        <label for="theme">Thème : </label>
        <input type="text" name="theme"  /> <br><br>

        <label for="maxPrice">Prix maximum : </label>
        <input type="integer" name="maxPrice"  /> <br><br>

        <label for="minPrice">Prix minimum : </label>
        <input type="number" name="minPrice" /> <br><br>

        <label for="diet">Régime alimentaire : </label>
        <select name="diet" id="diet">
            <option value="vegetarien">Veretarien</option>
            <option value="Vegan">Vegan</option>
            <option value="Classic">Clasique</option>
        </select><br><br>

        <label for="minQtity">Nombre de personnes minimum :</label>
        <input type="number" name="minQtity"/> <br><br>
    </div>
<br><br>
    <button class="button" type="submit">Valider</button><br><br>
</form>





</body>
</html>
<?php
include('footer.html');
?>