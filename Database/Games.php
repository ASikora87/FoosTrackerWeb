<?php
/**
 * All methods interacting with the Games table are defined in Games.php
 */
namespace DatabaseAPI;

/**
 * Games
 */
class Games{
    /**
    * Returns all Games for Player With ID.
    *
    * @return array
    */
	public static function getAllGamesForPlayerID($id){
		$query = "SELECT * FROM `GAMES` WHERE ID IN (SELECT GAMEID FROM `RECORDS` WHERE PLAYERID = $id)";
		$result = MySQL::executeQuery($query);
		$allGamesForPlayer = array();
		while($row = mysqli_fetch_assoc($result)){
			array_push($allGamesForPlayer, $row);
		}
		return $allGamesForPlayer;
	}
    /**
    * Returns the winning team of game with ID.
    *
    * @return string
    */
	public static function getWinningTeamIDOfGameID($id){
		$records = getAllRecordsWithGameID($id);

        $team1Points = getAllPointsWithRecordID($records[0]["ID"]);
        $team2Points = getAllPointsWithRecordID($records[1]["ID"]);

        return Count($team1Points) > Count($team2Points) ? $records[0]["TEAMID"] : $records[1]["TEAMID"];
	}
}
?>