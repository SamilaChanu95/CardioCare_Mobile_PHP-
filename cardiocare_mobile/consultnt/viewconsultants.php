<html>
    <head>
        <title>View Consultants</title>
        <style>
            body {
                font: normal medium/1.4 sans-serif;
            }
            table {
                border-collapse: collapse;
                width: 20%;
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
            img{
                height: 32px;
                width: 32px;
            }
        </style>
        <script>
            var val= setInterval(function(){
            location.reload();
            },5000);
        </script>
    </head>
    <body>
        <center>
            <div class="header">
                Android SQLite and MySQL Sync Results
            </div>
        </center>
        <?php
            include_once 'db_functions.php';
            $db = new DB_Functions();
            $consultants = $db->getAllConsultants();
            if ($consultants != false)
                $no_of_consultants = mysqli_num_rows($consultants);
            else
                $no_of_consultants = 0;
        ?>
        <?php
            if ($no_of_consultants > 0) {
        ?>
        <table>
            <tr id="header"><td>Id</td><td>NIC</td><td>FirstName</td><td>LastName</td><td>Gender</td><td>Address</td><td>DOB</td><td>PhoneNumber</td><td>Role</td><td>Status</td><td>Hospital</td><td>Department</td><td>Unit</td><td>Ward</td><td>Sync Status</td></tr>
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
		<td id="sync"><span>
	    <?php 
		if($row["syncsts"])
	    {
		echo "<img src='img/green.png'/>"; 
	    } else {
		echo "<img src='img/white.png'/>";
	    }
	    ?></span></td>
            </tr>
            <?php } ?>
        </table>
        <?php }else{ ?>
        <div id="norecord">
            No records in MySQL DB
        </div>
        <?php } ?>
    </body>
</html>