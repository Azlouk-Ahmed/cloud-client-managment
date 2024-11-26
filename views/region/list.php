<?php
require_once '../../controllers/RegionController.php';

$regionController = new RegionController();
$regions = $regionController->listRegions();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Region List</title>
    <link rel="stylesheet" href="../../public/styles/index.css">
</head>
<body>
    <h1>Region List</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Region Name</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($region = $regions->fetch(PDO::FETCH_ASSOC)) { ?>
                <tr>
                    <td><?= $region['ID_region']; ?></td>
                    <td><?= $region['libelle']; ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    <br>
    <a href="../client/list.php">Back to Client List</a>
</body>
</html>
