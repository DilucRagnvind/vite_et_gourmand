<?php
include('header.html');
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Vite Et Gourmand - Connexion</title>
</head>
<body>
</body>
</html>
      
<?php


$dsn = 'mysql:host=localhost;dbname=vite_et_gourmand';
$username = 'user_gourmand';
$password = '$2y$12$p4hpWdhOec/2w626F1DDKOh8sZxCxssiExmxpkeEKLnaIInTbRQra';

session_start();
try{
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //Récupérer les données du formulaire de connexion
    $emailForm = $_POST['email'];
    $passwordForm = $_POST['password'];

    //Récupérer les utilisateurs 
    $query = "SELECT * FROM users WHERE email = :email";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':email', $emailForm);
    $stmt->execute();

    //Est-ce que l’utilisateur (mail) existe ?
    if($stmt->rowCount() == 1){
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        if(password_verify($passwordForm, $user['password'])){
            echo "Connexion réussie ! Bienvenue " . $user['name'] . "  " . $user['surname']. "<br><br>";
           $_SESSION["email"] = $user['email'];
           $_SESSION["userid"] = $user['userId'];
           echo $_SESSION["email"] . "<br><br>";
           echo $_SESSION["userid"] . "<br><br>";


    }else{
            echo "Mot de passe incorrect";
        }
    }
    else{
        echo "Utilisateur introuvable, êtes-vous sûr de votre mail ?";
    }
}
catch (PDOException $e){
    echo "Erreur de connexion à la base de données : ". $e->getMessage();
}
if (isset($_SESSION['email'])){
    try{
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $query = "SELECT * FROM users WHERE email = :email";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':email', $_SESSION['email']);
    $stmt->execute();

    if($stmt->rowCount() == 1){
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        header('location: passangerSpace.php');
    }
    else{echo "Connectez vous pour commander!"; 
    } 
    }
catch (PDOException $e){
    echo "Erreur de connexion à la base de données : ". $e->getMessage();
}
   
}
else{echo "Connectez vous pour commander!"; 
    }



include('footer.html');
?>