<?php 
/**
 * Get Consultant Details
 */ ?>
	<style>
		body {
		  	font: normal medium/1.4 sans-serif;
		}
		div.header{
			padding: 10px;
			background: #e0ffc1;
			width:30%;
			color: #008000;
			margin:5px;
		}
		table {
		  	border-collapse: collapse;
		  	width: 25%;
		  	margin-left: auto;
		  	margin-right: auto;
		}
		tr > td {
            padding: 0.25rem;
            text-align: center;
            border: 1px solid #ccc;
        }
        tr:nth-child(even) {
            background: #FAE1EE;
        }
        tr:nth-child(odd) {
            background: #edd3ff;
        }
        tr#header{
            background: #c1e2ff;
        }
        div.header{
            padding: 10px;
            background: #e0ffc1;
            width:30%;
            color: #008000;
            margin:5px;
        }
        div.refresh{
            margin-top:10px;
            width: 5%;
            margin-left: auto;
            margin-right: auto;
        }
        div#norecord{
            margin-top:10px;
            width: 15%;
            margin-left: auto;
            margin-right: auto;
        }
		form{
		width: 30%;
		  margin-left: auto;
		  margin-right: auto;
		padding: 10px;
		border: 2px solid #edd3ff;
		}
		div#msg{
		margin-top:10px;
		width: 30%;
		margin-left: auto;
		margin-right: auto;
		text-align: center;
		}
	</style>
	<center>
		<div class="header">
			Android SQLite and MySQL Sync - Get Consultant Details
		</div>
	</center>
	<form method="GET">
		<table>
			<tr>
				<td>Id:</td><td><input name="id" /></td>
			</tr>
			<tr>
				<td colspan="2" align="center"><input type="submit" value="Get Consultant"/></td>
			</tr>
		</table>
	</form>
	<?php
	    include_once 'db_functions.php';
	    if(isset($_GET["id"]) && !empty($_GET["id"])){
	    	$Id = $_GET["id"];
		    $db = new DB_Functions();
		    $consultants = $db->getConsultant($Id);
		    if ($consultants != false)
		        $no_of_consultants = mysqli_num_rows($consultants);
		    else
		        $no_of_consultants = 0;
		?>
		<?php
	    	if ($no_of_consultants > 0) {
		?>
		<table>
			<tr id="header">
				<td>Id</td>
				<td>NIC</td>
				<td>FirstName</td>
				<td>LastName</td>
				<td>Gender</td>
				<td>Address</td>
				<td>DOB</td>
				<td>PhoneNumber</td>
				<td>Role</td>
				<td>Status</td>
				<td>Hospital</td>
				<td>Department</td>
				<td>Unit</td>
				<td>Ward</td>
			</tr>
			<?php
			    while ($row = mysqli_fetch_array($consultants)) {
			?> 
			<tr>
				<td><span><?php echo $row["id"] ?></span></td>
				<td><span><?php echo $row["c_nic"] ?></span></td>
				<td><span><?php echo $row["c_first_name"] ?></span></td>
				<td><span><?php echo $row["c_last_name"] ?></span></td>
				<td><span><?php echo $row["c_gender"] ?></span></td>
				<td><span><?php echo $row["c_address"] ?></span></td>
				<td><span><?php echo $row["c_dob"] ?></span></td>
				<td><span><?php echo $row["c_phone_number"] ?></span></td>
				<td><span><?php echo $row["c_role"] ?></span></td>
				<td><span><?php echo $row["c_status"] ?></span></td>
				<td><span><?php echo $row["hospital_id"] ?></span></td>
				<td><span><?php echo $row["department_id"] ?></span></td>
				<td><span><?php echo $row["unit_id"] ?></span></td>
				<td><span><?php echo $row["ward_id"] ?></span></td>
			</tr>
			<?php } ?>
		</table>
	<?php }else{ ?>
		<div id="norecord">
			No records in MySQL DB
		</div>
	<?php } ?>
		<div class="refresh">
			<button onclick="refreshPage()">Refresh</button>
		</div>
	<?php } 
?>
	