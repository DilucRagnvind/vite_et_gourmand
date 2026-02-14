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
<?php



$dsn = 'mysql:host=localhost;dbname=ecoride';
$username = 'user_gourmand';
$password = '$2y$12$p4hpWdhOec/2w626F1DDKOh8sZxCxssiExmxpkeEKLnaIInTbRQra';

try{
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //Récupérer les données du formulaire d’inscription 
    
    $emailForm = $_POST['email'];
    $passwordForm = $_POST['password'];
    $nameForm = $_POST['name'];
    $phoneForm = $_POST['phone'];
    $cityForm = $_POST['city'];
    $countryForm = $_POST['country'];
    $adressForm = $_POST['adress'];

    
    $query = "SELECT * FROM users WHERE email = :email";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':email', $emailForm);
    $stmt->execute();

    if($stmt->rowCount() > 0){
        die("Cette adresse email est déjà utilisée");
    }

    // Hashage(encryptage)
    $hashedPassword = password_hash($passwordForm, PASSWORD_DEFAULT);

    //Insérer les données dans la base 
    $insertQuery = "INSERT INTO users (email, password, name,  phone, city, country, adress)
     VALUES (:email, :password, :name, :phone, :city, :country :adress)";
    $stmt = $pdo->prepare($insertQuery);
    $stmt->bindParam(':email', $emailForm);
    $stmt->bindParam(':password', $hashedPassword);
    $stmt->bindParam(':name', $nameForm);

    $stmt->bindParam(':phone', $telephoneForm);
    $stmt->bindParam(':city', $pseudoForm);
    $stmt->bindParam(':country', $statusForm);
    $stmt->bindParam(':adress', $adressForm);
    $stmt->execute();

    echo "Inscription réussie";
    header('location: orders.php');

}
catch (PDOException $e){
    echo "Erreur lors de l’inscription : ". $e->getMessage();
}

?>

</main>
    
</html>
<?php
include('footer.html');
?>