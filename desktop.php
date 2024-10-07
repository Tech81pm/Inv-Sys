<?php
ob_start();
session_start();
include_once('connection.php');
include('inc/header.php');
?>
<?php include("inc/sidebar.php"); ?>
<?php include("action.php"); ?>

<div class="row">
    <div class="col-lg-12">
        <div class="card card-default rounded-0 shadow">
            <div class="card-header">
                <div class="row">
                    <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10 text-start">
                        <h3 class="card-title">Desktop List</h3>
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-6 text-end">
                        <button type="button" class="btn btn-primary bg-gradient rounded-0 btn-sm" data-bs-toggle="modal" data-bs-target="#addModal"><i class="far fa-plus-square"></i> Add Desktop</button>
                    </div>
                </div>
            </div>
            <div class="card-body" style="font-size:12px;">
                <div class="div_desktop">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <!-- Table Headers -->
                                <th>id</th>
                                <th>PC Name</th>
                                <th>User</th>
                                <th>Location</th>
                                <th>Company</th>
                                <th>Department</th>
                                <th>Item Code</th>
                                <th>Acquisition date</th>
                                <th>Server</th>
                                <th>Server Username</th>
                                <th>Server Password</th>
                                <th>Local Admin</th>
                                <th>Local Password</th>
                                <th>Anydesk</th>
                                <th>IP Address</th>
                                <th>MAC Address</th>
                                <th>CASE</th>
                                <th>OPERATING SYSTEM</th>
                                <th>CPU</th>
                                <th>RAM1</th>
                                <th>RAM2</th>
                                <th>MOTHERBOARD</th>
                                <th>DDR</th>
                                <th>GRAPHICS</th>
                                <th>MONITOR1</th>
                                <th>MONITOR2</th>
                                <th>DRIVE1</th>
                                <th>DRIVE2</th>
                                <th>OPTICAL DRIVE</th>
                                <th>MOUSE</th>
                                <th>KEYBOARD</th>
                                <th>AVR</th>
                                <th>WIRES</th>
                                <th>DATE START</th>
                                <th>DATE END</th>
                                <th>STATUS</th>
                                <th>ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($desktop as $d): ?>
                            <tr>
                                <!-- Table Data -->
                                <td><?php echo htmlspecialchars($d['id']); ?></td>
                                <td><?php echo htmlspecialchars($d['pcname']); ?></td>
                                <td><?php echo htmlspecialchars($d['user']); ?></td>
								<td><?php echo htmlspecialchars($d['location']); ?></td>
								<td><?php echo htmlspecialchars($d['company']); ?></td>
								<td><?php echo htmlspecialchars($d['department']); ?></td>
								<td><?php echo htmlspecialchars($d['itemcode']); ?></td>
								<td><?php echo htmlspecialchars($d['aqdate']); ?></td>
								<td><?php echo htmlspecialchars($d['server']); ?></td>
								<td><?php echo htmlspecialchars($d['server_username']); ?></td>
								<td><?php echo htmlspecialchars($d['server_password']); ?></td>
								<td><?php echo htmlspecialchars($d['local_admin']); ?></td>
								<td><?php echo htmlspecialchars($d['local_password']); ?></td>
								<td><?php echo htmlspecialchars($d['anydesk']); ?></td>
								<td><?php echo htmlspecialchars($d['ipaddress']); ?></td>
								<td><?php echo htmlspecialchars($d['macaddress']); ?></td>
								<td><?php echo htmlspecialchars($d['casse']); ?></td>
								<td><?php echo htmlspecialchars($d['os']); ?></td>
								<td><?php echo htmlspecialchars($d['cpu']); ?></td>
								<td><?php echo htmlspecialchars($d['ram1']); ?></td>
								<td><?php echo htmlspecialchars($d['ram2']); ?></td>
								<td><?php echo htmlspecialchars($d['mobo']); ?></td>
								<td><?php echo htmlspecialchars($d['ddr']); ?></td>
								<td><?php echo htmlspecialchars($d['gpu']); ?></td>
								<td><?php echo htmlspecialchars($d['monitor1']); ?></td>
								<td><?php echo htmlspecialchars($d['monitor2']); ?></td>
								<td><?php echo htmlspecialchars($d['drive1']); ?></td>
								<td><?php echo htmlspecialchars($d['drive2']); ?></td>
								<td><?php echo htmlspecialchars($d['op_drive']); ?></td>
								<td><?php echo htmlspecialchars($d['mouse']); ?></td>
								<td><?php echo htmlspecialchars($d['keyboard']); ?></td>
								<td><?php echo htmlspecialchars($d['avr']); ?></td>
								<td><?php echo htmlspecialchars($d['wires']); ?></td>
								<td><?php echo htmlspecialchars($d['date_start']); ?></td>
								<td><?php echo htmlspecialchars($d['date_end']); ?></td>
								<td><?php echo htmlspecialchars($d['status']); ?></td>
                                <td>
                                    <!-- Update Button -->
                                    <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editModal<?php echo $d['id']; ?>">
                                        Edit
                                    </button>
                                    <!-- Delete Button -->
                                    <a href="?delete=<?php echo $d['id']; ?>" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</a>
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
        <h1 class="modal-title fs-5" id="addModalLabel">Add Desktop</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="container">
            <form method="POST" action=""> 
                <!-- Form Fields -->
                <div class="form-group">
					<div class="col-sm-2">
						<label class="control-label" style="position:relative; top:7px;">PC Name:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="pcname">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-2">
						<label class="control-label" style="position:relative; top:7px;">User:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="user">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-2">
						<label class="control-label" style="position:relative; top:7px;">Location:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="location">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-2">
						<label class="control-label" style="position:relative; top:7px;">Comapany:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="company">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-2">
						<label class="control-label" style="position:relative; top:7px;">Department:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="department">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-2">
						<label class="control-label" style="position:relative; top:7px;">Item Code:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="itemcode">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-2">
						<label class="control-label" style="position:relative; top:7px;">Acquisition date:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="aqdate">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-2">
						<label class="control-label" style="position:relative; top:7px;">Server:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="server">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-2">
						<label class="control-label" style="position:relative; top:7px;">Server Username:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="server_username">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-2">
						<label class="control-label" style="position:relative; top:7px;">Server Password:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="server_password">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-2">
						<label class="control-label" style="position:relative; top:7px;">Local Admin:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="local_admin">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-2">
						<label class="control-label" style="position:relative; top:7px;">Local Password:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="local_password">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-2">
						<label class="control-label" style="position:relative; top:7px;">Anydesk:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="anydesk">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-2">
						<label class="control-label" style="position:relative; top:7px;">IP Address:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="ipaddress">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-2">
						<label class="control-label" style="position:relative; top:7px;">MAC Address:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="macaddress">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-2">
						<label class="control-label" style="position:relative; top:7px;">CASE:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="casse">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-2">
						<label class="control-label" style="position:relative; top:7px;">OPERATING SYSTEM:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="os">
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
						<label class="control-label" style="position:relative; top:7px;">RAM1:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="ram1">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-2">
						<label class="control-label" style="position:relative; top:7px;">RAM2:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="ram2">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-2">
						<label class="control-label" style="position:relative; top:7px;">MOTHERBOARD:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="mobo">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-2">
						<label class="control-label" style="position:relative; top:7px;">DDR:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="ddr">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-2">
						<label class="control-label" style="position:relative; top:7px;">GRAPHICS:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="gpu">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-2">
						<label class="control-label" style="position:relative; top:7px;">MONITOR1:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="monitor1">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-2">
						<label class="control-label" style="position:relative; top:7px;">MONITOR2:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="monitor2">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-2">
						<label class="control-label" style="position:relative; top:7px;">Drive1:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="drive1">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-2">
						<label class="control-label" style="position:relative; top:7px;">Drive2:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="drive2">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-2">
						<label class="control-label" style="position:relative; top:7px;">Optical Drive:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="op_drive">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-2">
						<label class="control-label" style="position:relative; top:7px;">Mouse:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="mouse">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-2">
						<label class="control-label" style="position:relative; top:7px;">Keyboard:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="keyboard">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-2">
						<label class="control-label" style="position:relative; top:7px;">Avr</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="avr">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-2">
						<label class="control-label" style="position:relative; top:7px;">Wires:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="wires">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-2">
						<label class="control-label" style="position:relative; top:7px;">Date Start:</label>
					</div>
					<div class="col-sm-10">
						<input type="date" class="form-control" name="date_start">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-2">
						<label class="control-label" style="position:relative; top:7px;">Date End:</label>
					</div>
					<div class="col-sm-10">
						<input type="date" class="form-control" name="date_end">
					</div>
				</div>
                <div class="form-group">
					<div class="col-sm-2">
                    	<label for="status">Status</label>
					</div>
					<div class="col-sm-10">
                    <select name="status" class="form-select rounded-0" id="status" required>
                        <option value="">Select Status</option>
                        <option value="Active">Active</option>
                        <option value="Stock">Stock</option>
                    </select>
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
<?php foreach ($desktop as $d): ?>
<div class="modal fade" id="editModal<?php echo $d['id']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editModalLabel<?php echo $d['id']; ?>" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="editModalLabel<?php echo $d['id']; ?>">Update Items</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="POST" action=""> 
            <input type="hidden" name="id" value="<?php echo $d['id']; ?>">
            <!-- Form Fields -->
            <div class="form-group">
                <label for="name">PC Name</label>
                <input type="text" class="form-control" id="pcname" name="pcname" value="<?php echo htmlspecialchars($d['pcname']); ?>" required>
            </div>
			<div class="form-group">
            	<label for="user">User</label>
                <input type="text" class="form-control" id="user" name="user" value="<?php echo htmlspecialchars($d['user']); ?>" required>
            </div>
    		<div class="form-group">
                <label for="location">Location</label>
                <input type="text" class="form-control" id="location" name="location" value="<?php echo htmlspecialchars($d['location']); ?>" required>
             </div>
            <div class="form-group">
                <label for="company">Company</label>
                <input type="text" class="form-control" id="company" name="company" value="<?php echo htmlspecialchars($d['company']); ?>" required>
            </div>	
            <div class="form-group">
            	<label for="department">Department</label>
                <input type="text" class="form-control" id="department" name="department" value="<?php echo htmlspecialchars($d['department']); ?>" required>
            </div>
    		<div class="form-group">
                <label for="itemcode">Item Code</label>
                <input type="text" class="form-control" id="itemcode" name="itemcode" value="<?php echo htmlspecialchars($d['itemcode']); ?>" required>
             </div>
            <div class="form-group">
                <label for="aqdate">Acquisition Date</label>
                <input type="text" class="form-control" id="aqdate" name="aqdate" value="<?php echo htmlspecialchars($d['aqdate']); ?>" required>
            </div>	
            <div class="form-group">
            	<label for="server">Server</label>
                <input type="text" class="form-control" id="server" name="server" value="<?php echo htmlspecialchars($d['server']); ?>" required>
            </div>
    		<div class="form-group">
                <label for="server_username">Server_Username</label>
                <input type="text" class="form-control" id="server_username" name="server_username" value="<?php echo htmlspecialchars($d['server_username']); ?>" required>
             </div>
            <div class="form-group">
                <label for="server_password">Server_Password</label>
                <input type="text" class="form-control" id="server_password" name="server_password" value="<?php echo htmlspecialchars($d['server_password']); ?>" required>
            </div>	
            <div class="form-group">
            	<label for="local_admin">Local_Admin</label>
                <input type="text" class="form-control" id="local_admin" name="local_admin" value="<?php echo htmlspecialchars($d['local_admin']); ?>" required>
            </div>
    		<div class="form-group">
                <label for="local_password">Local_Password</label>
                <input type="text" class="form-control" id="local_password" name="local_password" value="<?php echo htmlspecialchars($d['local_password']); ?>" required>
             </div>
            <div class="form-group">
                <label for="anydesk">Anydesk</label>
                <input type="text" class="form-control" id="anydesk" name="anydesk" value="<?php echo htmlspecialchars($d['anydesk']); ?>" required>
            </div>	
            <div class="form-group">
            	<label for="ipaddress">IP Address</label>
                <input type="text" class="form-control" id="ipaddress" name="ipaddress" value="<?php echo htmlspecialchars($d['ipaddress']); ?>" required>
            </div>
    		<div class="form-group">
                <label for="macaddress">MAC Address</label>
                <input type="text" class="form-control" id="macaddress" name="macaddress" value="<?php echo htmlspecialchars($d['macaddress']); ?>" required>
             </div>
            <div class="form-group">
                <label for="casse">Case</label>
                <input type="text" class="form-control" id="casse" name="casse" value="<?php echo htmlspecialchars($d['casse']); ?>" required>
            </div>	
            <div class="form-group">
            	<label for="os">Operating System</label>
                <input type="text" class="form-control" id="os" name="os" value="<?php echo htmlspecialchars($d['os']); ?>" required>
            </div>
    		<div class="form-group">
                <label for="cpu">CPU</label>
                <input type="text" class="form-control" id="cpu" name="cpu" value="<?php echo htmlspecialchars($d['cpu']); ?>" required>
             </div>
            <div class="form-group">
                <label for="ram1">RAM1</label>
                <input type="text" class="form-control" id="ram1" name="ram1" value="<?php echo htmlspecialchars($d['ram1']); ?>" required>
            </div>	
            <div class="form-group">
            	<label for="ram2">RAM2</label>
                <input type="text" class="form-control" id="ram2" name="ram2" value="<?php echo htmlspecialchars($d['ram2']); ?>" required>
            </div>
    		<div class="form-group">
                <label for="mobo">Mother Board</label>
                <input type="text" class="form-control" id="mobo" name="mobo" value="<?php echo htmlspecialchars($d['mobo']); ?>" required>
             </div>
            <div class="form-group">
                <label for="ddr">DDR</label>
                <input type="text" class="form-control" id="ddr" name="ddr" value="<?php echo htmlspecialchars($d['ddr']); ?>" required>
            </div>	
            <div class="form-group">
            	<label for="gpu">Graphics</label>
                <input type="text" class="form-control" id="gpu" name="gpu" value="<?php echo htmlspecialchars($d['gpu']); ?>" required>
            </div>
    		<div class="form-group">
                <label for="monitor1">Monitor1</label>
                <input type="text" class="form-control" id="monitor1" name="monitor1" value="<?php echo htmlspecialchars($d['monitor1']); ?>" required>
             </div>
            <div class="form-group">
                <label for="monitor2">Monitor2</label>
                <input type="text" class="form-control" id="monitor2" name="monitor2" value="<?php echo htmlspecialchars($d['monitor2']); ?>" required>
            </div>	
            <div class="form-group">
            	<label for="drive1">Drive1</label>
                <input type="text" class="form-control" id="drive1" name="drive1" value="<?php echo htmlspecialchars($d['drive1']); ?>" required>
            </div>
    		<div class="form-group">
                <label for="drive2">Drive2</label>
                <input type="text" class="form-control" id="drive2" name="drive2" value="<?php echo htmlspecialchars($d['drive2']); ?>" required>
             </div>
            <div class="form-group">
                <label for="op_drive">Optical Drive</label>
                <input type="text" class="form-control" id="op_drive" name="op_drive" value="<?php echo htmlspecialchars($d['op_drive']); ?>" required>
            </div>	
            <div class="form-group">
            	<label for="mouse">Mouse</label>
                <input type="text" class="form-control" id="mouse" name="mouse" value="<?php echo htmlspecialchars($d['mouse']); ?>" required>
            </div>
    		<div class="form-group">
                <label for="keyboard">Keyboard</label>
                <input type="text" class="form-control" id="keyboard" name="keyboard" value="<?php echo htmlspecialchars($d['keyboard']); ?>" required>
             </div>
            <div class="form-group">
                <label for="avr">AVR</label>
                <input type="text" class="form-control" id="avr" name="avr" value="<?php echo htmlspecialchars($d['avr']); ?>" required>
            </div>	
            <div class="form-group">
            	<label for="wires">Wires</label>
                <input type="text" class="form-control" id="wires" name="wires" value="<?php echo htmlspecialchars($d['wires']); ?>" required>
            </div>
    		<div class="form-group">
                <label for="date_start">Date_Start</label>
                <input type="date" class="form-control" id="date_start" name="date_start" value="<?php echo htmlspecialchars($d['date_start']); ?>">
             </div>
            <div class="form-group">
                <label for="date_end">Date_End</label>
                <input type="date" class="form-control" id="date_end" name="date_end" value="<?php echo htmlspecialchars($d['date_end']); ?>">
            </div>
			
            <div class="form-group">
                <label for="status">Status</label>
                <select name="status" class="form-select rounded-0" id="status" required>
                    <option value="Active" <?php echo $d['status'] === 'Active' ? 'selected' : ''; ?>>Active</option>
                    <option value="Stock" <?php echo $d['status'] === 'Stock' ? 'selected' : ''; ?>>Stock</option>
                </select>
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
