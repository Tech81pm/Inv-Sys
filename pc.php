<?php
ob_start();
session_start();
include_once('connection.php');
include('inc/header.php');
include('inc/sidebar.php'); 
include('test.php');

// Function to check if a user exists
function userExists($pdo, $username) {
    $sql = "SELECT COUNT(*) FROM users WHERE user = :username";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['username' => $username]);
    return $stmt->fetchColumn() > 0;
}

// Handle form submission for updating records
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $ass_name = $_POST['ass_name'];
    $cpu = $_POST['cpu'];
    $ram = $_POST['ram'];
    $storage = $_POST['storage'];
    $date_purc = $_POST['date_purc'];
    $assigned = $_POST['assigned'];

    // Validate the assigned user
    if (!userExists($pdo, $assigned)) {
        // User does not exist
        echo '<div class="alert alert-danger">The user does not exist. Please enter a valid username.</div>';
    } else {
        // Proceed with the update
        $sql = "UPDATE pc SET ass_name = :ass_name, cpu = :cpu, ram = :ram, storage = :storage, date_purc = :date_purc, assigned = :assigned WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            'ass_name' => $ass_name,
            'cpu' => $cpu,
            'ram' => $ram,
            'storage' => $storage,
            'date_purc' => $date_purc,
            'assigned' => $assigned,
            'id' => $id
        ]);
        header('Location: pc.php'); // Redirect to avoid resubmission on refresh
        exit;
    }
}

// Fetch assets data for display
$sql_pc = "SELECT * FROM pc";
$pc = $pdo->query($sql_pc)->fetchAll(PDO::FETCH_ASSOC);





?>

<div class="row">
    <div class="col-lg-12">
        <div class="card card-default rounded-0 shadow">
            <div class="card-header">
                <div class="row">
                    <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10 text-start">
                        <h3 class="card-title">PC Assets</h3>
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-6 text-end">
                        <button type="button" class="btn btn-primary bg-gradient rounded-0 btn-sm" data-bs-toggle="modal" data-bs-target="#addModal"><i class="far fa-plus-square"></i> Add New</button>
                    </div>
                </div>
            </div>
            <div class="card-body" style="font-size:12px;">
                <div class="div_laptop">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <!-- Table Headers -->
                                <th>id</th>
                                <th>Asset Name</th>
                                <th>CPU</th>
                                <th>RAM</th>
                                <th>STORAGE</th>
                                <th>DATE PURCHASE</th>
                                <th>ASSIGNED TO</th>
                                <th>ACTION</th>

                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($pc as $p): ?>
                            <tr>
                                <!-- Table Data -->
                                <td><?php echo htmlspecialchars($p['id']); ?></td>
                                <td><?php echo htmlspecialchars($p['ass_name']); ?></td>
                                <td><?php echo htmlspecialchars($p['cpu']); ?></td>
                                <td><?php echo htmlspecialchars($p['ram']); ?></td>
                                <td><?php echo htmlspecialchars($p['storage']); ?></td>
                                <td><?php echo htmlspecialchars($p['date_purc']); ?></td>
                                <td>
                                <a href="Users.php?user=<?php echo urlencode($p['id']); ?>" class="btn btn-info">
                                    <?php echo htmlspecialchars($p['assigned']); ?>
                                </a>
                                </td>
                                <td>
                                    <!-- View Button -->
                                    <a href="view.php?id=<?php echo urlencode($p['id']); ?>" class="btn btn-info" title="View Record"><i class="fa-solid fa-eye"></i></a>
                                    <!-- Update Button -->
                                    <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editModal<?php echo $p['id']; ?>">
                                    <i class="fa-solid fa-pen"></i>
                                    </button>
                                    <!-- Delete Button -->
                                    <a href="?delete=<?php echo $p['id']; ?>" class="btn btn-danger" onclick="return confirm('Are you sure?')"><i class="fa-solid fa-trash"></i></a>
                                </td>
                                
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>   
        </div>
    </div>
</div>

<!-- Modal ADD -->
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="addModalLabel">Add </h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="container">
            <form method="POST" action=""> <!-- Update action URL -->
                <!-- Form Fields -->
                <div class="form-group">
					<div class="col-sm-2">
						<label class="control-label" style="position:relative; top:7px;">PC Name:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="ass_name">
					</div>
				</div>
                <div class="form-group">
					<div class="col-sm-2">
						<label class="control-label" style="position:relative; top:7px;">CPU:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="cpu">
					</div>
				</div>
                <div class="form-group">
					<div class="col-sm-2">
						<label class="control-label" style="position:relative; top:7px;">RAM:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="ram">
					</div>
				</div>           
                <div class="form-group">
					<div class="col-sm-2">
						<label class="control-label" style="position:relative; top:7px;">STORAGE:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="storage">
					</div>
				</div>           
                <div class="form-group">
					<div class="col-sm-2">
						<label class="control-label" style="position:relative; top:7px;">DATE PURCHASE:</label>
					</div>
					<div class="col-sm-10">
						<input type="date" class="form-control" name="date_purc">
					</div>
				</div>           
                <div class="form-group">
					<div class="col-sm-2">
						<label class="control-label" style="position:relative; top:7px;">ASSIGNED TO</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="assigned">
					</div>
				</div>           
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="create" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Update Modals -->
<?php foreach ($pc as $p): ?>
<div class="modal fade" id="editModal<?php echo $p['id']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editModalLabel<?php echo $p['id']; ?>" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="editModalLabel<?php echo $p['id']; ?>">Update Items</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="POST" action="">
            <input type="hidden" name="id" value="<?php echo $p['id']; ?>">
            <div class="form-group">
                <label for="ass_name">ASSET NAME</label>
                <input type="text" class="form-control" id="ass_name" name="ass_name" value="<?php echo htmlspecialchars($p['ass_name']); ?>" required>
            </div>
            <div class="form-group">
                <label for="cpu">CPU</label>
                <input type="text" class="form-control" id="cpu" name="cpu" value="<?php echo htmlspecialchars($p['cpu']); ?>" required>
            </div>
            <div class="form-group">
                <label for="ram">RAM</label>
                <input type="text" class="form-control" id="ram" name="ram" value="<?php echo htmlspecialchars($p['ram']); ?>" required>
            </div>
            <div class="form-group">
                <label for="storage">STORAGE</label>
                <input type="text" class="form-control" id="storage" name="storage" value="<?php echo htmlspecialchars($p['storage']); ?>" required>
            </div>
            <div class="form-group">
                <label for="date_purc">DATE PURCHASE</label>
                <input type="date" class="form-control" id="date_purc" name="date_purc" value="<?php echo htmlspecialchars($p['date_purc']); ?>" required>
            </div>
            <div class="form-group">
                <label for="assigned">Assigned To</label>
                <input type="text" class="form-control" id="assigned" name="assigned" value="<?php echo htmlspecialchars($p['assigned']); ?>">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" name="update" class="btn btn-primary">Update</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>
<?php endforeach; ?>


