<?php  
session_start();
require_once("db.php");

// when user clicked login button
if(isset($_POST)) {

	$sql = "SELECT * FROM kecamatan WHERE regency_id = '$_POST[id]' ";

	$result = $conn->query($sql);

	if( $result->num_rows > 0 ) {
		// output data
		while($row = $result->fetch_assoc()) {

			echo '<option value="'.$row["name"].'" data-id="'.$row["id"].'">'.$row["name"].'</option>';

		}
	}

	$conn->close();

}