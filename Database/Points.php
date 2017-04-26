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
	public static function getAllPointsWithUserID($id, $ownGoal=true){
		$query = "SELECT * FROM `POINTS` WHERE RECORDID IN (SELECT ID FROM `RECORDS` WHERE PLAYERID = $id)" . (!$ownGoal ? " AND POINT_TYPE != 'OWN_GOAL'":"");
		$result = MySQL::executeQuery($query);
		$points = array();
		while($row = mysqli_fetch_assoc($result)){
			array_push($points, $row);
		}
		return $points;
	}
    /**
    * Returns all positive points for record with ID.
    *
    * @return array
    */
	public static function getAllPointsWithRecordID($id, $ownGoal=true){
		$query = "SELECT * FROM `POINTS` WHERE RECORDID = $id". (!$ownGoal ? " AND POINT_TYPE != 'OWN_GOAL'":"");
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
		return count(self::getAllPointsWithUserID($id, false));
	}
    /**
    * Returns offensive goal count for user with ID.
    *
    * @return string
    */
	public static function getOffensiveGoalCountForUserID($id)
	{
		return substr_count(print_r(self::getAllPointsWithUserID($id),true), "OFFENSIVE_GOAL");
	}
    /**
    * Returns offensive goal count for record with ID.
    *
    * @return string
    */
	public static function getOffensiveGoalCountForRecordID($id)
	{
		return substr_count(print_r(self::getAllPointsWithRecordID($id),true), "OFFENSIVE_GOAL");
	}
    /**
    * Returns defensive goal count for user with ID.
    *
    * @return string
    */
	public static function getDefensiveGoalCountForUserID($id)
	{
		return substr_count(print_r(self::getAllPointsWithUserID($id),true), "DEFENSIVE_GOAL");
	}
    /**
    * Returns defensive goal count for record with ID.
    *
    * @return string
    */
	public static function getDefensiveGoalCountForRecordID($id)
	{
		return substr_count(print_r(self::getAllPointsWithRecordID($id),true), "DEFENSIVE_GOAL");
	}
    /**
    * Returns slap back goal count for user with ID.
    *
    * @return string
    */
	public static function getSBGoalCountForUserID($id)
	{
		return substr_count(print_r(self::getAllPointsWithUserID($id),true), "SLAP_BACK_GOAL");
	}
    /**
    * Returns slap back goal count for record with ID.
    *
    * @return string
    */
	public static function getSBGoalCountForRecordID($id)
	{
		return substr_count(print_r(self::getAllPointsWithRecordID($id),true), "SLAP_BACK_GOAL");
	}
    /**
    * Returns own goal count for user with ID.
    *
    * @return string
    */
	public static function getOwnGoalCountForUserID($id)
	{
		return substr_count(print_r(self::getAllPointsWithUserID($id),true), "OWN_GOAL");
	}
    /**
    * Returns slap back goal count for record with ID.
    *
    * @return string
    */
	public static function getOwnGoalCountForRecordID($id)
	{
		return substr_count(print_r(self::getAllPointsWithRecordID($id),true), "OWN_GOAL");
	}
    /**
    * Returns all points scored on a given day for a given user.
    *
    * @return array
    */
	public static function getAllPointsScoredOnDayByPlayer($day, $player){
		$query = "SELECT TIMESTAMP FROM POINTS WHERE DAYNAME(TIMESTAMP)=$day AND RECORDID IN (SELECT ID FROM RECORDS WHERE PLAYERID=$player)";
		$result = MySQL::executeQuery($query);
		$points = array();
		while($row = mysqli_fetch_assoc($result)){
			array_push($points, $row);
		}
		return $points;
	}
}
?>