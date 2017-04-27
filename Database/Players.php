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
    /**
    * Returns player with specified ID.
    *
    * @return array
    */
    public static function getPlayerWithID($id){
        $query = "SELECT * FROM `PLAYERS` WHERE ID = $id";

        $player = mysqli_fetch_assoc(MySQL::executeQuery($query));

        $picture = $player[\Enum\Player::PROFILE_PIC];

        $picture = ereg_replace("-","+",$picture);
        $picture = ereg_replace("_","/",$picture);

        $player[\Enum\Player::PROFILE_PIC] = $picture;

        return $player;
    }

    /**
    * Returns player Name with specified ID.
    *
    * @return string
    */
    public static function getPlayerNameWithID($id){
        $query = "SELECT NAME FROM `PLAYERS` WHERE ID = $id";
		return mysqli_fetch_assoc(MySQL::executeQuery($query))["NAME"];
    }

    /**
    * Insert player.
    */
    public static function insertPlayer($pin, $pic, $name, $dob, $hometown, $bio, $jersey, $handedness, $height_inches, $weight_lbs){
        $query = "CALL insertPlayer($pin, $pic, $name, $dob, $hometown, $bio, $jersey, $handedness, $height_inches, $weight_lbs)";
		return MySQL::executeQuery($query);
    }
}
?>