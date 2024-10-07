<?php
ob_start();
session_start();
include_once('connection.php');
include('inc/header.php');
include("inc/sidebar.php"); 
include("test.php"); 



// Get the user parameter from query string
$assignedTo = isset($_GET['user']) ? $_GET['user'] : null;

// Fetch users data
$sql_users = "SELECT * FROM users";
$users = $pdo->query($sql_users)->fetchAll(PDO::FETCH_ASSOC);

// Fetch assets data if user is specified
$assets = [];
if ($assignedTo) {
    $sql_assets = "SELECT * FROM pc WHERE assigned = :assigned";
    $stmt = $pdo->prepare($sql_assets);
    $stmt->execute(['assigned' => $assignedTo]);
    $assets = $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>



<div class="row">
    <div class="col-lg-12">
        <div class="card card-default rounded-0 shadow">
            <div class="card-header">
                <div class="row">
                    <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10 text-start">
                        <h3 class="card-title">Active Assets</h3>
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-6 text-end">
                        <button type="button" class="btn btn-primary bg-gradient rounded-0 btn-sm" data-bs-toggle="modal" data-bs-target="#addModal"><i class="far fa-plus-square"></i> Add Desktop</button>
                    </div>
                    <nav class="nav" >
                        <a class="nav-link active" aria-current="page" href="#">All Assets</a>
                        <a class="nav-link" href="#">Desktop</a>
                        <a class="nav-link" href="#">Laptop</a>
                    </nav>
                </div>
            </div>
            <div class="card-body" style="font-size:12px;">
                <div class="div_desktop">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <!-- Table Headers -->
                                <th>id</th>
                                <th>NAME</th>
                                <th>USER</th>
                                <th>LOCATION</th>
                                <th>COMPANY</th>
                                <th>DEPARTMENT</th>
                                <th>STATUS</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                        <?php if ($assignedTo && !empty($assets)): ?>
                                <?php foreach ($assets as $asset): ?>
                                    <tr>
                                        <td><?php echo htmlspecialchars($asset['id']); ?></td>
                                        <td><a href="view_asset.php?id=<?php echo urlencode($asset['id']); ?>"><?php echo htmlspecialchars($asset['ass_name']); ?></a></td>
                                        <td><?php echo htmlspecialchars($asset['location']); ?></td>
                                        <td><?php echo htmlspecialchars($asset['company']); ?></td>
                                        <td><?php echo htmlspecialchars($asset['department']); ?></td>
                                        <td><?php echo htmlspecialchars($asset['status']); ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <?php foreach ($users as $u): ?>
                                    <tr>
                                        <td><?php echo htmlspecialchars($u['id']); ?></td>
                                        <td><?php echo htmlspecialchars($u['name']); ?></td>
                                        <td><?php echo htmlspecialchars($u['user']); ?></td>
                                        <td><?php echo htmlspecialchars($u['location']); ?></td>
                                        <td><?php echo htmlspecialchars($u['company']); ?></td>
                                        <td><?php echo htmlspecialchars($u['department']); ?></td>
                                        <td>
                                            <!-- Update Button -->
                                            <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editModal<?php echo $u['id']; ?>">
                                                Edit
                                            </button>
                                            <!-- Delete Button -->
                                            <a href="?delete=<?php echo $u['id']; ?>" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>
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
        <h1 class="modal-title fs-5" id="addModalLabel">Add Users</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="container">
            <form method="POST" action=""> <!-- Update action URL -->
                <!-- Form Fields -->
                <div class="form-group">
					<div class="col-sm-2">
						<label class="control-label" style="position:relative; top:7px;">NAME:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="name">
					</div>
				</div>          
                <div class="form-group">
					<div class="col-sm-2">
						<label class="control-label" style="position:relative; top:7px;">USER:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="user">
					</div>
				</div>          
                <div class="form-group">
					<div class="col-sm-2">
						<label class="control-label" style="position:relative; top:7px;">LOCATION:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="location">
					</div>
				</div>          
                <div class="form-group">
					<div class="col-sm-2">
						<label class="control-label" style="position:relative; top:7px;">COMPANY:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="company">
					</div>
				</div>          
                <div class="form-group">
					<div class="col-sm-2">
						<label class="control-label" style="position:relative; top:7px;">DEPARTMENT:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="department">
					</div>
				</div>          
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="create2" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Update Modals -->
<?php foreach ($users as $u): ?>
<div class="modal fade" id="editModal<?php echo $u['id']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editModalLabel<?php echo $d['id']; ?>" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="editModalLabel<?php echo $u['id']; ?>">Update Items</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="POST" action=""> <!-- Update action URL -->
            <input type="hidden" name="id" value="<?php echo $u['id']; ?>">
            <!-- Form Fields -->
            <div class="form-group">
                <label for="name">NAME</label>
                <input type="text" class="form-control" id="name" name="name" value="<?php echo htmlspecialchars($u['name']); ?>">
            </div>
            <div class="form-group">
                <label for="name">USER</label>
                <input type="text" class="form-control" id="user" name="user" value="<?php echo htmlspecialchars($u['user']); ?>" required>
            </div>
            <div class="form-group">
                <label for="name">LOCATION</label>
                <input type="text" class="form-control" id="location" name="location" value="<?php echo htmlspecialchars($u['location']); ?>" required>
            </div>
            <div class="form-group">
                <label for="name">COMPANY</label>
                <input type="text" class="form-control" id="company" name="company" value="<?php echo htmlspecialchars($u['company']); ?>" required>
            </div>
            <div class="form-group">
                <label for="name">DEPARTMENT</label>
                <input type="text" class="form-control" id="department" name="department" value="<?php echo htmlspecialchars($u['department']); ?>" required>
            </div>
                      
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" name="update2" class="btn btn-primary">Update</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>
<?php endforeach; ?>
