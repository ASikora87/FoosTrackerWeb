<?php
/**
 * All methods interacting with the Keywords table are defined in Points.php
 */
namespace DatabaseAPI;
/**
 * Points
 */
class Points{
    /**
    * Returns all Points With Given Player ID.
    *
    * @return array
    */
	public static function getAllPointsForUserWithID($id){
		$query = "SELECT * FROM `POINTS` WHERE RECORDID IN (SELECT ID FROM `RECORDS` WHERE PLAYERID = $id)";
		$result = MySQL::executeQuery($query);
		$points = array();
		while($row = mysqli_fetch_assoc($result)){
			array_push($points, $row);
		}
		return $points;
	}

	public static function getTotalGoalCountForUserWithID($id)
	{
		$query = "SELECT Count(*) AS TOTAL FROM `POINTS` WHERE RECORDID IN (SELECT ID FROM `RECORDS` WHERE PLAYERID = $id)";
		return mysqli_fetch_assoc(MySQL::executeQuery($query))["TOTAL"];
	}

	public static function getOffensiveGoalCountForUserWithID($id)
	{
		$query = "SELECT Count(*) AS TOTAL FROM `POINTS` WHERE RECORDID IN (SELECT ID FROM `RECORDS` WHERE PLAYERID = $id) AND POINT_TYPE = 'OFFENSIVE_GOAL'";
		return mysqli_fetch_assoc(MySQL::executeQuery($query))["TOTAL"];
	}

	public static function getDefensiveGoalCountForUserWithID($id)
	{
		$query = "SELECT Count(*) AS TOTAL FROM `POINTS` WHERE RECORDID IN (SELECT ID FROM `RECORDS` WHERE PLAYERID = $id) AND POINT_TYPE = 'DEFENSIVE_GOAL'";
		return mysqli_fetch_assoc(MySQL::executeQuery($query))["TOTAL"];
	}

	public static function getSBGoalCountForUserWithID($id)
	{
		$query = "SELECT Count(*) AS TOTAL FROM `POINTS` WHERE RECORDID IN (SELECT ID FROM `RECORDS` WHERE PLAYERID = $id) AND POINT_TYPE = 'SLAP_BACK_GOAL'";
		return mysqli_fetch_assoc(MySQL::executeQuery($query))["TOTAL"];
	}

	public static function getOwnGoalCountForUserWithID($id)
	{
		$query = "SELECT Count(*) AS TOTAL FROM `POINTS` WHERE RECORDID IN (SELECT ID FROM `RECORDS` WHERE PLAYERID = $id) AND POINT_TYPE = 'OWN_GOAL'";
		return mysqli_fetch_assoc(MySQL::executeQuery($query))["TOTAL"];
	}
}
?>