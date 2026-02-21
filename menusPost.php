<?php

$dsn = 'mysql:host=localhost;dbname=vite_et_gourmand';
$username = 'user_gourmand';
$password = '';
 try{
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $menus=[];
    $id=1;

    $query = "SELECT * FROM menus" ;

    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':id', $id);
    $stmt->execute();

    if($stmt->rowCount() != 0){
            $menus = $stmt->fetch(PDO::FETCH_ASSOC);
        foreach($menus as $menu){
        echo $menu;
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