<?php
// Include the necessary controllers or models
require_once '../../controllers/ClientController.php';

// Create an instance of the ClientController
$clientController = new ClientController();

// Initialize variables
$clients = [];
$searchQuery = "";

// Check if a search term is provided
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['search'])) {
    $searchQuery = trim($_GET['search']);
    $clients = $clientController->searchClientsByName($searchQuery); // Fetch clients filtered by name
} else {
    $clients = $clientController->listClients(); // Fetch all clients
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Liste des Clients</title>
    <link rel="stylesheet" href="../../public/styles/index.css">
</head>
<body class="df-c">
    <div class="df">
        <h1>Liste des Clients</h1>
        <a href="add.php">add a client</a>
    </div>
    
    <!-- Search Form -->
    <form method="GET" class="df" action="">
        <input type="text" name="search" value="<?= htmlspecialchars($searchQuery) ?>" placeholder="Search by name">
        <button type="submit">Search</button>
        <a href="list.php">Clear</a> <!-- Clear search -->
    </form>


    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Âge</th>
                <th>Région</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($clients)): ?>
                <?php foreach ($clients as $client): ?>
                    <tr>
                        <td><?= $client['ID_client'] ?></td>
                        <td><?= $client['nom'] ?></td>
                        <td><?= $client['prenom'] ?></td>
                        <td><?= $client['age'] ?></td>
                        <td><?= $client['region'] ?></td>
                        <td>
                            <a href="edit.php?action=editClient&id=<?= $client['ID_client'] ?>">Modifier</a>
                            <a href="delete.php?action=deleteClient&id=<?= $client['ID_client'] ?>">Supprimer</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="6">No clients found.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</body>
</html>
