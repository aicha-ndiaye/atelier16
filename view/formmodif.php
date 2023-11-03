<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="modisupp.php" method="POST">
        <h1>modifier vos contacts ici!!!</h1>
        <label for="nom">nom</label>
        <input type="hidden" name="modifier" value="<?= $tab[0]['id_nom'] ?>">
        <input type="text" name="nom" value="<?= $tab[0]['nom'] ?>" required><br>
        <label for="prenom">prenom</label>
        <input type="text" name="prenom" value="<?= $tab[0]['prenom'] ?>" required><br>
        <label for="numero">numero</label>
        <input type="number" name="numero" value="<?= $tab[0]['numero'] ?>" required><br>
        <br><select name="favori" id="favori">
            <option value="oui">oui</option>
            <option value="non">non</option>
</select><br>
        <button type="submit" name="modifier_valeur">modifier</button>
        
        </form>
</body>
</html>