<?php 
/**
 * Insert User into DB
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
			Android SQLite and MySQL Sync - Update Consultant
		</div>
	</center>
	<form method="POST">
		<table>
			<tr>
				<td>Id:</td><td><input name="id" /></td>
			</tr>
			<tr>
				<td colspan="2" align="center"><input type="submit" value="Delete Consultant"/></td>
			</tr>
		</table>
	</form>
	<?php
		include_once 'db_functions.php';
		//Create Object for DB_Functions class
		if(isset($_POST["id"]) && !empty($_POST["id"])){
		$db = new DB_Functions(); 
		//Delete Consultant from MySQL DB
		$id = $_POST["id"];
		$res = $db->deleteConsultant($id);
			//Based on delete, create JSON response
			if($res){ ?>
				 <div id="msg">Delete successful</div>
			<?php }else{ ?>
				 <div id="msg">Delete failed</div>
			<?php }
		} else{ ?>
		 	<div id="msg">Please enter id and name</div>
	<?php }
?>