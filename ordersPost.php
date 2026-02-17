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



$dsn = 'mysql:host=localhost;dbname=vite_et_gourmand';
$username = 'user_gourmand';
$password = '$2y$12$p4hpWdhOec/2w626F1DDKOh8sZxCxssiExmxpkeEKLnaIInTbRQra';

try{
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //Récupérer les données du formulaire d’inscription 
    $nameForm = $_POST['name'];
    $surnameForm = $_POST['surname'];
    $emailForm = $_POST['email'];
    $adressForm = $_POST['adress'];
    $phoneForm = $_POST['phone'];
    $deliveryDateForm = $_POST['deliveryDate'];
    $deliveryTimeForm = $_POST['deliveryTime'];
    

    
    $query = "SELECT * FROM users WHERE email = :email";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':email', $emailForm);
    $stmt->execute();

    if($stmt->rowCount() > 0){
        die("Cette adresse email est déjà utilisée");
    }


    //Insérer les données dans la base 
    $insertQuery = "INSERT INTO orders (user_name, user_surname, user_email, adress, user_phone, delivery_date, delivery_time )
     VALUES (:user_name, :user_surname, :user_email, :adress, :user_phone, :delivery_date, :delivery_time)";
    $stmt = $pdo->prepare($insertQuery);

    $stmt->bindParam(':user_name', $nameForm);
    $stmt->bindParam(':user_surname', $surnameForm);
    $stmt->bindParam(':user_email', $emailForm);
    $stmt->bindParam(':adress', $adressForm);
    $stmt->bindParam(':user_phone', $phoneForm);
    $stmt->bindParam(':delivery_date', $deliveryDateForm);
    $stmt->bindParam(':delivery_time', $deliveryTimeForm);
    $stmt->execute();

    echo "Commande envoyée";
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