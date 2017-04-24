<?php
/**
 * DatabaseAPI.php houses all methods that directly interact with the DB.
 */
namespace DatabaseAPI;

include_once "Points.php";
include_once "Players.php";
include_once "Records.php";
include_once "Games.php";

/**
 * MySQL
 */
class MySQL{
	/**
	* MySQL Connection
	*/
	private static $conn = null;
	/**
	* MySQL User Name
	*/
	private static $sql_user;
	/**
	* MySQL Password
	*/
	private static $sql_password;
	/**
	* MySQL Host Name
	*/
	private static $sql_host;
	/**
	* MySQL Database Name
	*/
	private static $sql_database;

    /**
    * Loads the database credentials from the file DBInfo.json
    *
    * @return void
    */
	private static function loadCredentials(){

		$json = file_get_contents('http://' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname(dirname($_SERVER['PHP_SELF'])) . '/Assets/resources/DBInfo.local');
		$json_data = json_decode($json,true);

		self::$sql_user = $json_data['SQL_USER'];
		self::$sql_password = $json_data['SQL_PASSWORD'];
		self::$sql_host = $json_data['SQL_HOST'];
		self::$sql_database = $json_data['SQL_DATABASE'];
	}
    /**
    * Establishes the connection to the database.
    *
    * @return void
    */
	private static function establishDBConnection(){

		// Only grab this stuff once
		if(!isset(self::$sql_user) && !isset(self::$sql_password) && !isset(self::$sql_host) && !isset(self::$sql_database))
			self::loadCredentials();

		if (!(self::$conn = mysqli_connect(self::$sql_host, self::$sql_user, self::$sql_password))) {
			$message = "Could not connect to mysql.";
			echo '<p>' . $message . '</p>';
			exit($message);
		}
		if (!mysqli_select_db(self::$conn, self::$sql_database)) {
			$message = "Could not select database.";
			echo '<p>' . $message . '</p>';
			exit($message);
		}
	}
    /**
    * Closes the connection to the database.
    *
    * @return void
    */
	public static function closeDBConnection(){
		return mysqli_close(self::$conn);
	}
    /**
    * Executes the specified query.
    *
	* @param string $query the query to be executed.
	*
    * @return object
    */
	public static function executeQuery($query){

		self::establishDBConnection();

		$result = mysqli_query(self::$conn, $query);
		if (!$result) {
			echo "<p>DB Error, could not query the database.</p>
				  <p>MySQL Error: '" . mysqli_error(self::$conn) . "'</p>'
				  <p>Failed Query was: " . $query . ".</p>";

			mysqli_close(self::$conn);
			exit('Execution of the following query failed: ' . $query);
		}
		else{
			mysqli_close(self::$conn);
			return $result;
		}
	}
}
?>