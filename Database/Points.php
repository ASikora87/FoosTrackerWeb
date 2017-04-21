<?php
/**
 * All methods interacting with the Points table are defined in Points.php
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
	public static function getAllPointsWithUserID($id){
		$query = "SELECT * FROM `POINTS` WHERE RECORDID IN (SELECT ID FROM `RECORDS` WHERE PLAYERID = $id)";
		$result = MySQL::executeQuery($query);
		$points = array();
		while($row = mysqli_fetch_assoc($result)){
			array_push($points, $row);
		}
		return $points;
	}
    /**
    * Returns all positive points (not OWN_GOALS) for record with ID.
    *
    * @return array
    */
	public static function getAllPointsWithRecordID($id){
		$query = "SELECT * FROM `POINTS` WHERE RECORDID = $id AND POINT_TYPE != 'OWN_GOAL'";
		$result = MySQL::executeQuery($query);
		$points = array();
		while($row = mysqli_fetch_assoc($result)){
			array_push($points, $row);
		}
		return $points;
	}
    /**
    * Returns total goal count for user with ID.
    *
    * @return string
    */
	public static function getTotalGoalCountForUserID($id)
	{
		$query = "SELECT Count(*) AS TOTAL FROM `POINTS` WHERE RECORDID IN (SELECT ID FROM `RECORDS` WHERE PLAYERID = $id AND POINT_TYPE != 'OWN_GOAL')";
		return mysqli_fetch_assoc(MySQL::executeQuery($query))["TOTAL"];
	}
    /**
    * Returns offensive goal count for user with ID.
    *
    * @return string
    */
	public static function getOffensiveGoalCountForUserID($id)
	{
		$query = "SELECT Count(*) AS TOTAL FROM `POINTS` WHERE RECORDID IN (SELECT ID FROM `RECORDS` WHERE PLAYERID = $id) AND POINT_TYPE = 'OFFENSIVE_GOAL'";
		return mysqli_fetch_assoc(MySQL::executeQuery($query))["TOTAL"];
	}
    /**
    * Returns defensive goal count for user with ID.
    *
    * @return string
    */
	public static function getDefensiveGoalCountForUserID($id)
	{
		$query = "SELECT Count(*) AS TOTAL FROM `POINTS` WHERE RECORDID IN (SELECT ID FROM `RECORDS` WHERE PLAYERID = $id) AND POINT_TYPE = 'DEFENSIVE_GOAL'";
		return mysqli_fetch_assoc(MySQL::executeQuery($query))["TOTAL"];
	}
    /**
    * Returns slap back goal count for user with ID.
    *
    * @return string
    */
	public static function getSBGoalCountForUserID($id)
	{
		$query = "SELECT Count(*) AS TOTAL FROM `POINTS` WHERE RECORDID IN (SELECT ID FROM `RECORDS` WHERE PLAYERID = $id) AND POINT_TYPE = 'SLAP_BACK_GOAL'";
		return mysqli_fetch_assoc(MySQL::executeQuery($query))["TOTAL"];
	}
    /**
    * Returns own goal count for user with ID.
    *
    * @return string
    */
	public static function getOwnGoalCountForUserID($id)
	{
		$query = "SELECT Count(*) AS TOTAL FROM `POINTS` WHERE RECORDID IN (SELECT ID FROM `RECORDS` WHERE PLAYERID = $id) AND POINT_TYPE = 'OWN_GOAL'";
		return mysqli_fetch_assoc(MySQL::executeQuery($query))["TOTAL"];
	}
}
?>