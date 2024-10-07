<?php
include 'connection.php';

// PC CRUD
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Handle Create Operation
if (isset($_POST['create'])) {
    $ass_name = $_POST['ass_name'];
    $cpu = $_POST['cpu'];
    $ram = $_POST['ram'];
    $storage = $_POST['storage'];
    $date_purc = $_POST['date_purc'];
    $assigned = $_POST['assigned'];

    $stmt = $pdo->prepare("INSERT INTO pc (ass_name, cpu, ram, storage, date_purc, assigned) VALUES (?, ?, ?, ?, ?, ?)");
    
    // Ensure the number of values matches the number of placeholders
    $params = [$ass_name, $cpu, $ram, $storage, $date_purc, $assigned];
    $stmt->execute($params);
}

// Handle Update Operation
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $ass_name = $_POST['ass_name'];
    $cpu = $_POST['cpu'];
    $ram = $_POST['ram'];
    $storage = $_POST['storage'];
    $date_purc = $_POST['date_purc'];
    $assigned = $_POST['assigned'];
    
    $stmt = $pdo->prepare("UPDATE pc SET ass_name = ?, cpu = ?, ram = ?, storage = ?, date_purc = ?, assigned = ? WHERE id = ?");
    $stmt->execute([$ass_name, $cpu, $ram, $storage, $date_purc, $assigned, $id]);
}

// Handle Delete Operation
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];

    $stmt = $pdo->prepare("DELETE FROM pc WHERE id = ?");
    $stmt->execute([$id]);
}

// Fetch all items
$stmt = $pdo->query("SELECT * FROM pc");
$pc = $stmt->fetchAll();



// USERS CRUD
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Handle Create Operation
if (isset($_POST['create2'])) {
    $name = $_POST['name'];
    $user = $_POST['user'];
    $location = $_POST['location'];
    $company = $_POST['company'];
    $department = $_POST['department'];

    $stmt = $pdo->prepare("INSERT INTO users (name, user, location, company, department) VALUES (?, ?, ?, ?, ?)");
    
    // Ensure the number of values matches the number of placeholders
    $params = [$name, $user, $location, $company, $department];
    $stmt->execute($params);
}

// Handle Update Operation
if (isset($_POST['update2'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $user = $_POST['user'];
    $location = $_POST['location'];
    $company = $_POST['company'];
    $department = $_POST['department'];
    
    $stmt = $pdo->prepare("UPDATE users SET name = ?, user = ?, location = ?, company = ?, department = ? WHERE id = ?");
    $stmt->execute([$name, $user, $location, $company, $department, $id]);
}

// Handle Delete Operation
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];

    $stmt = $pdo->prepare("DELETE FROM users WHERE id = ?");
    $stmt->execute([$id]);
}

// Fetch all items
$stmt = $pdo->query("SELECT * FROM users");
$users = $stmt->fetchAll();
?>
