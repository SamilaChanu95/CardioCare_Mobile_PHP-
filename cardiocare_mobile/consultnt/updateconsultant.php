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
		  	width: 50%;
		  	margin-left: auto;
		  	margin-right: auto;
		}
		form{
			width: 60%;
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
			Android SQLite and MySQL Sync - Update Consultants
		</div>
	</center>
	<form method="POST">
		<table>
			<tr>
				<td>Id:</td><td><input name="id" /></td>
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
				<td colspan="2" align="center"><input type="submit" value="Update Consultant"/></td>
			</tr>
		</table>
	</form>
	<?php
		include_once 'db_functions.php';
		//Create Object for DB_Functions clas
		if(isset($_POST["id"]) && isset($_POST["cNIC"]) && isset($_POST["cFirstName"]) && isset($_POST["cLastName"]) && isset($_POST["cGender"]) && isset($_POST["cAddress"]) && isset($_POST["cDOB"]) && isset($_POST["cPhoneNumber"]) && isset($_POST["cRole"]) && isset($_POST["cStatus"]) && isset($_POST["Hospital"]) && isset($_POST["Department"]) && isset($_POST["Unit"]) && isset($_POST["Ward"])) {
			$db = new DB_Functions(); 
			//Update Consultant into MySQL DB
			$Id = $_POST["id"];
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
			$res = $db->updateConsultant($cNIC, $cFirstName, $cLastName, $cGender, $cAddress, $cDOB, $cPhoneNumber, $cRole, $cStatus, $Hospital, $Department, $Unit, $Ward, $Id);
				//Based on update, create JSON response
				if($res){ ?>
					 <div id="msg">Update successful</div>
				<?php }else{ ?>
					 <div id="msg">Update failed</div>
				<?php }
		
		} else{ ?>
		 	<div id="msg">Please enter id</div>
	<?php }
?>