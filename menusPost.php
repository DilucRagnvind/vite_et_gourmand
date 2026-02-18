<?php

$dsn = 'mysql:host=localhost;dbname=vite_et_gourmand';
$username = 'user_gourmand';
$password = '';
$menus=[];
 try{
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
foreach($menus as $menu){
    $id=1;
    $query = "SELECT * FROM menus where id = :id " ;

    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':id', $id);
    $stmt->execute();

    if($stmt->rowCount() == 1){
        $menus = $stmt->fetch(PDO::FETCH_ASSOC);
        echo $query;
        $id++;
    }

    else{echo "Connectez vous pour commander!"; 
}

    } 
}
catch (PDOException $e){
    echo "Erreur de connexion à la base de données : ". $e->getMessage();
}

?>