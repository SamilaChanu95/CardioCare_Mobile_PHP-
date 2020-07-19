<?php 
/**
 * Insert Consultant into DB
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
		form{
			width: 50%;
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
			Android SQLite and MySQL Sync - Add Consultants
		</div>
	</center>
	<form method="POST">
		<table>
			<tr>
				<td>NIC:</td><td><input name="cNIC" /></td>
				<td>FirstName:</td><td><input name="cFirstName" /></td>
				<td>LastName:</td><td><input name="cLastName" /></td>
				<td>Gender:</td><td><input name="cGender" /></td>
				<td>Address:</td><td><input name="cAddress" /></td>
				<td>DOB:</td><td><input name="cDOB" /></td>
				<td>PhoneNumber:</td><td><input name="cPhoneNumber" /></td>
				<td>Role:</td><td><input name="cRole" /></td>
				<td>Status:</td><td><input name="cStatus" /></td>
				<td>Hospital:</td><td><input name="Hospital" /></td>
				<td>Department:</td><td><input name="Department" /></td>
				<td>Unit:</td><td><input name="Unit" /></td>
				<td>Ward:</td><td><input name="Ward" /></td>
			</tr>
			<tr>
				<td colspan="2" align="center"><input type="submit" value="Add Consultant"/></td>
			</tr>
		</table>
	</form>
	<?php
		include_once './db_functions.php';
		//Create Object for DB_Functions clas
		if(isset($_POST["cNIC"]) && isset($_POST["cFirstName"]) && isset($_POST["cLastName"]) && isset($_POST["cGender"]) && isset($_POST["cAddress"]) && isset($_POST["cDOB"]) && isset($_POST["cPhoneNumber"]) && isset($_POST["cRole"]) && isset($_POST["cStatus"]) && isset($_POST["Hospital"]) && isset($_POST["Department"]) && isset($_POST["Unit"]) && isset($_POST["Ward"]) && !empty($_POST["cNIC"]) && !empty($_POST["cFirstName"]) && !empty($_POST["cLastName"]) && !empty($_POST["cGender"]) && !empty($_POST["cAddress"]) && !empty($_POST["cDOB"]) && !empty($_POST["cPhoneNumber"]) && !empty($_POST["cRole"]) && !empty($_POST["cStatus"]) && !empty($_POST["Hospital"]) && !empty($_POST["Department"]) && !empty($_POST["Unit"]) && !empty($_POST["Ward"])){
		$db = new DB_Functions(); 
		//Store User into MySQL DB
		$cNIC = $_POST["cNIC"];
		$cFirstName = $_POST["cFirstName"];
		$cLastName = $_POST["cLastName"];
		$cGender = $_POST["cGender"];
		$cAddress = $_POST["cAddress"];
		$cDOB = $_POST["cDOB"];
		$cPhoneNumber = $_POST["cPhoneNumber"];
		$cRole = $_POST["cRole"];
		$cStatus = $_POST["cStatus"];
		$Hospital = $_POST["Hospital"];
		$Department = $_POST["Department"];
		$Unit = $_POST["Unit"];
		$Ward = $_POST["Ward"];
		$res = $db->storeConsultant($cNIC, $cFirstName, $cLastName, $cGender, $cAddress, $cDOB, $cPhoneNumber, $cRole, $cStatus, $Hospital, $Department, $Unit, $Ward);
			//Based on inserttion, create JSON response
			if($res){ ?>
				 <div id="msg">Insertion successful</div>
			<?php }else{ ?>
				 <div id="msg">Insertion failed</div>
			<?php }
		} else{ ?>
		 	<div id="msg">Please enter name and submit</div>
	<?php }
?>
