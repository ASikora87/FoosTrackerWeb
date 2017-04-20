<?php
/**
 * All methods interacting with the Players table are defined in Players.php
 */
namespace DatabaseAPI;
/**
 * Players
 */
class Players{
    /**
    * Returns all Player IDs.
    *
    * @return array
    */
	public static function getAllPlayerIDs(){
		$query = "SELECT ID FROM `PLAYERS`";
		$result = MySQL::executeQuery($query);
		$allPlayers = array();
		while($row = mysqli_fetch_assoc($result)){
			array_push($allPlayers, $row);
		}
		return $allPlayers;
	}

    public static function getPlayerNameWithID($id)
    {
        $query = "SELECT NAME FROM `PLAYERS` WHERE ID = $id";
		return mysqli_fetch_assoc(MySQL::executeQuery($query))["NAME"];
    }
}
?>