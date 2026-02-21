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
    
<?php

$dsn = 'mysql:host=localhost;dbname=vite_et_gourmand';
$username = 'user_gourmand';
$password = '';
 try{
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $menus=[];
    $id=1;
    $diet = $_POST['diet'];


    $query = "SELECT * FROM menus where diet = :diet" ;

    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':diet', $diet);
    $stmt->execute();

    if($stmt->rowCount() != 0){
            $menus = $stmt->fetch(PDO::FETCH_ASSOC);
        foreach($menus as $menu){
            echo($menu);
        }
    }
    else{
        echo "Connectez vous pour commander!"; 

    } 
}
catch (PDOException $e){
    echo "Erreur de connexion à la base de données : ". $e->getMessage();
}

?>

</body>
</html>
<?php
include('footer.html');
?>