<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class ="form">
    <form action="../controller/modisupp.php" method="post">
        <h1>ajouter vos contacts ici!!!</h1>
<label for="nom">nom</label>
<input type="text"name="nom"placeholder ="veuillez saisir votre nom ici" require><br>
<label for="prenom">prenom</label>
<input type="text" name="prenom" placeholder="veuilleir saisir votre prenom ici" require><br>
<label for="numero">numero</label>
<input type="number" name="numero" placeholder="veuillez saisir votre numero ici" require><br>
<div class="select">
<label for="favori">favori</label>
<select name="favori" id="favori">
    <option value="oui">oui</option>
    <option value="non">non</option>
</select>
</div>
<input type="submit" name="ajouter" value="ajouter">

    </form> 
    </div>
</body>
</html>