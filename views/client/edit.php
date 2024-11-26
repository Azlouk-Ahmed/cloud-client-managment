<?php
require_once '../../controllers/RegionController.php';
require_once '../../controllers/ClientController.php';

$regionController = new RegionController();
$regions = $regionController->listRegions();

$clientController = new ClientController();

// Fetch the client by ID from the GET request
$clientId = $_GET['id'] ?? null;
$client = null;

if ($clientId) {
    $client = $clientController->getClient($clientId);
}

// Handle form submission for updating client details
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Extract data from POST request
    $ID_client = $_POST['id'];
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $age = $_POST['age'];
    $ID_region = $_POST['region_id'];

    // Call updateClient with the extracted data
    $isUpdated = $clientController->updateClient($ID_client, $nom, $prenom, $age, $ID_region);

    if ($isUpdated) {
        header('Location: list.php'); // Redirect to the client list
        exit();
    } else {
        $error = "Error updating client.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Client</title>
    <link rel="stylesheet" href="../../public/styles/index.css">
</head>
<body>
    <h1>Edit Client</h1>
    
    <?php if (isset($error)): ?>
        <p style="color: red;"><?= $error; ?></p>
    <?php endif; ?>

    <?php if ($client): ?>
        <form method="POST">
            <input type="hidden" name="id" value="<?= $client['ID_client']; ?>">

            <label for="nom">First Name:</label>
            <input type="text" id="nom" name="nom" value="<?= $client['nom']; ?>" required><br><br>

            <label for="prenom">Last Name:</label>
            <input type="text" id="prenom" name="prenom" value="<?= $client['prenom']; ?>" required><br><br>

            <label for="age">Age:</label>
            <input type="number" id="age" name="age" value="<?= $client['age']; ?>" required><br><br>

            <label for="region_id">Region:</label>
            <select id="region_id" name="region_id" required>
                <?php while ($region = $regions->fetch(PDO::FETCH_ASSOC)) { ?>
                    <option value="<?= $region['ID_region']; ?>" 
                        <?= $region['ID_region'] == $client['ID_region'] ? 'selected' : ''; ?>>
                        <?= $region['libelle']; ?>
                    </option>
                <?php } ?>
            </select><br><br>

            <button type="submit">Update Client</button>
        </form>
    <?php else: ?>
        <p>Client not found.</p>
    <?php endif; ?>

    <br>
    <a href="list.php">Back to List</a>
</body>
</html>
