<?php
class DatabaseConnection{

static $conn = null;

static function connect(){
	$host="127.0.0.1";
	$port=3306;
	$socket="";
	$user="psyuser";
	$password="psyuserR1!";
	$dbname="psyDB";

	$conn = new mysqli($host, $user, $password, $dbname, $port, $socket)
	or die ('Could not connect to the database server' . mysqli_connect_error());

	return $conn;
}

static function close($connection){
		return $connection->close();
}

}

/*$con = DatabaseConnection::connect();
if($con->connect_error){
	echo "connessione negata: ".$con->connect_error;
}
else{
	echo "connessione ok";
}

$con2 = DatabaseConnection::close($con);*/
?>
