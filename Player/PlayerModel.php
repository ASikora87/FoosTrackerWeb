<?php

namespace Player;

class PlayerModel extends \Overall\Model{

    private $player;
    private $playerStats;
    private $gameStats;

    function __construct(){
        parent::__construct();
    }

    public function getPlayer(){return $this->player;}
    public function getPlayerStats(){return $this->playerStats;}
    public function getGameStats(){return $this->gameStats;}

    public function setPlayer($player){
        // Set player info
        $this->player = $player;

        // Set player stats
        $this->playerStats = array();
        $this->playerStats[] = array(
            \Enum\Stats::WINS =>  \DatabaseAPI\Records::getWinsForPlayerID($player["ID"]),
            \Enum\Stats::LOSSES => \DatabaseAPI\Records::getLossesForPlayerID($player["ID"]),
            \Enum\Stats::TOTAL_GOALS =>  \DatabaseAPI\Points::getTotalGoalCountForUserID($player["ID"]),
            \Enum\Stats::OFFENSIVE_GOALS => \DatabaseAPI\Points::getOffensiveGoalCountForUserID($player["ID"]),
            \Enum\Stats::DEFENSIVE_GOALS => \DatabaseAPI\Points::getDefensiveGoalCountForUserID($player["ID"]),
            \Enum\Stats::SLAP_BACK_GOALS => \DatabaseAPI\Points::getSBGoalCountForUserID($player["ID"]),
            \Enum\Stats::OWN_GOALS => \DatabaseAPI\Points::getOwnGoalCountForUserID($player["ID"]));

        // Set player game stats
        $this->gameStats = array();
        $playerRecords = \DatabaseAPI\Records::getAllRecordsWithPlayerID($player["ID"]);

        foreach($playerRecords as $record)
        {
            $opponents = \DatabaseAPI\Records::getOpposingPlayerIDsForRecordID($record["ID"]);

            $this->gameStats[] = array(
                \Enum\Game::DATE => \DatabaseAPI\Games::getDateOfGameID($record["GAMEID"]),
                \Enum\Game::OUTCOME => $record["OUTCOME"],
                \Enum\Game::OPPONENT => count($opponents) > 1 ? array(\DatabaseAPI\Players::getPlayerWithID($opponents[0]["PLAYERID"]), \DatabaseAPI\Players::getPlayerWithID($opponents[1]["PLAYERID"])) : \DatabaseAPI\Players::getPlayerWithID($opponents[0]["PLAYERID"]),
                \Enum\Stats::OFFENSIVE_GOALS => \DatabaseAPI\Points::getOffensiveGoalCountForRecordID($record["ID"]),
                \Enum\Stats::DEFENSIVE_GOALS => \DatabaseAPI\Points::getDefensiveGoalCountForRecordID($record["ID"]),
                \Enum\Stats::SLAP_BACK_GOALS => \DatabaseAPI\Points::getSBGoalCountForRecordID($record["ID"]),
                \Enum\Stats::OWN_GOALS => \DatabaseAPI\Points::getOwnGoalCountForRecordID($record["ID"]));
        }
    }
}

?>