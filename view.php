<?php
ob_start();
session_start();
include_once('connection.php');

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    echo "Invalid ID";
    exit;
}

$id = intval($_GET['id']);

// Fetch asset details from the database
$query = "SELECT * FROM pc WHERE id = ?";
$stmt = $pdo->prepare($query);
$stmt->execute([$id]);
$asset = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$asset) {
    echo "Asset not found.";
    exit;
}

include('inc/header.php');
?>
<div class="container mt-4">
    <h2>Asset Details</h2>
    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <td><?php echo htmlspecialchars($asset['id']); ?></td>
        </tr>
        <tr>
            <th>Asset Name</th>
            <td><?php echo htmlspecialchars($asset['ass_name']); ?></td>
        </tr>
        <tr>
            <th>CPU</th>
            <td><?php echo htmlspecialchars($asset['cpu']); ?></td>
        </tr>
        <tr>
            <th>RAM</th>
            <td><?php echo htmlspecialchars($asset['ram']); ?></td>
        </tr>
        <tr>
            <th>Storage</th>
            <td><?php echo htmlspecialchars($asset['storage']); ?></td>
        </tr>
        <tr>
            <th>Date Purchased</th>
            <td><?php echo htmlspecialchars($asset['date_purc']); ?></td>
        </tr>
        <tr>
            <th>Assigned To</th>
            <td><?php echo htmlspecialchars($asset['assigned']); ?></td>
        </tr>

    </table>
    <a href="pc.php" class="btn btn-secondary">Back to List</a>
</div>
<?php include('inc/footer.php'); ?>
