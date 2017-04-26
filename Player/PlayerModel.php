<?php

namespace Player;

class PlayerModel extends \Overall\Model{

    private $player;
    private $gameStats;
    private $splitStats;
    private $playerStats;

    function __construct(){
        parent::__construct();
    }

    public function getPlayer(){return $this->player;}
    public function getGameStats(){return $this->gameStats;}
    public function getSplitStats(){return $this->splitStats;}
    public function getPlayerStats(){return $this->playerStats;}

    public function setPlayer($player){
        // Set player info
        $this->player = $player;

        /*
            PLAYER STATS
        */
        $this->playerStats = array();
        $this->playerStats = array(
            \Enum\Stats::GAMES_PLAYED => \DatabaseAPI\Records::getGamesPlayedForPlayerID($player["ID"]),
            \Enum\Stats::WINS =>  \DatabaseAPI\Records::getWinsForPlayerID($player["ID"]),
            \Enum\Stats::LOSSES => \DatabaseAPI\Records::getLossesForPlayerID($player["ID"]),
            \Enum\Stats::TOTAL_GOALS =>  \DatabaseAPI\Points::getTotalGoalCountForUserID($player["ID"]),
            \Enum\Stats::OFFENSIVE_GOALS => \DatabaseAPI\Points::getOffensiveGoalCountForUserID($player["ID"]),
            \Enum\Stats::DEFENSIVE_GOALS => \DatabaseAPI\Points::getDefensiveGoalCountForUserID($player["ID"]),
            \Enum\Stats::SLAP_BACK_GOALS => \DatabaseAPI\Points::getSBGoalCountForUserID($player["ID"]),
            \Enum\Stats::OWN_GOALS => \DatabaseAPI\Points::getOwnGoalCountForUserID($player["ID"]),
            \Enum\Stats::MOST_USED_TEAM => \DatabaseAPI\Records::getMostUsedTeamForPlayerID($player["ID"]));

        /*
            GAME STATS
        */
        $this->gameStats = array();
        $playerRecords = \DatabaseAPI\Records::getAllRecordsWithPlayerID($player["ID"]);

        foreach($playerRecords as $record){
            $opponents = \DatabaseAPI\Records::getOpposingPlayerIDsForRecordID($record["ID"]);

            $this->gameStats[] = array(
                \Enum\Game::TEAM_USED => \DatabaseAPI\Records::getTeamIDWithRecordID($record["ID"]),
                \Enum\Game::DATE => \DatabaseAPI\Games::getDateOfGameID($record["GAMEID"]),
                \Enum\Game::OUTCOME => $record["OUTCOME"],
                \Enum\Game::GAME_TYPE => \DatabaseAPI\Games::getGameTypeOfGameID($record["GAMEID"]),
                \Enum\Game::OPPONENT => count($opponents) > 1 ? array(\DatabaseAPI\Players::getPlayerWithID($opponents[0]["PLAYERID"]), \DatabaseAPI\Players::getPlayerWithID($opponents[1]["PLAYERID"])) : \DatabaseAPI\Players::getPlayerWithID($opponents[0]["PLAYERID"]),
                \Enum\Stats::OFFENSIVE_GOALS => \DatabaseAPI\Points::getOffensiveGoalCountForRecordID($record["ID"]),
                \Enum\Stats::DEFENSIVE_GOALS => \DatabaseAPI\Points::getDefensiveGoalCountForRecordID($record["ID"]),
                \Enum\Stats::SLAP_BACK_GOALS => \DatabaseAPI\Points::getSBGoalCountForRecordID($record["ID"]),
                \Enum\Stats::OWN_GOALS => \DatabaseAPI\Points::getOwnGoalCountForRecordID($record["ID"]));
        }

        /*
            SPLIT STATS
        */
        $this->splitStats[] = array(
            \Enum\Stats::WIN_RATIO =>  @round((intval($this->playerStats[\Enum\Stats::WINS]) / (intval($this->playerStats[\Enum\Stats::WINS]) + intval($this->playerStats[\Enum\Stats::LOSSES]))) * 100, 0)
            );
        }
}

?>