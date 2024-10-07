<?php
ob_start();
session_start();
include_once('connection.php');
include('inc/header.php');
include("inc/sidebar.php"); 
include("test.php");

$asset_id = isset($_GET['id']) ? $_GET['id'] : null;
$asset = null;

if ($asset_id) {
    $sql = "SELECT * FROM pc WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['id' => $asset_id]);
    $asset = $stmt->fetch(PDO::FETCH_ASSOC);
}
?>

<div class="row">
    <div class="col-lg-12">
        <div class="card card-default rounded-0 shadow">
            <div class="card-header">
                <h3 class="card-title">Asset Details</h3>
            </div>
            <div class="card-body">
                <?php if ($asset): ?>
                    <p><strong>Asset Name:</strong> <?php echo htmlspecialchars($asset['ass_name']); ?></p>
                    <p><strong>CPU:</strong> <?php echo htmlspecialchars($asset['cpu']); ?></p>
                    <p><strong>RAM:</strong> <?php echo htmlspecialchars($asset['ram']); ?></p>
                    <p><strong>Storage:</strong> <?php echo htmlspecialchars($asset['storage']); ?></p>
                    <p><strong>Date Purchased:</strong> <?php echo htmlspecialchars($asset['date_purc']); ?></p>
                    <p><strong>Assigned To:</strong> <?php echo htmlspecialchars($asset['assigned']); ?></p>
                <?php else: ?>
                    <p>No details found.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
