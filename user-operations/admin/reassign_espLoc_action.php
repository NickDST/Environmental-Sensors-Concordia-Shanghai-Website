<?php include '../../templates/hubheader.php';

if(!isset($_SESSION[ 'is_admin' ])){
    Redirect('../../default-operations/hub?error=Sorry! You need to be an Admin to access this page!');
}
date_default_timezone_set('Asia/Hong_Kong');
$current_date = date('m/d/Y h:i:s a', time());





if(isset($_GET[ 'esp_id' ])){
    $esp_id = mysqli_real_escape_string( $connection, $_GET[ 'esp_id' ] );
    $sql = "SELECT * FROM bdst_esp_info WHERE esp_id = '$esp_id'";
    $result = mysqli_query( $connection, $sql );
    $resultCheck = mysqli_num_rows( $result );
		if ( $resultCheck > 0 ) {
			while ( $row = mysqli_fetch_assoc( $result ) ) {
                $location = $row['location'];
            }
        }    
?>
<!-- Content -->
<div class="content">
	<!-- Animated -->
	<div class="animated fadeIn">

		<div class="col-lg-12 col-md-6">
			<div class="card">
				<div class="card-body">
                    <h1>Reassign Location Name</h1>
                    <hr>
                    <?php echo "<h3>ESP ID Currently On: " . $esp_id. "</h3>"?>
                    <?php echo "<h3>Location Currently Set: " . $location. "</h3>"?>
                    <br>
                    <form method="POST">
						
						<input type="text" class = "form-control" placeholder="Enter New Location" name="reassign_esp_room">
						<br>
						<br>
						<button type="submit" class = "btn btn-secondary" name = "submit_search">Submit Value</button>
					</form>
				</div>
            </div>
				</div>
			</div>
		</div>



	</div>
</div>
<?php 
if(isset($_POST['reassign_esp_room'])){
	$reassign_esp_room = mysqli_real_escape_string( $connection, $_POST[ 'reassign_esp_room' ] );
	$sql = "UPDATE bdst_esp_info
	SET location = '$reassign_esp_room'
	WHERE esp_id = '$esp_id';";

	$result = mysqli_query( $connection, $sql );
	if($result){
		Redirect('reassign_locations?success=Sucessfully updated');
	} else {
		Redirect('reassign_locations?error=Something went wrong');
	}
}



} ?>


<?php include '../../templates/footer.php';?>

