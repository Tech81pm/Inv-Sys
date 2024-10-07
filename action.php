<?php
include 'connection.php';

// Desktop CRUD
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Handle Create Operation
if (isset($_POST['create'])) {
    $pcname = $_POST['pcname'];
    $user = $_POST['user'];
    $location = $_POST['location'];
    $company = $_POST['company'];
    $department = $_POST['department'];
    $itemcode = $_POST['itemcode'];
    $aqdate= $_POST['aqdate'];
    $server = $_POST['server'];
    $server_username = $_POST['server_username'];
    $server_password = $_POST['server_password'];
    $local_admin = $_POST['local_admin'];
    $local_password = $_POST['local_password'];
    $anydesk = $_POST['anydesk'];
    $ipaddress = $_POST['ipaddress'];
    $macaddress = $_POST['macaddress'];
    $casse = $_POST['casse'];
    $os = $_POST['os'];
    $cpu = $_POST['cpu'];
    $ram1 = $_POST['ram1'];
    $ram2 = $_POST['ram2'];
    $mobo = $_POST['mobo'];
    $ddr = $_POST['ddr'];
    $gpu = $_POST['gpu'];
    $monitor1 = $_POST['monitor1'];
    $monitor2 = $_POST['monitor2'];
    $drive1 = $_POST['drive1'];
    $drive2 = $_POST['drive2'];
    $op_drive = $_POST['op_drive'];
    $mouse = $_POST['mouse'];
    $keyboard = $_POST['keyboard'];
    $avr = $_POST['avr'];
    $wires = $_POST['wires'];
    $date_start = $_POST['date_start'];
    $date_end = $_POST['date_end'];
    $status = $_POST['status'];

    $stmt = $pdo->prepare("INSERT INTO desktop (pcname, user, location, company, department, itemcode, aqdate, server, server_username, server_password, local_admin, local_password, anydesk, ipaddress, macaddress, casse, os, cpu, ram1, ram2, mobo, ddr, gpu, monitor1, monitor2, drive1, drive2, op_drive, mouse, keyboard, avr, wires, date_start, date_end, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    
    // Ensure the number of values matches the number of placeholders
    $params = [$pcname, $user, $location, $company, $department, $itemcode, $aqdate, $server, $server_username, $server_password, $local_admin, $local_password, $anydesk, $ipaddress, $macaddress, $casse, $os, $cpu, $ram1, $ram2, $mobo, $ddr, $gpu, $monitor1, $monitor2, $drive1, $drive2, $op_drive, $mouse, $keyboard, $avr, $wires, $date_start, $date_end, $status];
    $stmt->execute($params);
}

// Handle Update Operation
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $pcname = $_POST['pcname'];
    $user = $_POST['user'];
    $location = $_POST['location'];
    $company = $_POST['company'];
    $department = $_POST['department'];
    $itemcode = $_POST['itemcode'];
    $aqdate= $_POST['aqdate'];
    $server = $_POST['server'];
    $server_username = $_POST['server_username'];
    $server_password = $_POST['server_password'];
    $local_admin = $_POST['local_admin'];
    $local_password = $_POST['local_password'];
    $anydesk = $_POST['anydesk'];
    $ipaddress = $_POST['ipaddress'];
    $macaddress = $_POST['macaddress'];
    $casse = $_POST['casse'];
    $os = $_POST['os'];
    $cpu = $_POST['cpu'];
    $ram1 = $_POST['ram1'];
    $ram2 = $_POST['ram2'];
    $mobo = $_POST['mobo'];
    $ddr = $_POST['ddr'];
    $gpu = $_POST['gpu'];
    $monitor1 = $_POST['monitor1'];
    $monitor2 = $_POST['monitor2'];
    $drive1 = $_POST['drive1'];
    $drive2 = $_POST['drive2'];
    $op_drive = $_POST['op_drive'];
    $mouse = $_POST['mouse'];
    $keyboard = $_POST['keyboard'];
    $avr = $_POST['avr'];
    $wires = $_POST['wires'];
    $date_start = $_POST['date_start'];
    $date_end = $_POST['date_end'];
    $status = $_POST['status'];

    $stmt = $pdo->prepare("UPDATE desktop SET pcname = ?, user = ?, location = ?, company = ?, department = ?, itemcode = ?, aqdate = ?, server = ?, server_username = ?, server_password = ?, local_admin = ?, local_password = ?, anydesk = ?, ipaddress = ?, macaddress = ?, casse = ?, os = ?, cpu = ?, ram1 = ?, ram2 = ?, mobo = ?, ddr = ?, gpu = ?, monitor1 = ?, monitor2 = ?, drive1 = ?, drive2 = ?, op_drive = ?, mouse = ?, keyboard = ?, avr = ?, wires = ?, date_start = ?, date_end = ?, status = ? WHERE id = ?");
    $stmt->execute([$pcname, $user, $location, $company, $department, $itemcode, $aqdate, $server, $server_username, $server_password, $local_admin, $local_password, $anydesk, $ipaddress, $macaddress, $casse, $os, $cpu, $ram1, $ram2, $mobo, $ddr, $gpu, $monitor1, $monitor2, $drive1, $drive2, $op_drive, $mouse, $keyboard, $avr, $wires, $date_start, $date_end, $status, $id]);
}

// Handle Delete Operation
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];

    $stmt = $pdo->prepare("DELETE FROM desktop WHERE id = ?");
    $stmt->execute([$id]);
}

// Fetch all items
$stmt = $pdo->query("SELECT * FROM desktop");
$desktop = $stmt->fetchAll();




