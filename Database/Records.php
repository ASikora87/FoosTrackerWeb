<?php
/**
 * All methods interacting with the Records table are defined in Records.php
 */
namespace DatabaseAPI;

/**
 * Records
 */
class Records{
    /**
    * Returns all Records for Player With ID.
    *
    * @return array
    */
	public static function getAllRecordsWithPlayerID($id){
		$query = "SELECT * FROM `RECORDS` WHERE PLAYERID=$id";
		$result = MySQL::executeQuery($query);
		$allPlayerRecords = array();
		while($row = mysqli_fetch_assoc($result)){
			array_push($allPlayerRecords, $row);
		}
		return $allPlayerRecords;
	}
    /**
    * Returns all Records for Game With ID.
    *
    * @return array
    */
	public static function getAllRecordsWithID($id){
		$query = "SELECT * FROM `RECORDS` WHERE GAMEID=$id";
		$result = MySQL::executeQuery($query);
		$allGameRecords = array();
		while($row = mysqli_fetch_assoc($result)){
			array_push($allGameRecords, $row);
		}
		return $allGameRecords;
	}
    /**
    * Returns TeamID of record with ID.
    *
    * @return string
    */
	public static function getTeamIDWithRecordID($id)
	{
		$query = "SELECT TEAMID FROM `RECORDS` WHERE ID=$id";
		return mysqli_fetch_assoc(MySQL::executeQuery($query))["TEAMID"];
	}
    /**
    * Returns Number of wins of player with ID.
    *
    * @return string
    */
	public static function getWinsForPlayerID($id)
	{
		$query = "SELECT Count(*) AS 'TOTAL' FROM `RECORDS` WHERE PLAYERID=$id AND WIN=1";
		return mysqli_fetch_assoc(MySQL::executeQuery($query))["TOTAL"];
	}
    /**
    * Returns Number of wins of player with ID.
    *
    * @return string
    */
	public static function getLossesForPlayerID($id)
	{
		$query = "SELECT Count(*) AS 'TOTAL' FROM `RECORDS` WHERE PLAYERID=$id AND WIN=0";
		return mysqli_fetch_assoc(MySQL::executeQuery($query))["TOTAL"];
	}
}
?>