<?php
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Client</title>
    <link rel="stylesheet" href="../../public/styles/index.css">
</head>

<body>
    <h1>Add Client</h1>
    <form action="add.php?action=addClient" method="POST">
        <div class="df">

            <label for="nom">Nom:</label>
            <input type="text" id="nom" name="nom" required>
        </div>
        <div class="df">

            <label for="prenom">Prénom:</label>
            <input type="text" id="prenom" name="prenom" required>
        </div>

        <div class="df">
            <label for="age">Âge:</label>
            <input type="number" id="age" name="age" required>

        </div>
        <div class="df">

        </div>
        <label for="ID_region">Région:</label>
        <select id="ID_region" name="ID_region" required>



    </select>

    <button type="submit">Ajouter</button>
</form>


    <br>
    <a href="list.php">Back to List</a>
</body>
</html>