// Laptop CRUD
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Handle Create Operation
if (isset($_POST['create'])) {
    $pcname = $_POST['pcname'];
    $user = $_POST['user'];
    $location = $_POST['location'];
    $company = $_POST['company'];
    $department = $_POST['department'];
    $itemcode = $_POST['itemcode'];
    $aqdate= $_POST['aqdate'];
    $server = $_POST['server'];
    $server_username = $_POST['server_username'];
    $server_password = $_POST['server_password'];
    $local_admin = $_POST['local_admin'];
    $local_password = $_POST['local_password'];
    $anydesk = $_POST['anydesk'];
    $ipaddress = $_POST['ipaddress'];
    $macaddress = $_POST['macaddress'];
    $casse = $_POST['casse'];
    $os = $_POST['os'];
    $cpu = $_POST['cpu'];
    $ram1 = $_POST['ram1'];
    $ram2 = $_POST['ram2'];
    $mobo = $_POST['mobo'];
    $ddr = $_POST['ddr'];
    $gpu = $_POST['gpu'];
    $monitor1 = $_POST['monitor1'];
    $monitor2 = $_POST['monitor2'];
    $drive1 = $_POST['drive1'];
    $drive2 = $_POST['drive2'];
    $op_drive = $_POST['op_drive'];
    $mouse = $_POST['mouse'];
    $keyboard = $_POST['keyboard'];
    $avr = $_POST['avr'];
    $wires = $_POST['wires'];
    $date_start = $_POST['date_start'];
    $date_end = $_POST['date_end'];
    $status = $_POST['status'];

    $stmt = $pdo->prepare("INSERT INTO laptop (pcname, user, location, company, department, itemcode, aqdate, server, server_username, server_password, local_admin, local_password, anydesk, ipaddress, macaddress, casse, os, cpu, ram1, ram2, mobo, ddr, gpu, monitor1, monitor2, drive1, drive2, op_drive, mouse, keyboard, avr, wires, date_start, date_end, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    
    // Ensure the number of values matches the number of placeholders
    $params = [$pcname, $user, $location, $company, $department, $itemcode, $aqdate, $server, $server_username, $server_password, $local_admin, $local_password, $anydesk, $ipaddress, $macaddress, $casse, $os, $cpu, $ram1, $ram2, $mobo, $ddr, $gpu, $monitor1, $monitor2, $drive1, $drive2, $op_drive, $mouse, $keyboard, $avr, $wires, $date_start, $date_end, $status];
    $stmt->execute($params);
}

// Handle Update Operation
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $pcname = $_POST['pcname'];
    $user = $_POST['user'];
    $location = $_POST['location'];
    $company = $_POST['company'];
    $department = $_POST['department'];
    $itemcode = $_POST['itemcode'];
    $aqdate= $_POST['aqdate'];
    $server = $_POST['server'];
    $server_username = $_POST['server_username'];
    $server_password = $_POST['server_password'];
    $local_admin = $_POST['local_admin'];
    $local_password = $_POST['local_password'];
    $anydesk = $_POST['anydesk'];
    $ipaddress = $_POST['ipaddress'];
    $macaddress = $_POST['macaddress'];
    $casse = $_POST['casse'];
    $os = $_POST['os'];
    $cpu = $_POST['cpu'];
    $ram1 = $_POST['ram1'];
    $ram2 = $_POST['ram2'];
    $mobo = $_POST['mobo'];
    $ddr = $_POST['ddr'];
    $gpu = $_POST['gpu'];
    $monitor1 = $_POST['monitor1'];
    $monitor2 = $_POST['monitor2'];
    $drive1 = $_POST['drive1'];
    $drive2 = $_POST['drive2'];
    $op_drive = $_POST['op_drive'];
    $mouse = $_POST['mouse'];
    $keyboard = $_POST['keyboard'];
    $avr = $_POST['avr'];
    $wires = $_POST['wires'];
    $date_start = $_POST['date_start'];
    $date_end = $_POST['date_end'];
    $status = $_POST['status'];

    $stmt = $pdo->prepare("UPDATE laptop SET pcname = ?, user = ?, location = ?, company = ?, department = ?, itemcode = ?, aqdate = ?, server = ?, server_username = ?, server_password = ?, local_admin = ?, local_password = ?, anydesk = ?, ipaddress = ?, macaddress = ?, casse = ?, os = ?, cpu = ?, ram1 = ?, ram2 = ?, mobo = ?, ddr = ?, gpu = ?, monitor1 = ?, monitor2 = ?, drive1 = ?, drive2 = ?, op_drive = ?, mouse = ?, keyboard = ?, avr = ?, wires = ?, date_start = ?, date_end = ?, status = ? WHERE id = ?");
    $stmt->execute([$pcname, $user, $location, $company, $department, $itemcode, $aqdate, $server, $server_username, $server_password, $local_admin, $local_password, $anydesk, $ipaddress, $macaddress, $casse, $os, $cpu, $ram1, $ram2, $mobo, $ddr, $gpu, $monitor1, $monitor2, $drive1, $drive2, $op_drive, $mouse, $keyboard, $avr, $wires, $date_start, $date_end, $status, $id]);
}

// Handle Delete Operation
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];

    $stmt = $pdo->prepare("DELETE FROM laptop WHERE id = ?");
    $stmt->execute([$id]);
}

// Fetch all items
$stmt = $pdo->query("SELECT * FROM laptop");
$laptop = $stmt->fetchAll();

?>
