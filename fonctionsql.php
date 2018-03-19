<!DOCTYPE html>
<html>
<head>
	<title>Fonction SQL dans le dossier git</title>
</head>
<body>
	<?php
// Upper (champ) permet de mettre en majuscule le contenu du champ
/*AS permet de renommer le champ : c'est cet alias que l'on va récupérer
dans notre tableau PHP*/

$resultat = $bdd->query('SELECT UPPER(Nom) AS nomMaj FROM users');

$users = $resultat->fetchAll(PDO::FETCH ASSOC);
foreach ($users as $user) {
	echo $user['nomMaj'] . '<br>';
}

// LOWER tout en minuscule
 

//LENGTH (monchamp) va compter le nombre de caractère contenus dans le champ monchamp

$resultat = $bdd->query('SELECT LENGTH(Nom) AS nombreCar FROM users');
$users = $resultat->fetchAll(PDO::FETCH ASSOC);

foreach ($users as $user) {
	echo $user['nombreCar'] . '<br>';
}


//COUNT() va compter le nombre d'entrées contenues dans la table
//COUNT ne renvoie qu'une seule ligne. Pas besoin de fetchAll

$resultat = $bdd->query('SELECT COUNT(id) AS nombreEntrees FROM articles');
$nd = $resultat->fetch(PDO::FETCH ASSOC);
echo $nd['nombreEntrees'] . '<br>';


//TRIM() supprime les caractères invisibles en début et fin de chaine : espace, tab et retour à la ligne


//MAX() renvoie l'entrée qui a la plus grande valeur (pour un nombre) et par ordre alphabetique inverse pour une chaine de caractère

$resultat = $bdd->query('SELECT MAX(Nom) AS nom FROM users');
$user = $resultat->fetchAll(PDO::FETCH ASSOC);
echo $user['nom'] . '<br>';


// MIN() recupère le champs qui a la plus petite valeur

//SUM()
$resultat = $bdd->query('SELECT SUM(id) AS somme FROM users');
$user = $resultat->fetchAll(PDO::FETCH ASSOC);
echo $user['somme'] . '<br>';


// Fonction SQL sur les dates 

// Récupérer l'année, le mois, le jour ... à partir d'un champ de type date ou datetime
// YEAR(), MONTH(), DAY(), HOURS(), MINUTE(), et SECOND()

$resultat = $bdd->query('SELECT YEAR(date_publi) AS annee title FROM articles');
$articles = $resultat->fetchAll(PDO::FETCH ASSOC);
print_r($articles);

// Ajouter ou soustraire du temps
// DATE_ADD() et DATE_SUB()

// Ici on ajoute 6 mois
$resultat = $bdd->query('SELECT DATE_ADD(date_publi, INTERVAL 6 MONTH) AS dateModifie, title FROM articles'); 
$articles = $resultat->fetchAll(PDO::FETCH ASSOC);
print_r($articles);


?>

</body>
</html>