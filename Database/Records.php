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
    * Returns TeamsIDs for user with ID
    *
    * @return array
    */
	public static function getTeamIDsForPlayerID($id)
	{
		$query = "SELECT TEAMID FROM `RECORDS` WHERE PLAYERID=$id";
		$result = MySQL::executeQuery($query);
		$teamIDs = array();
		while($row = mysqli_fetch_assoc($result)){
			array_push($teamIDs, $row);
		}
		return $teamIDs;
	}
    /**
    * Returns Number of wins of player with ID.
    *
    * @return string
    */
	public static function getWinsForPlayerID($id)
	{
		return substr_count(print_r(self::getAllRecordsWithPlayerID($id),true), "LOSS");
	}
    /**
    * Returns Number of wins of player with ID.
    *
    * @return string
    */
	public static function getLossesForPlayerID($id)
	{
		return substr_count(print_r(self::getAllRecordsWithPlayerID($id),true), "LOSS");
	}
    /**
    * Returns Opponents of record with ID.
    *
    * @return array
    */
	public static function getOpposingPlayerIDsForRecordID($id)
	{
		$query = "SELECT PLAYERID FROM `RECORDS` WHERE GAMEID = (SELECT GAMEID FROM `RECORDS` WHERE ID=$id) AND PLAYERID != (SELECT PLAYERID FROM `RECORDS` WHERE ID=$id)";
		$result = MySQL::executeQuery($query);
		$allOpponents = array();
		while($row = mysqli_fetch_assoc($result)){
			array_push($allOpponents, $row);
		}
		return $allOpponents;
	}
}
?>