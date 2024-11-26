<?php
require_once '../../controllers/ClientController.php';

if (isset($_GET['id'])) {
    $clientController = new ClientController();
    $isDeleted = $clientController->deleteClient($_GET['id']);

    if ($isDeleted) {
        header('Location: list.php');
        exit();
    } else {
        echo "Error deleting client.";
    }
} else {
    header('Location: list.php');
    exit();
}
?>
