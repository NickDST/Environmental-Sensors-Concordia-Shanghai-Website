<?php
session_start();
include ".includes/dbhconnect.php";
//http://localhost/engineering_bdst/get_Location.php?esp_id=51
$esp_id = mysqli_real_escape_string( $connection, $_GET[ 'espId' ] );

$sql = "SELECT pm25b FROM bdst_esp_info WHERE esp_ID = '$esp_id'";

						$result = mysqli_query( $connection, $sql );


						$resultCheck = mysqli_num_rows( $result );
						if ( $resultCheck > 0 ) {
							while ( $row = mysqli_fetch_assoc( $result ) ) {

                                echo $row[ "pm25b" ];

                            }

                        }



?>